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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'UserController');
Route::resource('jabatan', 'JabatanController');
Route::resource('datakantor', 'DatakantorController');
Route::resource('datadiri', 'DatadiriController');
Route::resource('attendance', 'AttendanceController');
Route::resource('report', 'ReportController');

Route::get('cetak_excel','AttendanceController@cetak_excel')->name('cetak_excel');


// admin area
Route::get('/admin-attendance', 'AdminController@adminAttendance');
Route::GET('list-attendance/{id}','AdminController@show');

Route::view('tampilan', 'layouts.template');