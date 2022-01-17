<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CompaniesController;

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
        Route::get('/get-employees', [EmployeesController::class, 'get']);
        Route::get('/new', [EmployeesController::class, 'new'])
            ->name('new-employee');
        Route::post('/add', [EmployeesController::class, 'create'])
            ->name('create-employee');
        Route::post('/delete', [EmployeesController::class, 'delete']);
        Route::get('/edit/{id}', [EmployeesController::class, 'edit']);
        Route::post('/update', [EmployeesController::class, 'update'])
            ->name('update-employee');
    });

    //Company routes

    Route::prefix('companies')->group(function(){
        Route::get('/list', [CompaniesController::class, 'list'])
            ->name('companies.list');
        Route::get('/get-companies', [CompaniesController::class, 'get']);
        Route::get('/new', [CompaniesController::class, 'new'])
            ->name('new-company');
        Route::post('/add', [CompaniesController::class, 'create'])
            ->name('create-company');
        Route::get('/get-company-names', [CompaniesController::class, 'getCompanyNames']);
        Route::post('/delete', [CompaniesController::class, 'delete']);
        Route::get('/edit/{id}', [CompaniesController::class, 'edit']);
        Route::post('/update', [CompaniesController::class, 'update'])
            ->name('update-company');
        Route::post('/delete-logo', [CompaniesController::class, 'deleteLogo']);
    });

});
