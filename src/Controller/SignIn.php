<?php
header("Content-Type: application/json");

require_once __DIR__ . '/../Service/UserService.php';
$ur = new UserService();

$usuario = $_POST['usuario-l'];
$contrasena = $_POST['contrasena-l'];

if (!$usuario || !$contrasena || !$usuario && !$contrasena) {
    echo json_encode(["message" => "usuario o contraseña son incorrectos", "success" => false]);
    return;
}

$resultado = $ur->login($usuario, $contrasena);

echo json_encode($resultado);