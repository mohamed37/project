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

//_______________VISITOR______________________
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

 Auth::routes();

 Route::get('/', function () {
    return view('welcome');

 });

});
//_______________________AUTH__________________
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth'],
    ], function(){ 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resources([
//users
'users'=> App\Http\Controllers\Backend\UsersController::class,
//roles & premissions
'roles/permissions' => App\Http\Controllers\Backend\RolesController::class,
//clients
'clients' => App\Http\Controllers\Backend\ClientsController::class,
//vendors
'vendors' => App\Http\Controllers\Backend\VendorsController::class,
//pages
'pages' => App\Http\Controllers\Backend\PagesController::class,
//Settings
'settings' => App\Http\Controllers\Backend\SettingsController::class,
]);

});
