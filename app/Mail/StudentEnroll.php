<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class StudentEnroll extends Mailable
{
    use Queueable, SerializesModels;
    public $course_name;
    public $batch_name;
    public $student_name;

    public function __construct($student_name, $course_name, $batch_name){
        $this->course_name = $course_name;
        $this->batch_name = $batch_name;
        $this->student_name = $student_name;
    }


    public function envelope(){
        return new Envelope(
            subject: 'Student Enrollment',
            from: new Address('info@edu-cti.com', 'California Training')
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.studentEnrollMail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}