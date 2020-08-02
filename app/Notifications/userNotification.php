<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;


class userNotification extends Notification
{
    use Queueable;

    public $moistureAvg;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($moistureAvg)
    {
        $this->moistureAvg=$moistureAvg;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','nexmo'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $moistureAvg = $this->moistureAvg;
        
        return (new MailMessage)
                    ->subject('FIELD PARAMETER WARNING!!')
                    ->line('Field moisture parameter below '.$moistureAvg.'%') 
                    ->line('Kindly visit your Dashboard')
                    ->line('thank you;');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toNexmo($notifiable)
    {
        $moistureAvg = $this->moistureAvg;
        return (new NexmoMessage())
                        ->content('Field moisture parameter below '.$moistureAvg.'%. Kindly visit your Dashboard' );
    }
}
