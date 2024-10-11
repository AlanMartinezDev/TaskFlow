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

    public static function olvide()
    {
        echo "desde olvide";

        if ($_SERVER['REQUEST_METHOD'] === 'post') {
        }
    }

    public static function restablecer()
    {
        echo "desde restablecer";

        if ($_SERVER['REQUEST_METHOD'] === 'post') {
        }
    }

    public static function mensaje()
    {
        echo "desde mensaje";
    }

    public static function confirmar()
    {
        echo "desde confirmar";
    }
}
