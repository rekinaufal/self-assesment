<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApprovePaymentNotifications extends Notification
{
    use Queueable;
    protected $category_name; 
    public function __construct($category_name)
    {
        $this->category_name = $category_name;
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
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    public function toDatabase()
    {
        // dd($this->payment_data->bank_account_name);
        return [
            'message' => 'Your Payment of was approve. Now your account status is '.$this->category_name
        ];
    }

    // public function toArray($notifiable)
    // {
    //     return [
    //     ];
    // }
}
