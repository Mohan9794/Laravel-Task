<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// require __DIR__.'/auth.php';

// Route::resource('tasks', MasterController::class);

//======== record ========//

Route::get('/', [MasterController::class, 'index'])->name('/');
Route::get('add-record', [MasterController::class, 'create'])->name('add-record');
Route::get('/record/{id}', [MasterController::class, 'Record_Update'])->name('record');
Route::post('store-record', [MasterController::class, 'store'])->name('store-record');
Route::get('edit-record/{id}', [MasterController::class, 'edit'])->name('edit-record');
Route::get('/delete-record/{id}', [MasterController::class, 'destroy'])->name('delete-record');
Route::post('/update-record/{id}', [MasterController::class, 'update'])->name('update-record');

