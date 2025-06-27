<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CartController;



// Public Routes
Route::get('/', [PublicController::class , 'homePage']);
Route::get('/categorizedProducts/{id}', [PublicController::class , 'categorizedProducts']);
Route::get('/singleProduct/{id}', [PublicController::class, 'singleProduct']);
Route::get('/allProducts', [PublicController::class, 'allProducts']);
Route::post('/search', [PublicController::class, 'search']);
// The End of Public Routes



// Register Routes
Route::get('/register', [UsersController::class, 'register']);
Route::post('/insertUser', [UsersController::class, 'insertUser']);
Route::get('/checkEmail/{email}', [UsersController::class, 'checkEmail']);
Route::get('/checkUsername/{username}', [UsersController::class, 'checkUsername']);
// The End of Register Routes



// Login Routes
Route::get('/login', [UsersController::class, 'login']);
Route::get('/logout', [UsersController::class, 'logout']);
Route::post('/signIn', [UsersController::class, 'signIn']);
Route::get('/userHome', [UsersController::class, 'userHome']);
// The End of Login Routes



// Admin Routes
Route::prefix('/administrator')->middleware('Admin')->group(function(){
    Route::get('', [AdminController::class, 'administrator']);
    Route::get('usersList', [AdminController::class, 'usersList']);
    Route::get('deleteUser/{id}', [AdminController::class, 'deleteUser']);
    Route::get('promoteUser/{id}', [AdminController::class, 'promoteUser']);
    Route::get('deposeUser/{id}', [AdminController::class, 'deposeUser']);

    // Categories
    Route::get('categories', [AdminController::class, 'categories']);
    Route::post('addCategory', [AdminController::class, 'addCategory']);
    Route::get('removeCategory/{id}', [AdminController::class, 'removeCategory']);
    Route::get('editCategory/{id}', [AdminController::class, 'editCategory']);
    Route::post('updateCategory', [AdminController::class, 'updateCategory']);
    // The end of categories

    // Products Section
    Route::get('products', [AdminController::class, 'products']);
    Route::get('addProduct', [AdminController::class, 'addProduct']);
    Route::post('insertProduct', [AdminController::class, 'insertProduct']);
    Route::get('deleteProduct/{id}', [AdminController::class, 'deleteProduct']);
    Route::get('editProduct/{id}', [AdminController::class, 'editProduct']);
    Route::get('deleteImage/{id}', [AdminController::class, 'deleteImage']);
    Route::post('updateProduct/{id}', [AdminController::class, 'updateProduct']);
    Route::post('imageAjax', [AdminController::class, 'imageAjax']);
    // The end of Products Section
});
// The End of Admin Routes



//Cart Routes
Route::prefix('cart')->middleware('UserCart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/update/{productId}', [CartController::class, 'update'])->name('cart.update');
});
//The end of Cart Routes