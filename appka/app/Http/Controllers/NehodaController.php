<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Nehoda;
use Illuminate\Support\Facades\Storage;

class NehodaController extends Controller
{
    //protected  $api = 'https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda';

    //Main function for fetching/posting data from API
    function main(){
        
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();
        $data = $data[0];

        return view('homepage',['data'=> $data]);
    }

    function record($id){
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$id)->json();
        $data = $data[0];
        
        return view('record',['data'=> $data]);

    }

    function welcome(){
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();
        //dd($data);
        //dd(count($data));
        //dd($data[0]['vin']);

        return view('welcome',
        ['data'=> $data,
        'count' => count($data),
        ]);
    }

    //Function for map data
    function map(){
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();
        $data = $data[0];
        
        return view('map',['data'=> $data]);
    }

    function spedmeter(){
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();
        $data = $data[0];
        $id = $data['_id'];
        
        //$a = $this->edit($id); //PUT FUNCTION

        return view('speedmeter',['data'=> $data]);
    }

    function edit($id){         
        Http::put('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$id, [
            'status' => 99
        ]);
        
        return ["Result"=>"Data has been saved"];
    }

    function vin(){
        $apiPrefix = "https://api.vindecoder.eu/3.1";
        $apikey = "YOUR_API_KEY";   // Your API key
        $secretkey = "YOUR_API_SECRET";  // Your secret key
        $id = "info";
        $vin = "XXXDEF1GH23456789";

        $controlsum = substr(sha1("{$vin}|{$id}|{$apikey}|{$secretkey}"), 0, 10);

        $data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/info/{$vin}.json", false);
        $result = json_decode($data);
    }
}
