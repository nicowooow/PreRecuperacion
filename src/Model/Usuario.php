<?php

class Usuario
{
    public $id;
    public $username;
    public $roleId;
    public $contrasena;

    public function _construct($_id, $_username, $_contrasena, $_roleId)
    {
        $this->id = $_id;
        $this->username = $_username;
        $this->contrasena = $_contrasena;
        $this->roleId = $_roleId;
    }
}
