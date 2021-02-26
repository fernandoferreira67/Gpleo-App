<?php

use Illuminate\Support\Facades\Route;

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
Route::resource('admin/customers','CustomerController');
Route::get('admin/os','OrderServiceController@index')->name('os.index');
Route::get('admin/os/create','OrderServiceController@create')->name('os.create');
Route::post('admin/os/store','OrderServiceController@store')->name('os.store');
Route::get('admin/os/{orderService}/edit','OrderServiceController@edit')->name('os.edit');
Route::put('admin/os/{orderService}','OrderServiceController@update')->name('os.update');

Route::put('admin/os/destroy/{id}','OrderServiceController@destroy')->name('os.destroy');

Route::get('admin/os/search/{status}','OrderServiceController@searchCustom')->name('os.search.custom');

Route::get('admin/os/pdf', 'OrderServiceController@generatePDF')->name('os.generatePDF');
Route::get('admin/os/print/{id}', 'OrderServiceController@generatePrint')->name('os.generatePrint');
Route::get('admin/os/endprint/{id}', 'OrderServiceController@generatePrintFinished')->name('os.generatePrintFinished');


Auth::routes();
/*Login*/
Route::get('/', 'LoginController@dashboard')->name('admin');
Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
Route::get('/login/logout', 'LoginController@logout')->name('admin.logout');
Route::post('/login/do', 'LoginController@login')->name('admin.login.do');