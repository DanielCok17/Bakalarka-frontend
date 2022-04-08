<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;

class PdfController extends Controller
{
    //
    public function getAllAccidents (){
        $accidents = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();
        return view('nehody',compact('accidents'));

    }

    public function downloadPDF(){
        $accidents = Http::get('https://bakalarka-app.herokuapp.com/api/bakalarka/nehoda')->json();
        $pdf = PDF::loadView('nehody',compact('accidents'));
        return $pdf->download('nehoda_zaznam.pdf');
    }
}
