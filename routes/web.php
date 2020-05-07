<?php

use Illuminate\Support\Facades\Route;
use App\artigo;


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

// Pagina incial
Route::get('/', 'homeController@entrada')
	->name('home');

// Pagina dos artigos postados
Route::get('Artigo/{num}', 'artigocontroller@art')
	->name('artigo');
// Pagina que leva do escritor para os artugos postados
Route::post('Artigo/v', 'artigocontroller@vi')
	->name('artigo_re');

// Pagina das cateorias de artigos
Route::get('categoria/{cat}', 'categoriaController@result')
	->name('categoria');

// Pagina de busca de artigos
Route::post('busca','searchController@buscar')
	->name('busca');

// Pagina Sobre nos
Route::get('sobre_nos', function() {
    return view('sobre_nos');
})
	->name('sobre_nos');

// Pagina dos artigos em destaque
Route::get('destaques', 'destaqueController@novidade')
	->name('destaque');

// Pagina dos apoiadores
Route::get('apoie', 'apoieController@header')
	->name('apoie');

// Pagina dos usuarios escritores
Route::get('escritor', 'escritorController@home')
	->name('escritor');

Route::post('escritor/edt_perfil', 'escritorController@edt_perfil')->name('edt_perfil');

Route::post('escritor/login', 'escritorController@login')->name('login');

Route::get('escritor/logout', 'escritorController@logout')->name('logout');

Route::get('escritor/ver_make_art', 'escritorController@ver_make')->name('ver_make_art');

Route::post('escritor/make_art', 'escritorController@make')->name('make_art');
// 
