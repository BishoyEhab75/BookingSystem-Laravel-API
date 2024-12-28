<?php

use App\Http\Controllers\Admin\Admin_loginController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Business\ServiceController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::apiResource('user', UserController::class);
Route::apiResource('business', BusinessController::class);

Route::post('admin_login', [Admin_loginController::class, 'login'])->name('admin_login');
Route::post('showloginform', [Admin_loginController::class, 'showloginform'])->name('login_form');
Route::post('logout', [Admin_loginController::class, 'logout'])->name('logout');

Route::post('update_business', [BusinessController::class, 'update']);

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('service', ServiceController::class);
    Route::post('update_service/{id}', [ServiceController::class, 'update']);
    
    Route::apiResource('booking', BookingController::class);
 
    Route::apiResource('review', ReviewController::class);
    Route::get('business_reviews/{id}', [ReviewController::class, 'business_review']);
    Route::post('update_review/{id}', [ReviewController::class, 'update']);
});

Route::get('/auth', function (Request $request) {
    return response()->json(['message' => 'please login first']);
});