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
Route::fallback(function(){
    return redirect('/home');
});
Route::get('/', function () {
    return view('auth.login');
});

Route::resource('/htmleditor', 'App\Http\Controllers\HtmlEditorController');
Route::resource('/team_management' , 'App\Http\Controllers\TeamManagementController');
Route::resource('/task_management' , 'App\Http\Controllers\TaskManagementController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
