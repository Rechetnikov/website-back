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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/atricles')->group(function () {
    
    Route::get('/', ['uses' => 'AtricleController@index']); // Все статьи
    Route::get('/{atricle_id}', ['uses' => 'AtricleController@show'])->where(['atricle_id' => '[0-9+]']); // Одна статья по ID

    Route::post('/', ['uses' => 'AtricleController@store']); // Создание статьи
    Route::put('/{atricle_id}', ['uses' => 'AtricleController@update'])->where(['atricle_id' => '[0-9+]']); // Изменение статьи по ID
    Route::delete('/{atricle_id}', ['uses' => 'AtricleController@destroy'])->where(['atricle_id' => '[0-9+]']); // Удаление статьи по ID

});


Route::prefix('/comments')->group(function () {
    
    Route::get('/', ['uses' => 'СommentController@index']); // Все комментарии
    Route::get('/{atricle_id}', ['uses' => 'СommentController@filter'])->where(['atricle_id' => '[0-9+]']); // Комментарии по ID статьи
    Route::get('/comment/{comment_id}', ['uses' => 'СommentController@show'])->where(['comment_id' => '[0-9+]']); // Комментарии по ID статьи


    Route::post('/', ['uses' => 'СommentController@store']); // Создание комментария
    Route::put('/{comment_id}', ['uses' => 'СommentController@update'])->where(['comment_id' => '[0-9+]']); // Изменение комментария по ID
    Route::delete('/{comment_id}', ['uses' => 'СommentController@destroy'])->where(['comment_id' => '[0-9+]']); // Удаление комментария по ID
    
});