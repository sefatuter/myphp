<?php
require 'pdo_connect.php';
require 'core/Router.php';
require 'controllers/AuthController.php';

session_start();

$router = new Router([$conn]);

// GET routes
$router->get('', [AuthController::class, 'login']);
$router->get('login', [AuthController::class, 'login']);
$router->get('register', [AuthController::class, 'register']);
$router->get('dashboard', [AuthController::class, 'dashboard']);
$router->get('logout', [AuthController::class, 'logout']);

// POST routes
$router->post('login', [AuthController::class, 'login']);
$router->post('register', [AuthController::class, 'register']);

// Dispatch based on request
$uri = $_GET['page'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

$authController = new AuthController($conn); // Manual instance if needed
$router->dispatch($uri, $method);
