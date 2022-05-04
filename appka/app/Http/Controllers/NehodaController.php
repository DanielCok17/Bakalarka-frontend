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
        $data2 = [];
        $counter = 0;
        for($i=0;$i <count($data);$i++){
            if($data[$i]['status'] != 0){
                $data2[$counter] = $data;
                $counter++;
            }
        }
        //dd($data2);

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
        dd('test');
        Http::put('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$id.'/edit', [
            'status' => 0
        ]);
        
        return ["Result"=>"Data has been saved"];
    }
}
