<?php

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

//注册页面
Route::get('/register','\App\Http\Controllers\RegisterController@index');
//注册提交
Route::post('/register','\App\Http\Controllers\RegisterController@register');
//登录页面
Route::get('/login','\App\Http\Controllers\LoginController@index');
//登录提交
Route::post('/login','\App\Http\Controllers\LoginController@login');
//登出
Route::get('/logout','\App\Http\Controllers\LoginController@logout');
//个人设置
Route::get('/user/setting','\App\Http\Controllers\UserController@index');
//个人设置提交
Route::post('user/setting','\App\Http\Controllers\UserController@setting');

//文章列表
Route::get('/posts','\App\Http\Controllers\PostController@index');
//文章创建
Route::get('/posts/create','\App\Http\Controllers\PostController@create');
Route::post('/posts','\App\Http\Controllers\PostController@store');
//文章详情
Route::get('/posts/{post}','\App\Http\Controllers\PostController@show');
//文章编辑
Route::get('/posts/{post}/edit','\App\Http\Controllers\PostController@edit');
Route::put('/posts/{post}','\App\Http\Controllers\PostController@update');
//文章删除
Route::get('/posts/{post}/delete','\App\Http\Controllers\PostController@delete');
