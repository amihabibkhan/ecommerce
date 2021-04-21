<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\Admin\NewOrderNotification;
use App\Notifications\Admin\UserInfoChangedNotification;
use App\Notifications\Admin\UserPasswordChangedNotification;
use App\Slider;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SettingController
{
    public function index(){
        return view('admin.pages.settings');
    }

    public function password(Request $request){
        $user = User::findOrFail(auth()->id());

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);


        if (!Hash::check($request->old_password, $user->password)) {

            Toastr::error('Old password does not match');
            return back();
        } else {
            $user->password = bcrypt($request->password);
            $user->save();

            Notification::send($user,new UserPasswordChangedNotification());

            Toastr::success('Password Updated');
            return back();
        }

        Toastr::error('Something went wrong');
        return back();
    }

    public function user_info(Request $request){

        $user = User::findOrFail(auth()->id());

        $request->validate([
            'name' => 'required',
            'email' => ['required','email',Rule::unique('users','email')->ignore(auth()->id())],
            'email_confirmation' => ['required','email'],
            'phone' => ['required','string',Rule::unique('users','phone')->ignore(auth()->id())],
        ]);


        if ($request->email_confirmation != $request->email) {

            Toastr::error('both email does not match to each other');
            return back();
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            Notification::send($user,new UserInfoChangedNotification());


            Toastr::success('User information Updated');
            return back();
        }

        Toastr::error('Something went wrong');
        return back();
    }
}
