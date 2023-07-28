<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Http\Controllers\SendMailController;

class DemoEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $file;
    private $title_system = 'LARAVEL SYSTEM EMAIL';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $file)
    {
        $this->user = $user;
        $this->file = $file;
        // Đưa vào queue
        // $this->queue = 'email';
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    // public function envelope()
    // {
    //     // return new Envelope(
    //     // );
    //     return $this
    //         ->subject($this->title_system)
    //         ->view('mail.index')
    //         ->with([
    //             'user' => $this->user,
    //         ]);
    // }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    // public function content()
    // {
    //     // return new Content(
    //     // );
    //     return $this
    //         ->subject($this->title_system)
    //         ->view('mail.index')
    //         ->with([
    //             'user' => $this->user,
    //         ]);
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    // public function attachments()
    // {
    //     // return [];
    //     return $this
    //         ->subject($this->title_system)
    //         ->view('mail.index')
    //         ->with([
    //             'user' => $this->user,
    //         ]);
    // }

    public function build()
    {
        // return new Envelope(
        // );
        return $this
            ->subject($this->title_system)
            ->view('mail.index')
            ->attach(public_path() . '/image/images/' . 'Thuy' . $this->file . '.jpg')
            ->with([
                'user' => $this->user,
                'file' => $this->file,
            ]);
    }
}
