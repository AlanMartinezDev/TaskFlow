<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $usuario = new Usuario;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            if (empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);

                if ($existeUsuario) {
                    Usuario::setAlerta('error', 'El email ya existe');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear la contraseña
                    $usuario->hashPassword();

                    // Eliminar password2
                    unset($usuario->password2);

                    // Generar el token
                    $usuario->crearToken();

                    // Crear un nuevo usuario
                    $resultado = $usuario->guardar();

                    // Enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        // Render a la vista
        $router->render('auth/crear', [
            'titulo' => 'Crea tu cuenta',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function olvide(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        // Render a la vista
        $router->render('auth/olvide', [
            'titulo' => 'Recupera tu contraseña'
        ]);
    }

    public static function restablecer(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $alertas = [];

        $token = s($_GET['token']);

        if (!$token) header('Location: /');

        // Encontrar al usuario con este token
        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token no válido');
        } else {
            // Confirmar la cuenta
            unset($usuario->password2);
            $usuario->token = null;
            $usuario->confirmado = 1;
            $usuario->guardar();

            Usuario::setAlerta('exito', 'La cuenta ha sido confirmada');
        }

        $alertas = Usuario::getAlertas();

        // Render a la vista
        $router->render('auth/confirmar', [
            'titulo' => 'Cuenta confirmada',
            'alertas' => $alertas
        ]);
    }
}
