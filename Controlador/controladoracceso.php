<?php
session_start(); //Usar variables de sesión

require_once("../Modelo/conexion.php"); //Incluir el archivo de conexion
require_once("../Modelo/usuario.php"); //incluir el modelo 
require_once("../Modelo/validaracceso.php");

class ControladorAcceso
{
    public function __construct()
    {}

    public function validarAcceso($correoElectronico, $contrasena)
    {
        $usuario = new Usuario();//incluir modelo
        $validarAcceso = new validarAcceso();
        $usuario->setcorreoElectronico($correoElectronico);
        $usuario->setcontrasenaUsuario($contrasena);
        return $validarAcceso->validarAcceso($usuario);
        
    }
}

$controladorAcceso = new ControladorAcceso();
if(isset($_POST['acceder']))
{
    
    
   
        

        
        $usuario=$controladorAcceso->validarAcceso($_POST['usuario'],$_POST['contrasena']);  
        if ($usuario->getexiste()==1)
        {
            $_SESSION['idusuario']=$usuario->getidUsuario(); //Almacena en variable de sesion el id del usuario
            $_SESSION['idrol']=$usuario->getidRol();

            if ($usuario->getestado() == 2) {

                echo '<script language="javascript">alert("Usuario inactivo");</script>';
        
                echo '<script>window.location="../Iniciar sesion/index.php";</script>';
        
                }
            header("Location:../Vista/menu.php");
        }
        else
        {   
           header("Location:../Iniciar sesion/index.php");
           
        }
    }
?>