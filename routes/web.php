<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});
Route::get('/greeting', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/userLogin',[UserController::class, 'userLogin']);
Route::get('/userList',[UserController::class, 'userList']);
Route::post('/reg',[UserController::class, 'userReg']);
// Route::get('/test', UserController@index);
