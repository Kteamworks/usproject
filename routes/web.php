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

Route::get('/',  ['as' => '/', 'uses' => 'Auth\LoginController@getLogin']);
Route::get('/home', function () {
    return view('dashboard');
});
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('post-login',  ['as' => 'post.login', 'uses' => 'Auth\LoginController@postLogin']);
//Route::get('patients', 'Auth\PatientController@index');	
Route::resource('patients', 'Patient\PatientController');
Route::resource('drgs', 'Drg\DrgController');
Route::resource('drg-services', 'DrgServices\DrgServicesController');
Route::patch('patients/progress-edit/{id}','Patient\PatientController@updateProgress');
Route::get('drg_services-delete/{id}', ['as' => 'drg_services.delete', 'uses' => 'DrgServices\DrgServicesController@getDelete']);
Route::post('post-admission/{id}',  ['as' => 'patients.admission', 'uses' => 'Patient\PatientController@admissionDetails']);
Route::patch('admission-edit/{id}',  ['as' => 'admission.edit', 'uses' => 'Patient\PatientController@admissionEdit']);

