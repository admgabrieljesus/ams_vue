<?php

namespace App\Mail;

use App\Models\Partner;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PartnerCheck extends Mailable
{
    use Queueable, SerializesModels;

    public $partner;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Partner $partner)
    {
        $this->partner = $partner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $title = 'Sistema AMS/AEPET-BA - Inclusão de novo(a) conveniado(a)';
        return $this->subject($title)->view('emails.check_partner');
    }
    
}
