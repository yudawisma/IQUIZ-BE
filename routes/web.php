<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalController;



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



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth.basic')->group(function () {
    Route::get('/user', [UserController::class, 'profile']);
    Route::get('/quiz/{category}', [QuizController::class, 'getQuiz']);
    Route::post('/quiz/history', [QuizController::class, 'storeHistory']);
    Route::get('/history', [QuizController::class, 'history']);
    Route::post('/schedule', [JadwalController::class, 'store']);
    Route::get('/schedule', [JadwalController::class, 'show']);
});