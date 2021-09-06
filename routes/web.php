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

// Main画面の表示
Route::get('pf', 'App\Http\Controllers\MainController@index');
Route::get('pf/work', 'App\Http\Controllers\WorkController@index');
Route::get('pf/work/{id}', 'App\Http\Controllers\WorkController@index');
// MySkilsのルートを追加予定

//Larabel-react間のデータ通信に利用
Route::get('work/json', 'App\Http\Controllers\WorkController@json');
Route::get('work/json/{id}', 'App\Http\Controllers\WorkController@json');

Route::get('menu/json', 'App\Http\Controllers\MenuController@json');
Route::get('menu/json/{id}', 'App\Http\Controllers\MenuController@json');

// Workの追加
Route::get('work/add', 'App\Http\Controllers\WorkController@add');
Route::post('work/add', 'App\Http\Controllers\WorkController@create');

// Workの削除
Route::get('work/del', 'App\Http\Controllers\WorkController@delete');
Route::post('work/del', 'App\Http\Controllers\WorkController@remove');

// MySkilsの追加
Route::get('skill/add', 'App\Http\Controllers\SkillController@add');
Route::post('skill/add', 'App\Http\Controllers\SkillController@create');
// MySkilsの削除
Route::get('skill/del', 'App\Http\Controllers\SkillController@delete');
Route::post('skill/del', 'App\Http\Controllers\SkillController@remove');
