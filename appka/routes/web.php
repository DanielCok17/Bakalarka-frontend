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

Route::get('editedWelcome/{id}',"NehodaController@editedWelcome");

Route::get('record/{id}',"NehodaController@record");

Route::get('wait/{id}',"NehodaController@wait");

Route::get('map',"NehodaController@map");

Route::get('speedmeter',"NehodaController@spedmeter");

Route::get('getid',"NehodaController@getid");

Route::put('edit/{id}',"NehodaController@edit");


Route::get('/email/{id}', function($id){    
    Mail::to('cokydano@gmail.com')->send(new NehodaMail($id));
    return back();
});

Route::get('/nehody',"PdfController@getAllAccidents");

Route::get('/exportCsv',"PdfController@exportCsv");

Route::get('/downloadPDF/{id}', "PdfController@downloadPDF");

Route::get('welcomeDelete/{id}',"NehodaController@welcomeDelete");
