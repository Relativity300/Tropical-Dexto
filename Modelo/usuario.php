<?php

class Usuario
{
    private $idUsuario;
    private $nombreUsuario;
    private $correoElectronico;
    private $contrasenaUsuario;
    private $estado;
    private $idRol;
    private $direccion;
    private $telefono;
    private $existe;

    public function __construct()
    {}

    public function setidUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getidUsuario()
    {
        return $this->idUsuario;
    }
    //
    public function setnombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function getnombreUsuario()
    {
        return $this->nombreUsuario;
    }

    //
    public function setcorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;
    }

    public function getcorreoElectronico()
    {
        return $this->correoElectronico;
    }
    //
    public function setcontrasenaUsuario($contrasenaUsuario)
    {
        $this->contrasenaUsuario = $contrasenaUsuario;
    }

    public function getcontrasenaUsuario()
    {
        return $this->contrasenaUsuario;
    }
    //
    public function setestado($estado)
    {
        $this->estado = $estado;
    }

    public function getestado()
    {
        return $this->estado;
    }

    //
    public function setidRol($idRol)
    {
        $this->idRol = $idRol;
    }

    public function getidRol()
    {
        return $this->idRol;
    }
    //
    public function setdireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getdireccion()
    {
        return $this->direccion;
    }

    //
    public function settelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function gettelefono()
    {
        return $this->telefono;
    }



    //
    public function setexiste($existe)
    {
        $this->existe = $existe;
    }

    public function getexiste()
    {
        return $this->existe;
    }



}
?>