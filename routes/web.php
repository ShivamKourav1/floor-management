<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\COntroller;
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

Route:: any('/login',[Controller::class, 'login']);
Route:: any('/logout',[Controller::class, 'logout']);
Route:: any('/validatelogin',[Controller::class, 'validatelogin']);

Route:: group(['middleware'=>'user_auth'],
function(){
Route:: any('/floor_view',[Controller::class, 'floor_view']);
Route:: any('/dashboard',[Controller::class, 'dashboard']);
Route:: any('/floor_new',function () {
    return view('floor_new');
});
Route:: post('/floor_add',[Controller::class, 'floor_add']);

});

