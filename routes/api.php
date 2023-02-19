<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['namespace' => 'Game', 'middleware' => 'jwt.auth'], function () {
    Route::get('/game', 'IndexController');
    Route::get('/game/create', 'CreateController');

    // GRUD store
    Route::post('/game', 'StoreController');
    // GRUD show
    Route::get('/game/{game}', 'ShowController');
    // GRUD game
    Route::get('/game/{game}/edit', 'EditController');
    // GRUD update
    Route::patch('/game/{game}', 'UpdateController');
    // GRUD delete
    Route::delete('/game/{game}', 'DestroyController');

});