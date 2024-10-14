<?php

namespace Controllers;

use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'post') {
        }

        // Render a la vista
        $router->render('auth/login', [
            'titulo' => 'Iniciar sesión'
        ]);
    }

    public static function logout()
    {
        echo "desde login";
    }

    public static function crear(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'post') {
        }

        // Render a la vista
        $router->render('auth/crear', [
            'titulo' => 'Crea tu cuenta'
        ]);
    }

    public static function olvide(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'post') {
        }

        // Render a la vista
        $router->render('auth/olvide', [
            'titulo' => 'Recupera tu contraseña'
        ]);
    }

    public static function restablecer(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'post') {
        }

        // Render a la vista
        $router->render('auth/restablecer', [
            'titulo' => 'Restablece tu contraseña'
        ]);
    }

    public static function mensaje(Router $router)
    {
        // Render a la vista
        $router->render('auth/mensaje', [
            'titulo' => 'Cuenta creada'
        ]);
    }

    public static function confirmar(Router $router)
    {
        // Render a la vista
        $router->render('auth/confirmar', [
            'titulo' => 'Cuenta confirmada'
        ]);
    }
}
