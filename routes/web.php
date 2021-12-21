<?php

use App\Http\Livewire\Items;
use App\Http\Livewire\Todos;
use App\Http\Livewire\Coisas;
use App\Http\Livewire\Products;
use App\Http\Livewire\Companies;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('todos', Todos::class);

Route::get('/produtos', Products::class);

Route::get('/itens', Items::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/compa', Companies::class)->name('companies');
