<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('components.layouts.app');
});

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'auth'])->name('auth');


Route::middleware('auth')->controller(CompanyController::class)->group(function () {
    Route::get('company', 'index')->name('index-company');
    Route::get('company/create', 'create')->name('create-company');
    Route::post('company/store', 'store')->name('store-company');
    Route::get('company/edit/{company}', 'edit')->name('edit-company');
    Route::put('company/update/{company}', 'update')->name('update-company');
    Route::get('company/delete/{company}', 'delete')->name('delete-company');
})->middleware('auth');

Route::middleware('auth')->controller(EmployeController::class)->group(function () {
    Route::get('employee', 'index')->name('index-employee');
    Route::get('employee/create', 'create')->name('create-employee');
    Route::post('employee/store', 'store')->name('store-employee');
    Route::get('employee/edit/{employee}', 'edit')->name('edit-employee');
    Route::put('employee/update/{employee}', 'update')->name('update-employee');
    Route::get('employee/delete/{employee}', 'delete')->name('delete-employee');
})->middleware('auth');



