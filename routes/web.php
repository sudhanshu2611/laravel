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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/addPost', function () {
    // return view('addPost');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addPost/{id}', [App\Http\Controllers\AddPostController::class, 'index',"as"=>"checkurl"])->name('addPost')->middleware("auth");


Route::post('/addPost/save', [App\Http\Controllers\AddPostController::class, 'create'])->name('savepost');
Route::post('/updatePost/update', [App\Http\Controllers\AddPostController::class, 'updatepost'])->name('updatepost');

Route::group(['prefix'=>'admin','middleware'=>['auth','checkadmin']],function(){
	Route::get('/updatePost',function(){
return view("update");
} );
	
});