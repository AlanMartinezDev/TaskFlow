<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '62a319945ae88d';
        $mail->Password = 'ea8e05427140c0';

        $mail->setFrom('cuentas@taskflow.com');
        $mail->addAddress('cuentas@taskflow.com', 'TaskFlow.com');
        $mail->Subject = 'Confirma tu cuenta';

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong> has creado tu cuenta en TaskFlow, solo debes confirmarla en el siguiente enlace:</p>";
        $contenido .= "<a href='http://localhost:4321/confirmar?token=" . $this->token . "'>Confirmar cuenta</a>";
        $contenido .= '<p>En el caso de que no hayas creado esta cuenta, por favor, ignora este mensaje.</p>';
        $contenido .= '</html>';

        $mail->Body = $contenido;

        // Enviar el email
        $mail->send();
    }

    public function enviarInstrucciones()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '62a319945ae88d';
        $mail->Password = 'ea8e05427140c0';

        $mail->setFrom('cuentas@taskflow.com');
        $mail->addAddress('cuentas@taskflow.com', 'TaskFlow.com');
        $mail->Subject = 'Restablece tu contraseña';

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong> parece que has olvidado tu contraseña, puedes restablecerla en el siguiente enlace:</p>";
        $contenido .= "<a href='http://localhost:4321/restablecer?token=" . $this->token . "'>Restablecer contraseña</a>";
        $contenido .= '<p>En el caso de que no quieras restablecer tu contraseña, por favor, ignora este mensaje.</p>';
        $contenido .= '</html>';

        $mail->Body = $contenido;

        // Enviar el email
        $mail->send();
    }
}
