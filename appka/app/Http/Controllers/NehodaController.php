<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Nehoda;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


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
        $counter = 0;
        for($i=0;$i<5;$i++){
            if($data['occupied_seats'][$i] == 1)    $counter++;
        }
       

        $timestamp = strtotime( $data['created_at']);
        $data['created_at'] = date('Y/m/d H:i:s', $timestamp );  

        //dd($data['created_at']);        

        $time = strtotime($data['created_at']);

        $newformat = date('Y/m/d H:i:s',$time);

        $dt = Carbon::create(date('Y', $timestamp), date('m', $timestamp), date('d', $timestamp), date('H', $timestamp),date('i', $timestamp) , date('s', $timestamp));
        $dt->addMinutes(15);

        return view('record',['data'=> $data, 'people' => $counter, 'time' => $dt]);

    }

    function wait($id){
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$id)->json();
        $data = $data[0];
        $counter = 0;
        for($i=0;$i<5;$i++){
            if($data['occupied_seats'][$i] == 1)    $counter++;
        }
       

        $timestamp = strtotime( $data['created_at']);
        $data['created_at'] = date('Y/m/d H:i:s', $timestamp );  

        //dd($data['created_at']);        

        $time = strtotime($data['created_at']);

        $newformat = date('Y/m/d H:i:s',$time);

        $dt = Carbon::create(date('Y', $timestamp), date('m', $timestamp), date('d', $timestamp), date('H', $timestamp),date('i', $timestamp) , date('s', $timestamp));
        $dt->addMinutes(15);
                
        return view('wait',['data'=> $data, 'people' => $counter, 'time' => $dt]);
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
        'zachranka_available' => $zachrari_available_count,
        'empty' => empty($data3)
        ]);

    }

    function welcomeDelete($id){
        //$delete = Http::delete('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$id)->json();


        $zaznam = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/zaznam')->json(); 
        $search_index = 0;
        for($i=0; $i< count($zaznam); $i++){
            if($zaznam[$i]['id_nehody'] == $id)
            $search_index = $i;
        }
        $vehicle_to_free = $zaznam[$search_index]['vehicle'];
        $this->set_available_value(true,$vehicle_to_free);
        
        Http::delete('https://bakalarka-app.herokuapp.com/api/bakalarka/zaznam'.$zaznam[$search_index]['_id']);

        Http::put('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$id.'/edit', [
            'status' => -1
        ]);    
        

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
        if(isset($data_temp[0])){
                $data_temp = $data_temp[0];
                $id = $data_temp['_id'];
                        
                $a = $this->edit($id); //PUT FUNCTION
                $b = $this->find_vehicle_count($id);     // !!!!!!!!!!!!!!
            
                //$this->help();
                
        }
        

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
        //Http::delete('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$id);

        return ["Result"=>"Data has been saved"];
    }

    function find_vehicle_count($id){
        $result = $this->set_vehicle($id);  
       
            $a = Http::post('https://bakalarka-app.herokuapp.com/api/bakalarka/zaznam/', [
                'id_nehody' => $id,
                'vehicle' => $result,
                'resolved' => false
            ]);

            $a = json_decode($a, TRUE);
            if(isset($a['msg']) && $a['msg'] == "Vehicle added successfully!"){
                $this->set_available_value(false,$result); ////////////////////False 
            }

            if(isset($a['errors']) && $a['errors'][0]['msg'] != "Nehoda už riešená"){
                $this->set_available_value(false,$result); ////////////////////False 
            }
        
    }

    function which_vehidlce($id){
        $hasici = $zachranka = $policia = 1;
        $data = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$id)->json();
        $data = $data[0];
        $count_people = 0;

        for($i=0;$i<4;$i++){
            if($data['occupied_seats'][$i] == 1) {
                $count_people++;
            }
        }

        if($count_people >=4){
            $zachranka++;
        }

        if($count_people ==5){
            $policia++;
        }        

        if($data['gforce'] >14 || $data['rotation_count'] >2 || $data['speed'] >110){
            $hasici++;
        }
        return ["hasici" => $hasici, "policia" => $policia, "zachranka" => $zachranka];
    }

    function set_vehicle($id){
        $result = $this->which_vehidlce($id);
        $vehicle_vehicle = [];
        $vozidla = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/vozidla')->json(); 
        
        //hacisi
        $has=0;        
        for($i=0;$i<count($vozidla);$i++){
            if($has < $result['hasici']){
                if($vozidla[$i]['type'] == "hasici" && $vozidla[$i]['availability'] ){
                    $has++;
                    array_push($vehicle_vehicle,$vozidla[$i]['_id']);
                }
            }                
        }     
        
        //pilicia
        $pol=0;        
        for($i=0;$i<count($vozidla);$i++){
            if($pol < $result['policia']){
                if($vozidla[$i]['type'] == "policia" && $vozidla[$i]['availability'] ){
                    $pol++;
                    array_push($vehicle_vehicle,$vozidla[$i]['_id']);
                }
            }                
        } 
        //zachranka
        $zach=0;        
        for($i=0;$i<count($vozidla);$i++){
            if($zach < $result['zachranka']){
                if($vozidla[$i]['type'] == "zachranka" && $vozidla[$i]['availability'] ){
                    $zach++;
                    array_push($vehicle_vehicle,$vozidla[$i]['_id']);
                }
            }                
        } 

        return $vehicle_vehicle;
    }

    function set_available_value($bool,$result){

        for($i=0 ; $i< count($result) ; $i++){
            Http::put('https://bakalarka-app.herokuapp.com/api/bakalarka/vozidla/'.$result[$i], [
                'availability' => $bool
            ]);  

        }

    }
    //SET all vehicle available
    function help (){
        $vozidla = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/vozidla')->json(); 

        for($i=0 ; $i< count($vozidla) ; $i++){
            Http::put('https://bakalarka-app.herokuapp.com/api/bakalarka/vozidla/'.$vozidla[$i]['_id'], [
                'availability' => true
            ]);  

        }
    }

    function addZachranka(){
        Http::post('https://bakalarka-app.herokuapp.com/api/bakalarka/vozidla', [
            "num" => 1,
            "type" => "zachranka",
            "availability" => true
        ]);  
        return back()->withInput();    
    }

    function addPolicia(){
        Http::post('https://bakalarka-app.herokuapp.com/api/bakalarka/vozidla', [
            "num" => 1,
            "type" => "policia",
            "availability" => true
        ]); 
        return back()->withInput();    
    }

    function addHasici(){
        Http::post('https://bakalarka-app.herokuapp.com/api/bakalarka/vozidla', [
            "num" => 1,
            "type" => "hasici",
            "availability" => true
        ]); 
        return back()->withInput();
        }
}
