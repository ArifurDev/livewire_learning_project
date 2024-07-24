<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\AdminLogin;
use App\Livewire\Attribute;
use App\Livewire\Category;
use App\Livewire\CategoryEdit;
use App\Livewire\CategoryList;
use App\Livewire\Dashboard;
use App\Livewire\OrderInfoShow;
use App\Livewire\OrderInvoice;
use App\Livewire\OrderManagement;
use App\Livewire\ProductCreate;
use App\Livewire\ProductEdit;
use App\Livewire\ProductIndex;
use App\Livewire\Routes;
use App\Livewire\StoreManagement;
use App\Livewire\Subscribers;
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
Route::get('/dashboard/login', AdminLogin::class)->middleware('guest')->name('dashbord.login');

Route::middleware('auth')->group(function () {
    //Dashboard
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    //category
    Route::get('/category', Category::class)->name('category.create');
    Route::get('/category/list', CategoryList::class)->name('category.list');
    Route::get('/category/edit/{id}', CategoryEdit::class)->name('category.edit');

    //Attribute
    Route::get('/attribute', Attribute::class)->name('attribute');

    //product
    Route::get('/productes', ProductIndex::class)->name('product.index');
    Route::get('/product/create', ProductCreate::class)->name('product.create');
    Route::get('/product/edit/{id}/{slug}', ProductEdit::class)->name('product.edit');
    Route::get('/product/show/{id}/{slug}', ProductEdit::class)->name('product.show');

    //stock management
    Route::get('/stock/management', StoreManagement::class)->name('store.management.index');

    //order management
    Route::get('/order/management', OrderManagement::class)->name('order.management.index');
    Route::get('/order/information/show/{orderId}', OrderInfoShow::class)->name('order.info.show');
    Route::get('/order/invoice/show/{orderId}', OrderInvoice::class)->name('order.invoice.show');

    //route mangement
    Route::get('/routes/management', Routes::class)->name('routes.setup');

    //Subscribers
    Route::get('/subscribers', Subscribers::class)->name('subscribers.index');
});
require __DIR__ . '/auth.php';
