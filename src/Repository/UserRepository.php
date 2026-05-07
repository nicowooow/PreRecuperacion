<?php
require_once __DIR__.'/../DB/Conexion.php';

class UserRepository
{
    public function getUser($username)
    {
        $conn = Conexion::getConexion();
        $sql = "select * from usuarios u where u.username = :u limit 1";
        $stmt = $conn->prepare($sql);

    }
}