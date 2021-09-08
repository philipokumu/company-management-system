<?php

use App\Http\Livewire\CompaniesList;
use App\Http\Livewire\CreateCompany;
use App\Http\Livewire\CreateTodo;
use App\Http\Livewire\DeleteTodo;
use App\Http\Livewire\EmployeesList;
use App\Http\Livewire\TodosList;
use App\Http\Livewire\UpdateTodo;
use Illuminate\Support\Facades\Route;

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
    return redirect(route('login'));
});

Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/todos/create', CreateTodo::class)->name('todos.create');
    Route::get('/todos/{todo}/delete', DeleteTodo::class)->name('todos.destroy');
    Route::get('/todos/{todo}', UpdateTodo::class)->name('todos.edit');
    Route::get('/todos', TodosList::class)->name('todos.list');
    Route::resource('/companies',  App\Http\Controllers\CompanyController::class, ['names' => 'companies']);
    Route::resource('/companies/{company}/employees',  App\Http\Controllers\EmployeeController::class, ['names' => 'employees']);

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
