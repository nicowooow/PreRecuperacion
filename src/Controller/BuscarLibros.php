<?php

header("Content-Type: application/json");
require_once __DIR__ . '/../Service/LibroService.php';

$titulo = $_GET['titulo'];
$precio = $_GET['precio'] ?? 0;
//echo json_encode(["t" => $titulo, "p" => $precio]);
//exit;
$ls = new LibroService();
if ($precio < 0) {
    echo json_encode(["libros" => [], "message" => "datos de entrada incorrectos", "success" => false]);
    exit;
}
$resultado = $ls->BuscarLibros($titulo, $precio);
echo json_encode($resultado);
