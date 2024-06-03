<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\AdminLogin;
use App\Livewire\Attribute;
use App\Livewire\Category;
use App\Livewire\CategoryEdit;
use App\Livewire\CategoryList;
use App\Livewire\Dashboard;
use App\Livewire\Variants;
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
    //Dashboard
    Route::get('/dashboard', Dashboard::class)->name('dashbord');

    //category
    Route::get('/category', Category::class)->name('category.create');
    Route::get('/category/list', CategoryList::class)->name('category.list');
    Route::get('/category/edit/{id}', CategoryEdit::class)->name('category.edit');

    //variants
     //Route::get('/variants', Variants::class)->name('variants');

    //Attribute
     Route::get('/attribute', Attribute::class)->name('attribute');

});
require __DIR__.'/auth.php';
