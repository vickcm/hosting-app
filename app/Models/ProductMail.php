<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ProductMail extends Mailable
{
   use Queueable, SerializesModels;

   
    public function __construct(public Product $product)
    {
    }

    
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@nubeweb.com', 'Nube Web'),
            subject: 'Tu reserva fue realizada con éxito',
        );
    }

  
    public function content(): Content
    {
        return new Content(
            view: 'emails.product-contract',
        );
    }

   
    public function attachments(): array
    {
        return [];
    }
}
