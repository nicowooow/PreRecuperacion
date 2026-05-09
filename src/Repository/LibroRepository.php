<?php
require_once __DIR__ . '/../DB/Conexion.php';

class LibroRepository
{
    public function precioLibro($precio, $id)
    {
        $conn = Conexion::getConexion();
        $sql = "update libros set precio = :p where id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":p" => $precio,
            ":id" => $id
        ]);
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function getLibros()
    {
        $conn = Conexion::getConexion();
        $sql = "select * from libros";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $lista = [];
//        while ($libro = $stmt->fetch(PDO::FETCH_ASSOC)) {
//            $lista[] = $libro;
//        }
//        return $lista;
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;

    }

    public function getLibro($identificador)
    {
        $conn = Conexion::getConexion();
        $sql = "select * from libros l where l.isbn like :iden or l.titulo like :iden";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':iden' => "%{$identificador}%"
        ]);
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos[0];
    }

    public function searchLibros($titulo, $precio)
    {

        $conn = Conexion::getConexion();
        $sql = "select * from libros l where (l.isbn like :iden or l.titulo like :iden) and precio <= :p ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':iden' => "%{$titulo}%",
            ':p' => $precio
        ]);
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    public function searchLibrosTitulo($titulo)
    {

        $conn = Conexion::getConexion();
        $sql = "select * from libros l where (l.isbn like :iden or l.titulo like :iden) ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':iden' => "%{$titulo}%",
        ]);
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
}