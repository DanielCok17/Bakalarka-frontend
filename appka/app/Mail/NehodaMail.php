<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;



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
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$this->id)->json();
        $data = $data[0];

        $timestamp = strtotime($data['created_at']);
        $data['created_at'] = date('Y/m/d H:i:s', $timestamp );  


        $time = strtotime( $data['created_at']);

        $newformat = date('Y/m/d H:i:s',$time);

    

        $dt = Carbon::create(date('Y', $timestamp), date('m', $timestamp), date('d', $timestamp), date('H', $timestamp),date('i', $timestamp) , date('s', $timestamp));
        $dt->addMinutes(15);

        $dt->toDateTimeString();

        $count = 0;
        for($i=0;$i<4;$i++){
            if($data['occupied_seats'][$i] == 1) {
                $count++;
            }
        }

        //dd($data['latitude']);


        return $this->markdown('emails.nehoda',['data'=> $data,'time' => $dt, 'count' => $count]);
    }
}
