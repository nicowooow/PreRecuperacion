<?php
header("Content-Type: application/json");

require_once __DIR__ . '/../Repository/UserRepository.php';
$ur = new UserRepository();

$usuario = $_POST['usuario-l'];
$contrasena = $_POST['contrasena-l'];

$resultado = $ur->register($usuario, $contrasena);
echo json_encode();