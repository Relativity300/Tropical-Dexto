<?php

class ValidarAcceso
{
    public function __construct()
    {}

    public function validarAcceso($usuario)
    {
        $Db = Db::Conectar();
        $sql = $Db->prepare('SELECT idusuario, idrol FROM usuarios
        WHERE
        
        correoelectronico = :correoelectronico
         AND contrasenausuario = :contrasenausuario
         AND estado = 1');
         //Preparar los parámetros
        
        $sql->bindValue('correoelectronico', $usuario->getcorreoElectronico()); 
        $sql->bindValue('contrasenausuario', $usuario->getcontrasenaUsuario());
        try
        {
            $sql->execute();
            $usuario->setExiste(0); //Guarda 0 en caso de que no exista, si existe cambia a 1
            if($sql->rowCount() > 0) //Determinar cuantas filas se devolvieron
            {
                $datosUsuario = $sql->fetch();//capturar los datos de un solo registro
                $usuario->setidUsuario($datosUsuario['idusuario']);
                $usuario->setidRol($datosUsuario['idrol']);
                $usuario->setcontrasenaUsuario('');
                $usuario->setExiste(1); 
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage(); //Mensaje de error
        }
        Db::CerrarConexion($Db);
        return $usuario; //retorna objeto
    }
}
?>