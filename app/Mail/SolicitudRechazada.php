<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\SolicitudDeVentas;

class SolicitudRechazada extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	public $params;
	
    public function __construct(SolicitudDeVentas $solicitud)
    {
        //
		$this->params = $solicitud;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->subject('Estado de Solicitud de Compra')->view('EmailDeRechazo',compact('params'));
    }
}
