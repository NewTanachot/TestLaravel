<?php

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

Route::fallback(function () {
    return view('NotFound');
});

Route::get('/', function () {
    return view('about');
});

Route::get('/welcome', function() {
    return view('welcome');
});

Route::get('/getProduct', 'ProductController@index')->middleware('check');

Route::get('/AddProduct', function () {
    return view('product.ProductAdd');
});

Route::post('/AddProduct', 'ProductController@AddProduct');

Route::get('/DeleteProduct/{id}','ProductController@DeleteProduct');

Route::get('/UpdateProductView/{id}', function ($id) {
    $Products = Product::find($id);
    return view('product.ProductUpdate')->with('Products', $Products);
});

Route::put('/UpdateProduct/{id}', 'ProductController@UpdateProduct');
