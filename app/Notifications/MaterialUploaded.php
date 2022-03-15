<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MaterialUploaded extends Notification
{
    use Queueable;
    private $type;
    private $subject;
    private $material;
    private $subjectId;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($type,$material ,$subject ,$subjectId)
    {
        $this->type = $type;
        $this->subject = $subject;
        $this->material = $material;
        $this->subjectId = $subjectId;

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
            "message" => "new ".$this->type. "( ".$this->material." ) added  in subject : ". $this->subject,
            "subjectId" => $this->subjectId,
        ];
    }
}
