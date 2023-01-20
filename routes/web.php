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
Route::get('/', 'homeController@index');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/test', function () {
//     return "test";
// });

//Route::group ------------ Для одноименного типа контроллеров
Route::group(['namespace' => 'Post'], function() {
    Route::get('/post', 'IndexController')->name('post.index');
    Route::get('/post/create', 'CreateController')->name('post.create');
    
    // GRUD store
    Route::post('/post', 'StoreController')->name('post.store');
    // GRUD show
    Route::get('/post/{post}', 'ShowController')->name('post.show');
    // GRUD edit
    Route::get('/post/{post}/edit', 'EditController')->name('post.edit');
    // GRUD update
    Route::patch('/post/{post}', 'UpdateController')->name('post.update');
    // GRUD delete
    Route::delete('/post/{post}', 'DestroyController')->name('post.destroy');
});

//admin panel-----------------------------------------------------------
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    
    Route::group(['namespace' => 'Post'], function() {
        Route::get('/post', 'IndexController')->name('admin.post.index');
    });
});


//Route:: ------------ Обычный вариант контроллеров

// Route::get('/post', 'PostController@index')->name('post.index');
// Route::get('/post/create', 'PostController@create')->name('post.create');

// // GRUD store
// Route::post('/post', 'PostController@store')->name('post.store');
// // GRUD show
// Route::get('/post/{post}', 'PostController@show')->name('post.show');
// // GRUD edit
// Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
// // GRUD update
// Route::patch('/post/{post}', 'PostController@update')->name('post.update');
// // GRUD delete
// Route::delete('/post/{post}', 'PostController@destroy')->name('post.destroy');

//Test GRUD for category --resource - Ресурсный вариант контроллеров
Route::resource('/categorys', 'CategoryController');

//Test GRUD for game --resource - Ресурсный вариант контроллеров
Route::resource('/games', 'GameController');


Route::get('/post/update', 'PostController@update');
Route::get('/post/delete', 'PostController@delete');
Route::get('/post/firstOrCreate', 'PostController@firstOrCreate');
Route::get('/post/updateOrCreate', 'PostController@updateOrCreate');

Route::get('/main', 'MainController@index')->name('main.index');
Route::get('/about', 'AboutController@index')->name('about.index');
Route::get('/contacts', 'ContactController@index')->name('contact.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
