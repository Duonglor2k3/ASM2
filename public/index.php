<?php

use App\Router;
use App\Models\CategoryModel;
use App\Controllers\ProductController;
use App\Controllers\user\HomeController;

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

$router->resolve();
