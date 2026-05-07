<?php
require_once __DIR__ . '/../Repository/UserRepository.php';
require_once __DIR__ . '/../DTO/UsuarioDTO.php';

class UserService
{
    public function login($usuario, $contrasena)
    {
//        return["u"=>$usuario,"c"=>$contrasena];
        $ur = new UserRepository();
        $user = $ur->getUser($usuario);
        if (!$user) return ["message" => "usuario o contraseña son incorrectos", "success" => false];

//        return["c1"=>$contrasena,"c2"=>$user->contrasena];
        if (!password_verify($contrasena, $user->contrasena)) return ["message" => "usuario o contraseña son incorrectos", "success" => false];
        $userDTO = new usuarioDTO($user->id,$user->usuario,$user->roleId);
        return ["user" => $userDTO, "message" => "usuario logueado", "success" => true];

    }

    public function register($usuario, $contrasena, $role)
    {
        $ur = new UserRepository();
        $exite = $ur->getUser($usuario);

        if ($exite) return ["message" => "usuario ya existente", "success" => false];

        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $user = $ur->postUser($usuario, $contrasena, $role);

        if (!$user) return ["message" => "hubo un error en ingresar el usuario", "success" => false];

        return ["message" => "usuario ingresado", "success" => true];


    }

}

