<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\EmployeesController;

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
    return view('auth.login');
});

Route::post('/auth/login', [AuthController::class, 'signInUser'])->name('auth.login');

Route::group(['middleware' => ['auth_check']], function (){

    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/main-page/main-page', [MainPageController::class, 'getMainPage'])
        ->name('main-page');

    //Employee routes

    Route::prefix('employees')->group(function(){
        Route::get('/list', [EmployeesController::class, 'list'])
            ->name('employees.list');
    });

});
