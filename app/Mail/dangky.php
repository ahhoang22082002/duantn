<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class dangky extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    /**
     * Tạo một thể hiện mới của mailable.
     *
     * @param  \App\Models\nguoidung  $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user; // Gán giá trị user vào thuộc tính $user
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Chào mừng bạn đến với Shop bán hoa Thiên Lý',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->subject('Chào mừng đến với Shop bán hoa Thiên Lý')
                    ->view('emails.dangky') 
                    ->with([
                        'userName' => $this->user->ten, // Truyền thông tin user
                    ]);
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

