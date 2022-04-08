<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\NehodaMail;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('map',"NehodaController@map");

Route::get('speedmeter',"NehodaController@spedmeter");

Route::get('getid',"NehodaController@getid");

Route::put('edit',"NehodaController@edit");

Route::get('/email', function(){
    Mail::to('cokydano@gmail.com')->send(new NehodaMail());
    return new NehodaMail();
});

