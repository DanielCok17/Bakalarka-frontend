<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Nehoda;

class NehodaController extends Controller
{
    //protected  $api = 'https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda';

    //Main function for fetching/posting data from API
    function main(){
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();
        $data = $data[0];
        
        return view('homepage',['data'=> $data]);
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
    
}
