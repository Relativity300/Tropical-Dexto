<?php

class Rol
{

    private $idRol;
    private $nombreRol;

    public function __construct(){}

    public function setidRol($idRol)
    {
        $this->idRol = $idRol;
    }

    public function getidRol()
    {
        return $this->idRol;
    }

    public function setnombreRol($nombreRol)
    {
        $this->nombreRol = $nombreRol;
    }

    public function getnombreRol()
    {
        return $this->nombreRol;
    }
}
?>