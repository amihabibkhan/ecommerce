<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserInfoChangedNotification extends Notification
{
    use Queueable;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('আপনার একাউন্টের নাম, ইমেইল ও ফোন নাম্বার পরিবর্তন হয়েছে।')
                    ->action('Visit', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'icon' => 'fas fa-info-circle',
            'url' => '#',
            'sender_id' => null,
//            'message_title' => 'ইউজার ইনফোরমেশন পরিবর্তন',
            'message_details' => "আপনার একাউন্টের নাম, ইমেইল ও ফোন নাম্বার পরিবর্তন হয়েছে।",
        ];
    }
}
