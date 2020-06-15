<?php

use Illuminate\Support\Facades\Route;
use App\Hero_Catch; use App\Hero;
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
    $catch = Hero_Catch::find(1);
    $slides = Hero::all();
    return view('home',compact('catch','slides'));
});


// Admin dashboard
Route::get('/admin', 'AdminController@index')->name('admin');

// Admin Hero
Route::post('/admin/hero/catchphrase/update', 'HeroController@catchUpdate')->name('hero.catch.update');
Route::resource('admin/hero', 'HeroController');