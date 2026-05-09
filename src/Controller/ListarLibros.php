<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../Service/LibroService.php';
$ls = new LibroService();
$resultado = $ls->ListarLibros();
echo json_encode($resultado);