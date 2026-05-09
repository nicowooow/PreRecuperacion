<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../Service/LibroService.php';
$ls = new LibroService();
$identificador = $_POST['nombre-isbn'];
$precio = $_POST['precio'];

if (empty($identificador) || $precio < 0) {
    echo json_encode(["message" => "isbn o precio incorrectos", "success" => false]);
    exit;
}
$resultado = $ls->ActualizarPrecio($identificador, $precio);
echo json_encode($resultado);