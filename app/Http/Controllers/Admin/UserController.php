<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('role_id')->paginate(30);
        return view('admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'max:15'],
        ]);
        if ($request->role_id == 1){
            Toastr::error('You are not allow to create another admin');
            return back();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        Toastr::success('User created');
        return back();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        Toastr::success('User Deleted');
        return back();
    }

    // update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->role_id == 1){
            return back();
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => ['required', 'max:15'],
        ]);
        if ($request->role_id == 1){
            Toastr::error('You are not allow to create another admin');
            return back();
        }

        if ($request->password){
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->phone = $request->phone;
        $user->save();

        Toastr::success('User updated');
        return back();
    }
}
