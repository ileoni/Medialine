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

Auth::routes();

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/entrar',['as' => 'login', 'uses' => 'Auth\LoginController@create']);
Route::post('/entrar',['as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('/sair',['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuario', ['as' => 'user', 'uses' => 'UserController@create']);
Route::get('/usuario/{id}', ['as' => 'user.id', 'uses' => 'UserController@findById']);
Route::post('/usuario/salvar', ['as' => 'user.store','uses' => 'UserController@store']);
Route::post('/usuario/admin/salvar', ['as' => 'user.store.admin','uses' => 'UserController@storeAdmin']);
Route::post('/usuario/{id}/atualizar', ['as' => 'user.update','uses' => 'UserController@update']);
Route::post('/usuario/admin/{id}/atualizar', ['as' => 'user.update','uses' => 'UserController@updateAdmin']);
Route::post('/usuario/{id}/remover', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);

Route::get('/produto', ['as' => 'product', 'uses' => 'ProductController@create']);
Route::get('/produto/{id}', ['as' => 'product.id', 'uses' => 'ProductController@findById']);
Route::post('/produto/salvar', ['as' => 'product.store','uses' => 'ProductController@store']);
Route::post('/produto/{id}/atualizar', ['as' => 'product.update','uses' => 'ProductController@update']);
Route::post('/produto/{id}/remover', ['as' => 'product.destroy', 'uses' => 'ProductController@destroy']);

Route::get('/pedidos', ['as' => 'order', 'uses' => 'CartController@create']);
Route::post('/pedidos/salvar', ['as' => 'order.store', 'uses' => 'CartController@store']);