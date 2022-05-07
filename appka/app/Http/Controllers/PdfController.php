<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;

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

    public function downloadPDF(){
        $accidents = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();
        $pdf = PDF::loadView('nehody',compact('accidents'));

        return $pdf->download('nehoda_zaznam.pdf');
    }

    public function exportCsv(){

        $users = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();
        $columns = array('num', 'vin','pedal_position','speed','acceleration','rotation','on_roof','rotation_count','inpack_site','temperature','gforce');

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
            $row['num']          = $i;
            $row['vin']       = $each_user['vin'];
            $row['pedal_position']       = $each_user['pedal_position'];
            $row['speed']       = $each_user['speed'];
            $row['acceleration']       = $each_user['acceleration'];
            $row['rotation']       = $each_user['rotation'];
            $row['on_roof']       = $each_user['on_roof'];
            $row['rotation_count']       = $each_user['rotation_count'];
            $row['inpack_site']       = $each_user['inpack_site'];
            $row['temperature']       = $each_user['temperature'];
            $row['gforce']       = $each_user['gforce'];

            fputcsv($handle, array($row['num'], $row['vin'],$row['pedal_position'],$row['speed'],$row['acceleration'],
                    $row['rotation'], $row['on_roof'] ,$row['rotation_count'],$row['inpack_site'],
                    $row['temperature'],  $row['gforce'] ), ";");              
            $i++;
        }
        fclose($handle);
        $current_date = str_replace(' ', '_', date(now()));
        return Response::download($filename, "dataset_nehod".$current_date.".csv", $headers);
    }
}
