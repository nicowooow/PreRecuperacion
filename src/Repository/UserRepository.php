<?php
require_once __DIR__.'/../DB/Conexion.php';
require_once __DIR__.'/../Model/Usuario.php';

class UserRepository
{
    public function getUser($username)
    {
        $conn = Conexion::getConexion();
        $sql = "select * from usuarios u where u.username = :u limit 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
           ":u"=> $username
        ]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$usuario) return null;

        return new Usuario($usuario['id'],$usuario['username'],$usuario['contrasena'],$usuario['role_id']);

    }

    public function postUser($username,$contrasena,$roleId)
    {
        $conn = Conexion::getConexion();
        $sql = "insert into usuarios (username,contrasena,role_id) values (:u,:c,:r) ret";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":u"=> $username,
            ":c"=> $contrasena,
            ":r"=> $roleId
        ]);
        if($stmt->affected_rows > 0){
            return true;
        }
            return false;

    }
}