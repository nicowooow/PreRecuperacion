<?php
require_once __DIR__ . '/../Repository/LibroRepository.php';
require_once __DIR__ . '/../DTO/LibroDTO.php';

class LibroService
{
    public function ActualizarPrecio($identificador, $precio)
    {
        $lr = new LibroRepository();
        $dato = $lr->getLibro($identificador);
        if ($lr->precioLibro($precio, $dato['id'])) {
            return ["message" => "se actualizo el precio correctamente", "success" => true];
        }
        return ["message" => "no se actualizo el precio correctamente", "success" => false];

    }

    public function ListarLibros()
    {
        $lr = new LibroRepository();
        $datos = $lr->getLibros();
//        return $datos;
        $lista = [];

//        echo(gettype($datos));
//        return ["array" => $datos];
        foreach ($datos as $dato) {
            $lista[] = new LibroDTO($dato['id'], $dato['isbn'], $dato['titulo'], $dato['precio']);
        }
        return $lista;

    }

    public function BuscarLibros($titulo, $precio)
    {
        $lr = new LibroRepository();
        $datos = $lr->searchLibros($titulo, $precio);
        $lista = [];
        foreach ($datos as $dato) {
            $lista[] = new LibroDTO($dato['id'], $dato['isbn'], $dato['titulo'], $dato['precio']);
        }
        return $lista;

    }

    public function BuscarLibrosTitulo($titulo)
    {
        $lr = new LibroRepository();
        $datos = $lr->searchLibrosTitulo($titulo);
        $lista = [];
        foreach ($datos as $dato) {
            $lista[] = new LibroDTO($dato['id'], $dato['isbn'], $dato['titulo'], $dato['precio']);
        }
        return $lista;

    }
}

//$lista = [];
//foreach ($datos as $dato) {
//    $lista[] = new Libro($dato['id'], $dato['isbn'], $dato['titulo'], $dato['precio']);
//}
//
//return $lista;
