<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use DateTime;
use Carbon\Carbon;


class PdfController extends Controller
{
    //
    public function getAllAccidents (){
        $accidents = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();

        for($i=0;$i <count($accidents);$i++){
            $timestamp = strtotime( $accidents[$i]['created_at']);
            $accidents[$i]['created_at'] = date('Y/m/d H:i:s', $timestamp );            
        }
        

        return view('nehody',compact('accidents'));

    }

    public function downloadPDF($id){
        $accidents = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda/'.$id)->json();

        $timestamp = strtotime( $accidents[0]['created_at']);
        $accidents[0]['created_at'] = date('Y/m/d H:i:s', $timestamp );  

        //dd(strtotime($accidents[0]['created_at']));

        $time = strtotime($accidents[0]['created_at']);

        $newformat = date('Y/m/d H:i:s',$time);

    

        $dt = Carbon::create(date('Y', $timestamp), date('m', $timestamp), date('d', $timestamp), date('H', $timestamp),date('i', $timestamp) , date('s', $timestamp));
        $dt->addMinutes(15);

        //$accidents[0]['created_at'] = $dt;

        //dd($dt->toDateTimeString());

        $count = 0;
        for($i=0;$i<4;$i++){
            if($accidents[0]['occupied_seats'][$i] == 1) {
                $count++;
            }
        }

        $data = [
            'accidents' => $accidents,
            'count' => $count,
            'time' => $dt
        ];
          
        $pdf = PDF::loadView('nehody2', $data);

        return $pdf->download('nehoda_zaznam.pdf');
    }

    public function exportCsv(){

        $users = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();
        $columns = array('num', 'vin','pedal_position','speed','rotation_count','inpack_site','temperature','gforce','created_at');

        $headers = array(
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Disposition' => 'attachment; filename=download.csv',
            'Expires' => '0',
            'Pragma' => 'public',
        );

        if (!File::exists(public_path()."/files")) {
            File::makeDirectory(public_path() . "/files");
        }

        $filename =  public_path("files/download.csv");
        $handle = fopen($filename, 'w');

        fputcsv($handle,$columns, ";");
        $i=1;
        foreach ($users as $each_user) {
            $timestamp = strtotime( $each_user['created_at']);
            $each_user['created_at'] = date('Y/m/d H:i:s', $timestamp );               

            $row['num']          = $i;
            $row['vin']       = $each_user['vin'];
            $row['pedal_position']       = $each_user['pedal_position'];
            $row['speed']       = $each_user['speed'];
            $row['rotation_count']       = $each_user['rotation_count'];
            $row['inpack_site']       = $each_user['inpack_site'];
            $row['temperature']       = $each_user['temperature'];
            $row['gforce']       = $each_user['gforce'];
            $row['created_at']       = $each_user['created_at'];
            
            fputcsv($handle, array($row['num'], $row['vin'],$row['pedal_position'],$row['speed'],$row['rotation_count'],$row['inpack_site'],
                    $row['temperature'],  $row['gforce'],$row['created_at'] ), ";");              
            $i++;
        }
        fclose($handle);
        $current_date = str_replace(' ', '_', date(now()));
        return Response::download($filename, "vsetky_vehody".$current_date.".csv", $headers);
    }
}
