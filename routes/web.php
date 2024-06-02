<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\AdminLogin;
use App\Livewire\Category;
use App\Livewire\CategoryEdit;
use App\Livewire\CategoryList;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/* admin login */
Route::get('/dashboard/login',AdminLogin::class)->middleware('guest')->name('dashbord.login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashbord');

    Route::get('/category', Category::class)->name('category.create');
    Route::get('/category/list', CategoryList::class)->name('category.list');
    Route::get('/category/edit/{id}', CategoryEdit::class)->name('category.edit');

});
require __DIR__.'/auth.php';
