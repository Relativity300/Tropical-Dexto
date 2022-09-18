<?php

class detalleVenta
{
    private $id;
    private $idproducto;
    private $cantidad;
    private $precio;
    private $total;
    private $idusuarios;
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
    public function setidproducto($idproducto)
    {
        $this->idproducto = $idproducto;
    }

    public function getidproducto()
    {
        return $this->idproducto;
    }

    //
    public function setcantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getcantidad()
    {
        return $this->cantidad;
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
    public function settotal($total)
    {
        $this->total = $total;
    }

    public function gettotal()
    {
        return $this->total;
    }
    //
    public function setidusuarios($idusuarios)
    {
        $this->idusuarios = $idusuarios;
    }

    public function getidusuarios()
    {
        return $this->idusuarios;
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