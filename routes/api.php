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

// роуты нашего api coments, можно было реалиовать и группой

Route::get('comments', 'Comment\CommentController@commentIndex')->name('comments.index');
Route::post('comment', 'Comment\CommentController@commentCreate')->name('comment.create');
Route::put('comment/{id} ', 'Comment\CommentController@commentUpdate')->name('comment.update');

