<?php
require_once("../Modelo/conexion.php"); //Incluir el archivo de conexion
require_once("../Modelo/producto.php");
require_once("../Modelo/detalleventa.php");  
require_once("../Modelo/crudproducto.php");
require_once("../Modelo/cruddetalle.php");


class ControladorProducto
{
    public function __construct()
    {}

    public function listarProducto()
    {
        $crudProducto = new CrudProducto();
        return json_encode($crudProducto->listarProducto());
    }

    
    public function registrarProducto($nombre, $precio, $existencia, $foto)
    {
        $producto = new Producto();
        $crudProducto = new CrudProducto();
        $producto->setnombre($nombre);
        $producto->setprecio($precio);
        $producto->setexistencia($existencia);
        $producto->setfoto($foto);
        return $crudProducto->registrarProducto($producto);
    }

    public function buscarProducto($id)
    {
        $producto = new Producto();
        $crudProducto = new CrudProducto();
        return $crudProducto->buscarProducto($id);
    }

    public function buscarUsuario($idUsuario)
    {
        $producto = new Producto();
        $crudProducto = new CrudProducto();
        return $crudProducto->buscarUsuario($idUsuario);
    }

    public function consultarPrecio($id)
    {
        $crudProducto = new CrudProducto();
        return $crudProducto->consultarPrecio($id);
    }

    public function actualizarProducto($id, $nombre, $precio, $existencia, $foto) //atributos
    {
        $producto = new Producto();
        $crudProducto = new CrudProducto();
        $producto->setid($id);
        $producto->setnombre($nombre);
        $producto->setprecio($precio);
        $producto->setexistencia($existencia);
        $producto->setfoto($foto);
        return $crudProducto->actualizarProducto($producto);
    }

    public function eliminarProducto($id)
    {
        $producto = new Producto();
        $crudProducto = new CrudProducto();
        $producto->setid($id);
        return $crudProducto->eliminarProducto($producto);
    }

    public function desplegarVista($vista)
    {
        header("Location:".$vista); //Redireccionar a una página php
    }

    public function listarDetalle()
    {
        $cruddetalle = new CrudDetalle();
        return json_encode($cruddetalle->listarDetalle());
    }

    public function registrarDetalle($idproducto, $cantidad, $precio, $total, $idusuarios)
    {
        $detalleventa = new detalleVenta();
        $cruddetalle = new CrudDetalle();
        $detalleventa->setidproducto($idproducto);
        $detalleventa->setcantidad($cantidad);
        $detalleventa->setprecio($precio);
        $detalleventa->settotal($total);
        $detalleventa->setidusuarios($idusuarios);
        return $cruddetalle->registrarDetalle($detalleventa);
    }

    public function buscarDetalle($id)
    {
        $detalleventa = new detalleVenta();
        $cruddetalle = new CrudDetalle();
        return $cruddetalle->buscarDetalle($id);
    }

}

$controladorproducto = new ControladorProducto();


//Determinar la petición isset es una funcion que permite establecer si una variable existe o no en php
if(isset($_GET['registrarProducto']))
{
   $controladorproducto->desplegarVista('../Vista/registrarproducto.php');//enviar el name del input (desde el formulario)
  
}
elseif(isset($_POST['registrarProducto']))
{
    echo $controladorproducto->registrarProducto($_POST['nombre'],$_POST['precio'], $_POST['existencia'], $_POST['foto']); //enviar el name del input (desde el formulario)
    $controladorproducto->desplegarVista('../Vista/listarproducto.php'); 
}
elseif(isset($_GET['listarProducto']))
{
    $controladorproducto->desplegarVista('../Vista/listarproducto.php');
}
elseif(isset($_GET['editarProducto']))
{
    $id = $_GET['id'];
    $controladorproducto->desplegarVista('../Vista/editarproducto.php?id='.$id);
}
elseif(isset($_POST['editarProducto']))
{

    $controladorproducto->actualizarProducto($_POST['id'],$_POST['nombre'],$_POST['precio'],$_POST['existencia'],$_POST['foto']);
    $controladorproducto->desplegarVista('../Vista/listarproducto.php');
}
elseif(isset($_GET['buscarProducto']))
{
    $id = $_GET['id'];
    $controladorproducto->desplegarVista('../Vista/listardetalleproducto.php?id='.$id);
}
elseif(isset($_POST['eliminarProducto']))
{
    $id = $_POST['id'];
    echo $controladorproducto->eliminarProducto($_POST['id']);
    
   
}
elseif(isset($_GET['listarDetalle']))
{
    
    $controladorproducto->desplegarVista('../Vista/carrito.php');
}
if(isset($_GET['registrarDetalle']))
{
   $controladorproducto->desplegarVista('../Vista/listardetalleproducto.php');//enviar el name del input (desde el formulario)
  
}
elseif(isset($_POST['registrarDetalle']))
{
    echo $controladorproducto->registrarDetalle($_POST['idproducto'],$_POST['cantidad'], $_POST['precio'], $_POST['total'], $_POST['idusuarios']); //enviar el name del input (desde el formulario)
    $controladorproducto->desplegarVista('../Vista/carrito.php'); 
}
elseif(isset($_GET['buscarDetalle']))
{
    $id = $_GET['id'];
    $controladorproducto->desplegarVista('../Vista/carrito.php?id='.$id);
}
elseif(isset($_GET['buscarUsuario']))
{
    $idUsuario = $_GET['idusuario'];
    $controladorproducto->desplegarVista('../Vista/listardetalleproducto.php?id='.$idUsuario);
}

?>