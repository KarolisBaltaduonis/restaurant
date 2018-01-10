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

// app('debugbar')->disable();


// Route::get('/', function () {
//
// $tasks = [
//   'Go to the store',
//   'Finish my screencast',
//   'Clean the house'
// ];
//
//     return view('welcome', [
//
//       'name' => 'World'
//
//     ]);
// });



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/reservation', 'Reservation2Controller@create')->name('reservation.create')->middleware('auth');
Route::post('/reservation', 'Reservation2Controller@store')->name('reservation.store')->middleware('auth');

Route::post('/cart', 'CartController@ajaxAdd')->name('cart.add');
Route::get('/cart2', 'CartController@index')->name('cart.order');
Route::get('/cart/{id}', 'CartController@deleteByOne')->name('cart.deleteByOne');
Route::get('/cart2/delete', 'CartController@deleteAll')->name('cart.deleteAll');
Route::get('/cart2/deleteRow/{id}', 'CartController@deleteAllRow')->name('cart.deleteAllRow');
Route::get('/checkout', 'OrderController@checkout')->name('cart.checkout')->middleware('auth');
// Route::get()


Route::group(['middleware'=> ['auth', 'admin'], 'prefix'=>'admin'],function() {
  Route::get('/', 'AdminController@index')->name('admin');
  Route::resource('/menu', 'MenuController');
  Route::resource('/dish', 'DishController');
});
