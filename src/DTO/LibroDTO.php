<?php

class LibroDTO
{
    public $id;
    public $isbn;
    public $titulo;
    public $precio;

    public function __construct($_id, $_isbn, $_titulo, $_precio)
    {
        $this->id = $_id;
        $this->isbn = $_isbn;
        $this->titulo = $_titulo;
        $this->precio = $_precio;
    }
}
