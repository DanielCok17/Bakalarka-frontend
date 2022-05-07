<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;


class NehodaMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        //dd($id);
        $this->id = $id;
        //dd("tuuuu somaef");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->id);
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$this->id)->json();
        $data = $data[0];
        return $this->markdown('emails.nehoda',['data'=> $data]);
    }
}
