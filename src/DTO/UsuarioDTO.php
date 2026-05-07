<?php

class usuarioDTO
{
    public $id;
    public $username;
    public $roleId;

    public function __construct($_id, $_username, $_roleId)
    {
        $this->id = $_id;
        $this->username = $_username;
        $this->roleId = $_roleId;
    }
}
