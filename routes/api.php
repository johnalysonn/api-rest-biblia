<?php

use App\Http\Controllers\TestamentoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\VersiculoController;
use App\Http\Controllers\AuthController;

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
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::apiResources([
        '/livro' => LivroController::class,
        '/testamento' => testamentoController::class,
        '/versiculo' => VersiculoController::class
    ]);
    Route::post('/user', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'index'])->name('user.index');
    Route::get('/user/{user}', [AuthController::class, 'show'])->name('user.show');
});


Route::post('/user/register', [AuthController::class, 'register'])->name('user.register');
Route::post('/user', [AuthController::class, 'login']);
Route::put('/user/{user}', [AuthController::class, 'update'])->name('user.update');
Route::delete('/user/{user}', [AuthController::class, 'destroy'])->name('user.destroy');


