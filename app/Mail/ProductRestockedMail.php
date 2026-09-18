<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProductRestockedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Product $product;
    public string $customerName;

    public function __construct(Product $product, string $customerName = 'Valued Customer')
    {
        $this->product = $product;
        $this->customerName = $customerName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Good News! ' . $this->product->name . ' is Back in Stock! - Gadget & Glow',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.product_restocked',
            with: [
                'product' => $this->product,
                'customerName' => $this->customerName,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
