<?php
//session_start();
header("Content-Type: application/json");
require_once __DIR__ . '/../Service/UsuarioService.php';
$ur = new UsuarioService();

$usuario = $_POST['usuario'] ?? null;
$contrasena = $_POST['contrasena'] ?? null;

if (empty($usuario) || empty($contrasena)) {
    echo json_encode(["message" => "usuario o contraseña son incorrectos", "success" => false]);
    exit;
}

$resultado = $ur->login($usuario, $contrasena);

echo json_encode($resultado);