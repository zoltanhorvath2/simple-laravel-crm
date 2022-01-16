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
        Route::get('/get-employees', [EmployeesController::class, 'getEmployees']);
        Route::get('/new', [EmployeesController::class, 'newEmployee'])
            ->name('new-employee');
        Route::post('/add', [EmployeesController::class, 'createEmployee'])
            ->name('create-employee');
    });

    //Company routes

    Route::prefix('companies')->group(function(){
        Route::get('/list', [CompaniesController::class, 'list'])
            ->name('companies.list');
        Route::get('/get-companies', [CompaniesController::class, 'getCompanies']);
        Route::get('/new', [CompaniesController::class, 'newCompany'])
            ->name('new-company');
        Route::post('/add', [CompaniesController::class, 'createCompany'])
            ->name('create-company');
    });

});
