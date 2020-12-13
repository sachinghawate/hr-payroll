<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/employee/payroll/{id}', 'PayrollController@payrollIndex')->name('payrolls.show');
Route::get('/payrolls/create/{id}', 'PayrollController@create')->name('payrolls.create');
Route::post('/payrolls/{id}', 'PayrollController@store')->name('payrolls.store');
Route::get('/employee/payroll/{id}/edit', 'PayrollController@edit')->name('payrolls.edit');
Route::patch('/payrolls/update/{id}', 'PayrollController@update')->name('payrolls.update');

Route::get('/payroll/payslip/{id}', 'DownloadController@payslip')->name('payslip.pdf');
Route::get('/payroll/send/{id}', 'DownloadController@sendMail')->name('payslip.send');

Route::resources([
    'roles' => 'RoleController',
    'employees' => 'EmployeeController',
]);


