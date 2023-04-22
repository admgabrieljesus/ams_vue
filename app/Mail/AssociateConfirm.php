<?php

namespace App\Mail;

use App\Models\Associate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssociateConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $associate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Associate $associate)
    {
        $this->associate = $associate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $title = 'Sistema AMS/AEPET-BA - Validação de Associado(a)';
        return $this->subject($title)->view('emails.confirm_associate');
    }
    
}
