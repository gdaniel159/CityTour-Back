<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class EnviarContraseña extends Mailable
{
    public $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function build()
    {
        return $this->view('emails.enviar-contrasena')
            ->subject('Contraseña generada')
            ->with(['password' => $this->password]);
    }
}