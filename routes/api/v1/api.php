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

// Route::prefix('users')->group(function() {
//     Route::post('login', 'api\v1\LoginController@login');
// });

Route::group(['middleware' => ['guest:api']], function () {

    Route::get('/', function() {
        return 'Laravel Passport (Not Authenticated)';
    });

    Route::post('register', 'api\v1\UsersController@register');
    Route::post('login', 'api\v1\LoginController@login');

});

Route::group(['middleware' => ['auth:api']], function () {

    Route::get('users/me', 'api\v1\UsersController@me');
    Route::post('logout', 'api\v1\LoginController@logout');
});