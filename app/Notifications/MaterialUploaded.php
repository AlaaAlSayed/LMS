<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MaterialUploaded extends Notification
{
    use Queueable;
    private $subject;
    private $material;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($subject ,$material )
    {
        $this->subject = $subject;
        $this->subject = $material;

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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            "message" => "new material ( ".$this->material." )uploaded in subject : ". $this->subject,
        ];
    }
}
