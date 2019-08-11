<?php

use App\Http\Controllers\ExampleController;
use App\Category;
use App\Product;

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

// chuc nang model trong laravel

Route::get('/backend/categories', function () {
    $list = Category::all();
    dd($list);
});


Route::get('/backend/product', function () {
    $list = Product::all();
    return view('backend.product.index')
        ->with('lisproduct', $list);
});

Route::get('backend/dabroad', 'Backend\PageController@darboard')->name('backend.page.dabroad');
Route::get('backend/products', 'Backend\ProductController@index')->name('backend.product.index');

Route::get('backend/categorie', 'Backend\CategoryController@index')->name('backend.category.index');
Route::get('backend/category/create', 'Backend\CategoryController@create')->name('backend.category.create');

Route::post('/backend/category/store','Backend\CategoryController@store')->name('backend.category.store');

Route::get('backend/category/{id}/edit', 'Backend\CategoryController@edit')->name('backend.category.edit');
Route::post('backend/category/{id}/update', 'Backend\CategoryController@update')->name('backend.category.update');