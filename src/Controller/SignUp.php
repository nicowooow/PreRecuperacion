<?php
header("Content-Type: application/json");

require_once __DIR__ . '/../Service/UsuarioService.php';
$ur = new UsuarioService();

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$role = $_POST['role'];

if (empty($usuario) || empty($contrasena)) {
    echo json_encode(["message" => "debes introducir credenciales validas", "success" => false]);
    exit;
}


$resultado = $ur->register($usuario, $contrasena, $role);
echo json_encode($resultado);