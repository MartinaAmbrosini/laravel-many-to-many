<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1'], function () {

    Route::get('test', [ApiController::class, 'getTest']);

    Route::get('technologies', [ApiController::class, 'getTechnologies']);

    Route::post('technologies', [ApiController::class, 'createTechnologies']);
});
