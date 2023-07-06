<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;

use App\Http\Controllers\Admincontroller;

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


Route::get('/', [Homecontroller::class, 'index']);

Route::get('/home', [Homecontroller::class, 'redirect'])->middleware('auth','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/add_doctor_view', [Admincontroller::class, 'addview']);


Route::post('/upload_doctor', [Admincontroller::class, 'upload']);

Route::post('/appointment',[Homecontroller::class,'appointment']);

Route::get('/myappointment',[Homecontroller::class,'myappointment']);

Route::get('/cancel_appoint/{id}',[Homecontroller::class,'cancel_appoint']);

Route::get('/showappointment',[Admincontroller::class,'showappointment']);

Route::get('/approved/{id}',[Admincontroller::class,'approved']);

Route::get('/canceled/{id}',[Admincontroller::class,'canceled']);

Route::get('/showdoctor',[Admincontroller::class,'showdoctor']);

Route::get('/deletedoctor/{id}',[Admincontroller::class,'deletedoctor']);

Route::get('/updatedoctor/{id}',[Admincontroller::class,'updatedoctor']);

Route::post('/editdoctor/{id}',[Admincontroller::class,'editdoctor']);

Route::get('/emailview/{id}',[Admincontroller::class,'emailview']);

Route::post('/sendemail/{id}',[Admincontroller::class,'sendemail']);
