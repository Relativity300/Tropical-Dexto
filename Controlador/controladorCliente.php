<?php
require_once("../Modelo/conexion.php"); //Incluir el archivo de conexion
require_once("../Modelo/usuario.php"); 
require_once("../Modelo/crudusuario.php");
require_once("../Modelo/rol.php");

class ControladorUsuario 
{
    public function __construct()
    {}

    public function listarUsuario()
    {
        $crudUsuario = new CrudUsuario();
        return json_encode($crudUsuario->listarUsuario());
    }



    public function registrarUsuario($nombreUsuario, $correoElectronico, $contrasenaUsuario, $estado, $idRol, $direccion, $telefono)
    {
        
        $usuario = new Usuario();
        $crudUsuario = new CrudUsuario();
        $usuario->setnombreUsuario($nombreUsuario);
        $usuario->setcorreoElectronico($correoElectronico);
        $usuario->setcontrasenaUsuario($contrasenaUsuario);
        $usuario->setestado($estado);
        $usuario->setidRol($idRol);
        $usuario->setdireccion($direccion);
        $usuario->settelefono($telefono);
        return $crudUsuario->registrarUsuario($usuario,'true');
    }

    public function buscarUsuario($idUsuario)
    {
        $usuario = new Usuario();
        $crudUsuario = new CrudUsuario();
        return $crudUsuario->buscarUsuario($idUsuario);
    }

    public function actualizarUsuario($idUsuario, $nombreUsuario, $correoElectronico, $contrasenaUsuario, $estado, $idRol, $direccion, $telefono) //atributos
    {
        $usuario = new Usuario();
        $crudUsuario = new CrudUsuario();
        $usuario->setidUsuario($idUsuario);
        $usuario->setnombreUsuario($nombreUsuario);
        $usuario->setcorreoElectronico($correoElectronico);
        $usuario->setcontrasenaUsuario($contrasenaUsuario);
        $usuario->setestado($estado);
        $usuario->setidRol($idRol);
        $usuario->setdireccion($direccion);
        $usuario->settelefono($telefono);
        return $crudUsuario->actualizarUsuario($usuario);
    }

    public function eliminarUsuario($idUsuario)
    {
        $usuario = new Usuario();
        $crudUsuario = new CrudUsuario();
        $usuario->setidUsuario($idUsuario);
        return $crudUsuario->eliminarUsuario($usuario);
    }

    
    public function desplegarVista($vista)
    {
        header("Location:".$vista); //Redireccionar a una página php
    }
    public function desplegarVista2($vista2)
    {
        header("Location:".$vista2); //Redireccionar a una página php
    }
}

$controladorusuario = new ControladorUsuario();


//Determinar la petición isset es una funcion que permite establecer si una variable existe o no en php
if(isset($_GET['registrarUsuario2']))
{
   $controladorusuario->desplegarVista('../Registro/registro.php');//enviar el name del input (desde el formulario)
   header('../vista/registrarUsuario');
}
elseif(isset($_POST['registrarUsuario2']))
{
    
    echo $controladorusuario->registrarUsuario($_POST['nombreusuario'],$_POST['correoelectronico'], $_POST['contrasenausuario'], $_POST['estado'], $_POST['idrol'], $_POST['direccion'], $_POST['telefono']); //enviar el name del input (desde el formulario)
    header('../vista/registrarUsuario');
} 




if(isset($_GET['registrarUsuario']))
{
   $controladorusuario->desplegarVista('../Registro/registro.php');//enviar el name del input (desde el formulario)
  
}
elseif(isset($_POST['registrarUsuario']))
{
    
    echo $controladorusuario->registrarUsuario($_POST['nombreusuario'],$_POST['correoelectronico'], $_POST['contrasenausuario'], $_POST['estado'], $_POST['idrol'], $_POST['direccion'], $_POST['telefono']); //enviar el name del input (desde el formulario)
    $controladorusuario->desplegarVista('../Vista/menu.php'); 
} 
elseif(isset($_GET['listarUsuario']))
{
    $controladorusuario->desplegarVista('../Vista/listarusuario.php');
}
elseif(isset($_GET['editarUsuario']))
{
    $idUsuario = $_GET['idusuario'];
    $controladorusuario->desplegarVista('../Vista/editarusuario.php?idUsuario='.$idUsuario);
}
elseif(isset($_POST['editarUsuario']))
{

    $controladorusuario->actualizarUsuario($_POST['idusuario'],$_POST['nombreusuario'],$_POST['correoelectronico'],$_POST['contrasenausuario'],$_POST['estado'],$_POST['idrol'], $_POST['direccion'], $_POST['telefono']);
    $controladorusuario->desplegarVista('../Vista/listarusuario.php');
}
elseif(isset($_POST['eliminarUsuario']))
{
    $idUsuario = $_POST['idusuario'];
    echo $controladorusuario->eliminarUsuario($_POST['idusuario']);
    
   
}

?>