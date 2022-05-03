<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\NehodaMail;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\NehodaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('homepage',"NehodaController@main");

Route::get('welcome',"NehodaController@welcome");

Route::get('record/{id}',"NehodaController@record");

Route::get('map',"NehodaController@map");

Route::get('speedmeter',"NehodaController@spedmeter");

Route::get('getid',"NehodaController@getid");

Route::put('edit',"NehodaController@edit");

Route::get('/email', function(){
    Mail::to('cokydano@gmail.com')->send(new NehodaMail());
    return new NehodaMail();
});

Route::get('/nehody',"PdfController@getAllAccidents");

Route::get('/downloadPDF', "PdfController@downloadPDF");