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
Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";

});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('empleados', 'EmpleadoController@index')->name('empleado.index');
Route::get('empleado/create', 'EmpleadoController@create')->name('empleado.create');
Route::post('empleado', 'EmpleadoController@store')->name('empleado.store');
Route::get('empleado/{empleado}','EmpleadoController@show')->name('empleado.show');
Route::post('empleado/cambiar_estado','EmpleadoController@cambiar_estado')->name('empleado.cambiar_estado');

Route::get('empleado/{empleado}/edit','EmpleadoController@edit')->name('empleado.edit');
Route::put('empleado/{empleado}', 'EmpleadoController@update')->name('empleado.update');

Route::delete('empleado/{empleado}','EmpleadoController@destroy')->name('empleado.destroy');