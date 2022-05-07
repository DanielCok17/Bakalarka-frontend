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
        $columns = array('id', 'vin');

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

        foreach ($users as $each_user) {
            $row['id']          = $each_user['_id'];
            $row['vin']       = $each_user['vin'];

            fputcsv($handle, array($row['id'], $row['vin']), ";");              
        }
        fclose($handle);
        $current_date = str_replace(' ', '_', date(now()));
        return Response::download($filename, "dataset_nehod".$current_date.".csv", $headers);
    }
}
