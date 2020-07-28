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
    return view('layouts.app');
});

//первоначальная группа : пространство имен и префикс
$groupeDataFirst = [
    'namespace' => 'First',
    'prefix' => 'task',
];

// 1. делаем ресурсную  группу //
Route::group($groupeDataFirst , function () {
    // в массив мы можем докидывать методов для работы
    $methods= ['index'];
    Route::resource('first', 'FirstTaskController')
        ->only($methods);
});
