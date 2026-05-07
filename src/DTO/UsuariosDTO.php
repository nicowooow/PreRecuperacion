<?php

class usuariosDTO
{
    public $id;
    public $username;
    public $contrasena;
    public $roleId;

    public static function usuariosDTO($_id, $_username, $_contrasena, $_roleId)
    {
        $this->id = $_id;
        $this->username = $_username;
        $this->contrasena = $_contrasena;
        $this->roleId = $_roleId;
    }
}
