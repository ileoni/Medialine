<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/entrar',['as' => 'login', 'uses' => 'Auth\LoginController@create']);
Route::post('/entrar',['as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('/sair',['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('/usuario', ['as' => 'user', 'uses' => 'UserController@index']);
Route::get('/usuario/registrar', ['as' => 'user.create', 'uses' => 'UserController@create']);
Route::post('/usuario/salvar', ['as' => 'user.store','uses' => 'UserController@store']);

Route::get('/produto', ['as' => 'product', 'uses' => 'ProductController@index']);
Route::get('/registrar/produto', ['as' => 'product.create', 'uses' => 'ProductController@create']);
Route::post('/salvar/produto', ['as' => 'product.store','uses' => 'ProductController@store']);
Route::get('/editar/produto/{id}', ['as' => 'product.edit','uses' => 'ProductController@edit']);
Route::post('/atualizar/produto/{id}', ['as' => 'product.update','uses' => 'ProductController@update']);
Route::post('/produto/{id}/remover', ['as' => 'product.destroy', 'uses' => 'ProductController@destroy']);

Route::get('/carrinho/pedidos', ['as' => 'cart', 'uses' => 'CartController@create']);
Route::get('/remover/item/{id}', ['as' => 'destroy.item', 'uses' => 'CartController@destroyItem']);

Route::get('/pedidos', ['as' => 'order.index', 'uses' => 'CartController@index']);
Route::post('/pedidos/salvar', ['as' => 'order.store', 'uses' => 'CartController@store']);