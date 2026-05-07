<?php
header("Content-Type: application/json");

require_once __DIR__ . '/../Service/UserService.php';
$ur = new UserService();

$usuario = $_POST['usuario-r'];
$contrasena = $_POST['contrasena-r'];
$role = $_POST['role-r'];

$resultado = $ur->register($usuario, $contrasena,$role);
echo json_encode($resultado);