<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExternalApi;
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

// Route::get('/', function () {
    // return view('welcome');
// });
Route::get('/', function () {
	$da="helo ss";
	$ex= ExternalApi::setCurrentDataFunction($da);
	$ex_1= ExternalApi::setCurrentDataFunction("sadasda");
	
    return $ex->getCurrentData()."--".$ex_1->getCurrentData();
    //return app(ExternalApi::class)->getCurrentData();
});
// Route::get('/addPost', function () {
    // return view('addPost');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addPost/', [App\Http\Controllers\AddPostController::class, 'index',"as"=>"checkurl"])->name('addPost');

Route::get("/addPost/ajax/get/",[App\Http\Controllers\AddPostController::class,"getajaxdata"])->name("ajaxpost_url");
Route::post('/addPost/save', [App\Http\Controllers\AddPostController::class, 'create'])->name('savepost');
Route::post('/updatePost/update', [App\Http\Controllers\AddPostController::class, 'updatepost'])->name('updatepost');

Route::group(['prefix'=>'admin','middleware'=>['auth','checkadmin']],function(){
	Route::get('/updatePost',function(){
return view("update");
} );

	
});