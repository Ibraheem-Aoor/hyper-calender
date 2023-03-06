<?php

namespace App\Mail;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The event instance
     *
     * @var Event
     */
    protected $event;

    /**
     * Create a new message instance.
     *
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Event reminder from Panjika')
            ->view('emails.event')
            ->with([
                'event' => $this->event,
            ]);
    }
}
