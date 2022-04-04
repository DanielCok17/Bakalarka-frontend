<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class NehodaController extends Controller
{
    //Main function for fetching/posting data from API
    function main(){
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();

        return view('homepage',['data'=> $data]);
    }

    //Main function for fetching/posting data from API
    function map(){
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();

        return view('map',['data'=> $data]);
    }
}
