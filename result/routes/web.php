<?php

use App\Http\Controllers\DishesController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DishesController::class,'index']);
Route::get('/get-restaurants',[DishesController::class,'getRestaurant']);
Route::get('/get-dishes',[DishesController::class,'getDishes']);
Route::get('/add-dishes',[DishesController::class,'addDishes']);
Route::get('/result',[DishesController::class,'getResult']);

