<?php

class Producto
{
    private $id;
    private $nombre;
    private $precio;
    private $existencia;
    private $foto;
    private $existe;

    public function __construct()
    {}

    public function setid($id)
    {
        $this->id = $id;
    }

    public function getid()
    {
        return $this->id;
    }
    //
    public function setnombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getnombre()
    {
        return $this->nombre;
    }

    //
    public function setprecio($precio)
    {
        $this->precio = $precio;
    }

    public function getprecio()
    {
        return $this->precio;
    }
    //
    public function setexistencia($existencia)
    {
        $this->existencia = $existencia;
    }

    public function getexistencia()
    {
        return $this->existencia;
    }
    //
    public function setfoto($foto)
    {
        $this->foto = $foto;
    }

    public function getfoto()
    {
        return $this->foto;
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