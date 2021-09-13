<?php

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

Route::get('/', 'PageController@index')->name('home');

Route::prefix('admin')->group(function()
{
    Route::get('/dashboard', 'MainpageController@dashboard')->name('admin.dashboard');
    Route::get('/main', 'MainpageController@index')->name('admin.main');
    Route::put('/main', 'MainpageController@update')->name('admin.main.update');
    Route::get('/services/create', 'ServicepageController@create')->name('admin.services.create');
    Route::post('/services/create', 'ServicepageController@store')->name('admin.services.store');
    Route::get('/services/view', 'ServicepageController@view')->name('admin.services.view');
    Route::get('/services/edit/{id}', 'ServicepageController@edit')->name('admin.services.edit');
    Route::post('/services/update/{id}', 'ServicepageController@update')->name('admin.services.update');
    Route::delete('/services/destroy/{id}', 'ServicepageController@destroy')->name('admin.services.destroy');
    Route::get('/protfolios/create', 'ProtfoliopageController@create')->name('admin.protfolios.create');
    Route::put('/protfolios/create', 'ProtfoliopageController@store')->name('admin.protfolios.store');
    Route::get('/protfolios/view', 'ProtfoliopageController@view')->name('admin.protfolios.view');
    Route::get('/protfolios/edit/{id}', 'ProtfoliopageController@edit')->name('admin.protfolios.edit');
    Route::post('/protfolios/update/{id}', 'ProtfoliopageController@update')->name('admin.protfolios.update');
    Route::delete('/protfolios/destroy/{id}', 'ProtfoliopageController@destroy')->name('admin.protfolios.destroy');
    Route::get('/about/create', 'AboutpageController@create')->name('admin.about.create');
    Route::put('/about/create', 'AboutpageController@store')->name('admin.about.store');
    Route::get('/about/view', 'AboutpageController@view')->name('admin.about.view');
    Route::get('/about/edit/{id}', 'AboutpageController@edit')->name('admin.about.edit');
    Route::post('/about/update/{id}', 'AboutpageController@update')->name('admin.about.update');
    Route::delete('/about/destroy/{id}', 'AboutpageController@destroy')->name('admin.about.destroy');
    Route::get('/teams/create', 'TeampageController@create')->name('admin.teams.create');
    Route::put('/teams/create', 'TeampageController@store')->name('admin.teams.store');
    Route::get('/teams/view', 'TeampageController@view')->name('admin.teams.view');
    Route::get('/teams/edit/{id}', 'TeampageController@edit')->name('admin.teams.edit');
    Route::post('/teams/update/{id}', 'TeampageController@update')->name('admin.teams.update');
    Route::delete('/teams/destroy/{id}', 'TeampageController@destroy')->name('admin.teams.destroy');
});

Route::post('/contact', 'ContactformController@store')->name('contact.store');




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
