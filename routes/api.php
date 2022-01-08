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
//Route::get('/test-api', [\App\Http\Controllers\TestController::class, 'test']);
Route::post('/save-diagram', [\App\Http\Controllers\DataController::class, 'saveDataDiagram']);
Route::get('/data-get', [\App\Http\Controllers\DataController::class, 'getDataDiagram']);

