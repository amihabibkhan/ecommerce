<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Notification as NotificationModel;

class Notification extends Component
{


    public function singleMarkNotification($notification_id){

        $notification = NotificationModel::where('id',$notification_id)->where('notifiable_id',auth()->id())->first();

        if($notification){
            if($notification->read_at == null){
                $notification->read_at = now();
                $notification->save();
            }
        }
    }

    public function singleMarkNotification_delete($notification_id){

        $notification = NotificationModel::where('id',$notification_id)->where('notifiable_id',auth()->id())->first();

        if($notification){
            $notification->delete();
        }
    }

    public function singleMarkNotification_mark($notification_id){

        $notification = NotificationModel::where('id',$notification_id)->where('notifiable_id',auth()->id())->first();

        if($notification){
            if($notification->read_at == null){
                $notification->read_at = now();
                $notification->save();
            }else{
                $notification->read_at = null;
                $notification->save();
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.notification');
    }
}
