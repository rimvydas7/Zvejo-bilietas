<?php

use App\Http\Controllers\Api\LakeController;
use App\Http\Controllers\Api\TicketController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/lakes', [LakeController::class, 'index'])->name('lakes');

Route::get('/assigned/{id}', [LakeController::class, 'assigned'])->name('assigned');

Route::post('/ticket', [TicketController::class, 'store'])->name('ticket.store');

Route::get('/ticket/{link}', [TicketController::class, 'index'])->name('ticket.view');

