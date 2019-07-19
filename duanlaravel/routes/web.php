<?php
use App\Http\Controllers\ExampleController;

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
Route::get('/hello', 'ExampleController@hello')->name('example.hello');

Route::get('/gioithieubanthan', 'ExampleController@hello1')->name('gioithieu.hello1');

Route::get('/hoctap/php', 'ExampleController@khainiemphp')->name('example.khainiemphp');

Route::get('/hoctap/laravel', 'ExampleController@phienbanlaravel')->name('example.phienbanlaravel');

Route::get('/ngayhomnay', 'ExampleController@datetime')->name('example.datetime');