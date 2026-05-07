<?php
require_once __DIR__ . '/../Repository/UserRepository.php';

class UserService
{
    public function login($usuario, $contrasena)
    {
        $ur = new UserRepository();
        $user = $ur->getUser($usuario);

        if(!$user) return ["message" => "usuario o contraseña son incorrectos", "success" => false];
        return $user;

    }

    public function register($usuario, $contrasena)
    {
        $ur = new UserRepository();
        $exite = $ur->getUser($usuario);

        if ($exite) return ["message" => "usuario ya existente", "success" => false];

        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $user = $ur->postUser($usuario, $contrasena);

        if (!$user) return ["message" => "hubo un error en ingresar el usuario", "success" => false];

        return ["message" => "usuario ingresado", "success" => true];


    }

}