<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DirectorsController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\StudiosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/movies',[MoviesController::class,'index']);
Route::post('/movies',[MoviesController::class,'store'])->middleware('auth:sanctum');
Route::patch('/movies/{id}',[MoviesController::class,'update'])->middleware('auth:sanctum');
Route::delete('/movies/{id}',[MoviesController::class,'destroy'])->middleware('auth:sanctum');

Route::get('/directors',[DirectorsController::class,'index']);
Route::post('/directors',[DirectorsController::class,'store'])->middleware('auth:sanctum');
Route::patch('/directors/{id}',[DirectorsController::class,'update'])->middleware('auth:sanctum');
Route::delete('/directors/{id}',[DirectorsController::class,'destroy'])->middleware('auth:sanctum');

Route::get('/actors',[ActorsController::class,'index']);
Route::post('/actors',[ActorsController::class,'store'])->middleware('auth:sanctum');
Route::patch('/actors/{id}',[ActorsController::class,'update'])->middleware('auth:sanctum');
Route::delete('/actors/{id}',[ActorsController::class,'destroy'])->middleware('auth:sanctum');

Route::get('/studios',[StudiosController::class,'index']);
Route::post('/studios',[StudiosController::class,'store'])->middleware('auth:sanctum');
Route::patch('/studios/{id}',[StudiosController::class,'update'])->middleware('auth:sanctum');
Route::delete('/studios/{id}',[StudiosController::class,'destroy'])->middleware('auth:sanctum');

Route::get('/categories',[CategoriesController::class,'index']);
Route::post('/categories',[CategoriesController::class,'store'])->middleware('auth:sanctum');
Route::patch('/categories/{id}',[CategoriesController::class,'update'])->middleware('auth:sanctum');
Route::delete('/categories/{id}',[CategoriesController::class,'destroy'])->middleware('auth:sanctum');

Route::post('/users/login', [UsersController::class, 'login']);
Route::get('/users', [UsersController::class, 'index'])->middleware('auth:sanctum');