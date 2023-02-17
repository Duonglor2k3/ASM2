<?php

use App\Router;
use App\Models\CategoryModel;
use App\Controllers\ProductController;
use App\Controllers\user\HomeController;
use App\Controllers\admin\HomeController as AdminHomeController;
use App\Controllers\admin\ProductController as AdminProductController;
use App\Controllers\admin\CategoryController as AdminCategoryController;
use App\Controllers\admin\UserController as AdminUserController;

require_once __DIR__ . "/../vendor/autoload.php";
session_start();
$router = new Router;

Router::get('/', function () {
    echo "HOME PAGE";
});
Router::get('/contact', [HomeController::class, 'contact']);
Router::get('/home', [HomeController::class, 'index']);
Router::get('/product', [ProductController::class, 'index']);
Router::get('/create-product', [ProductController::class, 'create']);
Router::post('/create-product', [ProductController::class, 'store']);
Router::get('/update-product', [ProductController::class, 'show']);
Router::post('/update-product', [ProductController::class, 'update']);
Router::get('/delete-product', [ProductController::class, 'delete']);
Router::get('/product-detail', [HomeController::class, 'detail']);
Router::get('/login', [HomeController::class, 'login']);
Router::post('/login', [HomeController::class, 'check_login']);
Router::get('/register', [HomeController::class, 'register']);
Router::post('/register', [HomeController::class, 'check_register']);
Router::get('/profile', [HomeController::class, 'profile']);
Router::post('/profile', [HomeController::class, 'change_profile']);
Router::get('/log_out', [HomeController::class, 'delete_session']);
Router::post('/post_comment', [HomeController::class, 'post_comment']);
Router::post('/addProduct', [HomeController::class, 'addProduct']);
Router::get('/cart', [HomeController::class, 'cart']);
Router::get('/delete_cart', [HomeController::class, 'deleteCart']);
Router::post('/change_cart', [HomeController::class, 'changeCart']);
Router::get('/admin', [AdminHomeController::class, 'index']);
Router::get('/admin/login', [AdminHomeController::class, 'index']);


//user
Router::get('/admin/user', [AdminUserController::class, 'index']);
//product
Router::get('/admin/product', [AdminProductController::class, 'index']);
Router::get('/admin/product/create', [AdminProductController::class, 'create']);
Router::post('/admin/product/create', [AdminProductController::class, 'store']);
Router::get('/admin/product/edit', [AdminProductController::class, 'edit']);
Router::post('/admin/product/edit', [AdminProductController::class, 'update']);
Router::get('/admin/product/delete', [AdminProductController::class, 'delete']);

//comment
Router::get('/admin/comment', [AdminHomeController::class, 'index']);
//category
Router::get('/admin/category', [AdminCategoryController::class, 'index']);
Router::get('/admin/category/create', [AdminCategoryController::class, 'create']);
Router::post('/admin/category/create', [AdminCategoryController::class, 'store']);
Router::get('/admin/category/edit', [AdminCategoryController::class, 'edit']);
Router::post('/admin/category/edit', [AdminCategoryController::class, 'update']);
Router::get('/admin/category/delete', [AdminCategoryController::class, 'delete']);
//bill
Router::get('/admin/bill', [AdminHomeController::class, 'index']);

$router->resolve();
