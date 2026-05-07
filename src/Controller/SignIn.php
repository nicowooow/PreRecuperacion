<?php
header("Content-Type: application/json");

require_once __DIR__ . '/../Repository/UserService.php.php';
$ur = new UserRepository();

$usuario = $_POST['usuario-l'];
$contrasena = $_POST['contrasena-l'];

$resultado = $ur->login($usuario, $contrasena);

echo json_encode($resultado);