<?php
header("Content-Type: application/json");

require_once __DIR__ . '/../Service/UserService.php';
$ur = new UserService();

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$role = $_POST['role'];

$resultado = $ur->register($usuario, $contrasena,$role);
echo json_encode($resultado);