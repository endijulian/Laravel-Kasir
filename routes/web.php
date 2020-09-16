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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();
// Route::get('/', function () {
//     return view('template.default');
// });
Route::match(['get', 'post'], '/register', function () {
    return redirect('login');
})->name('register');


Route::get('/', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => 'role:kasir', 'auth'], function () {
    Route::get('search', 'HomeController@search')->name('search');
    Route::post('add-product', 'TemproderController@addProduct')->name('addProduct');
    Route::delete('temproder/{temproder}/delete', 'TemproderController@destroy')->name('tempr_order.destroy');
    Route::post('process', 'OrderController@process')->name('process');
    Route::get('detailOrder', 'OrderController@detailOrder')->name('detailOrder');
    Route::get('order/{order}/receipt', 'OrderController@receipt')->name('receipt');
});

Route::group(['middleware' => 'role:owner', 'auth'], function () {

    //user
    Route::resource('user', 'UserController');

    //category
    Route::resource('category', 'CategoryController');

    //profile
    Route::resource('profile', 'ProfileController');

    //product
    Route::get('product/category', 'ProductController@category')->name('product.category');
    Route::get('product/{category}/index', 'ProductController@index')->name('product.index');
    Route::get('product/{category}/index/create', 'ProductController@create')->name('product.create');
    Route::post('product/{category}/index/create', 'ProductController@store')->name('product.store');
    Route::get('product/{category}/index/product/{product}/edit', 'ProductController@edit')->name('product.edit');
    Route::put('product/{category}/index/product/{product}/edit', 'ProductController@update')->name('update');
    Route::delete('product/{category}/index/product/{product}/delete', 'ProductController@destroy')->name('product.destroy');

    //order menampilkan data penjualan dan detail penjualan
    Route::get('penjualan', 'OrderController@index')->name('order.index');
    Route::get('penjualan/{order}/detail', 'OrderController@show')->name('order.show');

    //menampilkan report penjualan
    Route::get('report', 'ReportController@index')->name('report.index');
    Route::get('report/changeperiode', 'ReportController@changePeriode')->name('report.changePeriode');
});
