<?php
use App\Http\Controllers\TodoController;
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
    return to_route('todos.index');
});

Auth::routes();

Route::prefix('todos')->as('todos.')->middleware('auth')->group(function(){
    Route::get('/', [TodoController::class, 'index'])->name('index');
    Route::get('create', [TodoController::class, 'create'])->name('create');
    Route::get('/{todo}/edit', [TodoController::class, 'updTask'])->name('updTask');
    Route::post('update', [TodoController::class, 'update'])->name('update');
    Route::put('/{todo}', [TodoController::class, 'edit'])->name('edit');
    Route::get('/{todo}', [TodoController::class, 'show'])->name('show');
    Route::delete('/{todo}', [TodoController::class, 'delete'])->name('delete');
});


