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
Route::group(['middleware'=>['auth']], function(){
    Route::prefix('admin')->name('admin.')->group(function(){

        Route::resource('employees','EmployeeController');
        //Route::post('photos/remove/', 'ProductPhotoController@removePhoto')->name('photo.remove');
    });
});

Route::get('/backups', function(){
    //Storage::disk('google')->put('hello.txt', "Hello world");
    //Storage::disk('google')->put('test.txt', 'Hello World');
    \Illuminate\Support\Facades\Artisan::call('backup:run');

    return 'Successful backup!';
});

//Auth::routes();
/*Login*/
Route::get('/dashboard', 'LoginController@dashboard')->name('admin.dashboard')->middleware('auth');
Route::get('/login/logout', 'LoginController@logout')->name('admin.logout')->middleware('auth');
Route::get('/', 'LoginController@showLoginForm')->name('admin.login.index');
Route::post('/login/do', 'LoginController@login')->name('admin.login.do');


