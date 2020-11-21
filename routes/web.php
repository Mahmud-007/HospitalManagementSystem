<?php

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
        //Beds
Route::get('/createBed','BedController@createBed')->middleware('auth');

Route::post('/createBed','BedController@saveBed')->middleware('auth');

Route::get('/beds','BedController@bedList')->middleware('auth');

Route::delete('/beds/{id}','BedController@remove')->middleware('auth');

        //Patiets

Route::get('/admit','PatientController@creatingPatient')->middleware('auth');

Route::post('/admit','PatientController@savePatient')->middleware('auth');

Route::get('/patients','PatientController@patientList')->middleware('auth');

Route::post('/patients/{id}','PatientController@remove')->middleware('auth');

        //Bills

Route::get('/patient/bill/{id}','BillController@bill')->middleware('auth');

Route::post('/patient/bill/{id}','BillController@createBill')->middleware('auth');

Route::get('/patient/payment/{id}','BillController@payment')->middleware('auth');

Route::post('/patient/payment/{id}','BillController@payDues')->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
