<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/top', [SearchController::class, 'showTop'])
->name('top');

Route::get('/routelist', [SearchController::class, 'searchRoute'])
->name('routelist');

Route::get('/login', [AuthController::class, 'showLogin'])
->name('login');

Route::post('/login', [AuthController::class, 'login'])
->name('login');

Route::post('/logout', [AuthController::class, 'logout'])
->name('logout');

Route::get('/userinfo/regist', [UserController::class, 'showRegistUserInfo'])
->name('userinfo.regist');

Route::post('/userinfo/regist', [UserController::class, 'registUserInfo'])
->name('userinfo.regist');

Route::get('/userinfo/regist', [UserController::class, 'showRegistUserInfo'])
->name('userinfo.regist');

Route::post('/userinfo/regist', [UserController::class, 'registUserInfo'])
->name('userinfo.regist');

Route::get('/userinfo/update', [UserController::class, 'showUpdateUserInfo'])
->middleware('auth')
->name('userinfo.update');

Route::post('/userinfo/update', [UserController::class, 'updateUserInfo'])
->middleware('auth')
->name('userinfo.update');

Route::get('/userinfo/delete', [UserController::class, 'showDeleteUserInfo'])
->middleware('auth')
->name('userinfo.delete');

Route::post('/userinfo/delete', [UserController::class, 'deleteUserInfo'])
->middleware('auth')
->name('userinfo.delete');

Route::get('/userinfo/{public_id}', [UserController::class, 'showUserInfo'])
->name('userinfo');
