<?php

namespace App\Mail;

use DateTime;
use App\Models\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Spatie\CalendarLinks\Link;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ItemBorrowed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Item $item,
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->item->name . 'ausgeliehen',
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
            'Return ' . $this->item->name,
            $from,
            $to,
        )->ics();
    }
}
