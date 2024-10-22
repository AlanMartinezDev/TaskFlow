<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\DashboardController;
use Controllers\LoginController;
use MVC\Router;

$router = new Router();

// Iniciar sesión
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Crear cuenta
$router->get('/crear', [LoginController::class, 'crear']);
$router->post('/crear', [LoginController::class, 'crear']);

// Formulario para restablecer contraseña
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);

// Restablecer contraseña
$router->get('/restablecer', [LoginController::class, 'restablecer']);
$router->post('/restablecer', [LoginController::class, 'restablecer']);

// Confirmación de la cuenta
$router->get('/mensaje', [LoginController::class, 'mensaje']);
$router->get('/confirmar', [LoginController::class, 'confirmar']);

// Zona de proyectos
$router->get('/dashboard', [DashboardController::class, 'index']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
