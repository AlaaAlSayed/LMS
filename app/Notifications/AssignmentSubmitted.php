<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssignmentSubmitted extends Notification
{
    use Queueable;
    private $student;
    private $subject;
    // private $assignment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($student, $subject)//,$assignment)
    {
        $this->student = $student;
        $this->subject = $subject;
        // $this->assignment = $assignment;

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
            "message" => "new student ( ".$this->student." ) submitted assignment in subject : ". $this->subject,
        ];
    }
}
