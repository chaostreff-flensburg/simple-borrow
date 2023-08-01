<?php

namespace App\Mail;

use App\Models\Item;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Spatie\CalendarLinks\Link;

class ItemBorrowed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Item $item,
    ) {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->item->name.'ausgeliehen',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.item-borrowed',
            with: [
                'calendarLink' => $this->getCalendarLink(),
            ],
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

    private function getCalendarLink()
    {
        $from = DateTime::createFromFormat('Y-m-d', $this->item->transactions->last()->return_date->format('Y-m-d'));
        $to = DateTime::createFromFormat('Y-m-d', $this->item->transactions->last()->return_date->format('Y-m-d'));

        return Link::create(
            'Return '.$this->item->name,
            $from,
            $to,
        );
    }
}
