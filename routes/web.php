<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

// ログイン画面
Route::get('auth', 'App\Http\Controllers\MainController@getAuth');
Route::post('auth', 'App\Http\Controllers\MainController@postAuth');

// ログイン処理
Route::post('logout', 'App\Http\Controllers\MenuController@getLogout');

// 登録画面（非公開）
//Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

// Main画面の表示
Route::get('pf', 'App\Http\Controllers\MainController@index')->middleware('auth');
Route::get('pf/work', 'App\Http\Controllers\WorkController@index')->middleware('auth');
Route::get('pf/work/{id}', 'App\Http\Controllers\WorkController@index')->middleware('auth');

//Larabel-react間のデータ通信に利用
Route::get('work/json', 'App\Http\Controllers\WorkController@json');
Route::get('work/json/{id}', 'App\Http\Controllers\WorkController@json');

Route::get('menu/json', 'App\Http\Controllers\MenuController@json');
Route::get('menu/json/{id}', 'App\Http\Controllers\MenuController@json');

Route::get('work/menu/json', 'App\Http\Controllers\MenuController@json');
Route::get('work/menu/json/{id}', 'App\Http\Controllers\MenuController@json');

Route::get('skill/menu/json', 'App\Http\Controllers\MenuController@json');
Route::get('skill/menu/json/{id}', 'App\Http\Controllers\MenuController@json');


// Workの追加
Route::get('work/add', 'App\Http\Controllers\WorkController@add')->middleware('auth');
Route::post('work/add', 'App\Http\Controllers\WorkController@create');

// Workの一覧
Route::get('work/list', 'App\Http\Controllers\WorkController@list')->middleware('auth');
Route::post('work/list', 'App\Http\Controllers\WorkController@judge');

// Workの変更
Route::get('work/edit', 'App\Http\Controllers\WorkController@edit')->name('wedit')->middleware('auth');
Route::post('work/edit', 'App\Http\Controllers\WorkController@update');


// MySkilsの追加
Route::get('skill/add', 'App\Http\Controllers\SkillController@add')->middleware('auth');
Route::post('skill/add', 'App\Http\Controllers\SkillController@create');

// MySkillsの一覧
Route::get('skill/list', 'App\Http\Controllers\SkillController@list')->middleware('auth');
Route::post('skill/list', 'App\Http\Controllers\SkillController@judge');

// MySkillsの変更
Route::get('skill/edit', 'App\Http\Controllers\SkillController@edit')->name('edit')->middleware('auth');
Route::post('skill/edit', 'App\Http\Controllers\SkillController@update');