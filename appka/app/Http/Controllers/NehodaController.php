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
        //dd($data['occupied_seats'][0]);
        
        return view('record',['data'=> $data]);

    }

    function wait($id){
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$id)->json();
        $data = $data[0];
                
        return view('wait',['data'=> $data]);
    }

    function welcome(){
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();      
        $vozidla = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/vozidla')->json(); 
        
        $hasico_total_count = 0;
        $zachrari_total_count = 0;
        $policia_total_count = 0;        
        $hasico_available_count = 0;
        $zachrari_available_count = 0;
        $policia_available_count = 0;

        for($i=0;$i <count($vozidla);$i++){
            if($vozidla[$i]['type'] == "zachranka" ){
                $zachrari_total_count++;
                if($vozidla[$i]['availability'] == true){
                    $zachrari_available_count++;
                }
            }
            if($vozidla[$i]['type'] == "policia" ){
                $policia_total_count++;
                if($vozidla[$i]['availability'] == true){
                    $policia_available_count++;
                }
            }
            if($vozidla[$i]['type'] == "hasici" ){
                $hasico_total_count++;
                if($vozidla[$i]['availability'] == true){
                    $hasico_available_count++;
                }
            }
        }

        $data2 = [];
        $data3 = [];
        $counter = 0;
        for($i=0;$i <count($data);$i++){
            $timestamp = strtotime( $data[$i]['created_at']);
            $data[$i]['created_at'] = date('Y/m/d H:i:s', $timestamp );

            if($data[$i]['status'] == 0){
               array_push($data2,$data[$i]);
                $counter++;
            }
            elseif($data[$i]['status'] == 1){
                array_push($data3,$data[$i]);
            }
        }
        
        return view('welcome',
        ['data'=> $data,
        'data2'=> $data2,
        'data3'=> $data3,
        'count' => count($data),
        'count2' => count($data2),
        'count3' => count($data3),
        'hasici_total' => $hasico_total_count,
        'hasici_available' => $hasico_available_count,
        'policia_total' => $policia_total_count,
        'policia_available' => $policia_available_count,
        'zachranka_total' => $zachrari_total_count,
        'zachranka_available' => $zachrari_available_count
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
        
        $a = $this->edit($id); //PUT FUNCTION

        return view('speedmeter',['data'=> $data]);
    }

    function editedWelcome($id){
        $data_temp = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$id)->json();
        $data_temp = $data_temp[0];
        $id = $data_temp['_id'];
                
        $a = $this->edit($id); //PUT FUNCTION

         $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();      
        $vozidla = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/vozidla')->json(); 
        
        $hasico_total_count = 0;
        $zachrari_total_count = 0;
        $policia_total_count = 0;        
        $hasico_available_count = 0;
        $zachrari_available_count = 0;
        $policia_available_count = 0;

        for($i=0;$i <count($vozidla);$i++){
            if($vozidla[$i]['type'] == "zachranka" ){
                $zachrari_total_count++;
                if($vozidla[$i]['availability'] == true){
                    $zachrari_available_count++;
                }
            }
            if($vozidla[$i]['type'] == "policia" ){
                $policia_total_count++;
                if($vozidla[$i]['availability'] == true){
                    $policia_available_count++;
                }
            }
            if($vozidla[$i]['type'] == "hasici" ){
                $hasico_total_count++;
                if($vozidla[$i]['availability'] == true){
                    $hasico_available_count++;
                }
            }
        }

        $data2 = [];
        $data3 = [];
        $counter = 0;
        for($i=0;$i <count($data);$i++){
            $timestamp = strtotime( $data[$i]['created_at']);
            $data[$i]['created_at'] = date('Y/m/d H:i:s', $timestamp );

            if($data[$i]['status'] == 0){
               array_push($data2,$data[$i]);
                $counter++;
            }
            elseif($data[$i]['status'] == 1){
                array_push($data3,$data[$i]);
            }
        }
        
        return view('welcome',
        ['data'=> $data,
        'data2'=> $data2,
        'data3'=> $data3,
        'count' => count($data),
        'count2' => count($data2),
        'count3' => count($data3),
        'hasici_total' => $hasico_total_count,
        'hasici_available' => $hasico_available_count,
        'policia_total' => $policia_total_count,
        'policia_available' => $policia_available_count,
        'zachranka_total' => $zachrari_total_count,
        'zachranka_available' => $zachrari_available_count
        ]);
    }
    

    function edit($id){         
        Http::put('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$id.'/edit', [
            'status' => 0
        ]);        
        return ["Result"=>"Data has been saved"];
    }


}
