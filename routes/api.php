<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProvinceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Provinces routes
Route::get('get-provincies', [ProvinceController::class, 'index']);
Route::get('get-province/{province}', [ProvinceController::class, 'show']);

// Person routes
Route::get('get-people', [PersonController::class, 'index']);
Route::get('get-person/{person}', [PersonController::class, 'show']);
Route::post('set-person', [PersonController::class, 'store']);
Route::put('update-person/{person}', [PersonController::class, 'update']);
Route::delete('delete-person/{person}', [PersonController::class, 'destroy']);
Route::get('get-people-trashed', [PersonController::class, 'getOnlyTrashed']);
Route::put('restore-person-trashed/{id}', [PersonController::class, 'restoreTrashed']);
