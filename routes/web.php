<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'ProductsController@index')->name('welcome');
Route::resource('index', 'ProductsController');
Route::resource('wishlist', 'WishlistsController');
Route::resource('categorie', 'CategoriesController');
Route::post('/wishlist.add_to_wishlist/{id}', 'WishlistsController@addWishlist')->name('addWishlist');
Route::resource('/admin/users', 'Admin\UsersController', ['except' => ['show', 'create', 'store']]);
Auth::routes();
Route::get('/home', 'ProductsController@index')->name('home');
//Route::get('/admin', function(){
 //   return 'you are admin';
//})->middleware(['auth', 'check.admin']);//middleware parbauda vai ir izieta autorizacija un vai sis users ir admins
