<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssignmnetGraded extends Notification
{
    use Queueable;
    private $subjectId;
    private $teacher;
    private $subject;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($subjectId, $subject, $teacherName)
    {
        $this->teacher = $teacherName;
        $this->subject = $subject;
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
            "message" => " Your teacher ( " . $this->teacher . " ) graded your assignment in subject : " . $this->subject,
            "subjectId" => $this->subjectId,
        ];
    }
}
