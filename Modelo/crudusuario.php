<?php
class CrudUsuario
{
    public function __construct()
    {}

    /*public function listarUsuario()
    {
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->query('SELECT * FROM usuarios');//Definir la sentencia sql
        $sql->execute();//ejecutar la consulta
        Db::CerrarConexion($Db);
        return $sql->fetchAll(); //retorna todos los registros obtenindos en la consulta
       
    }*/

    public function listarUsuario()
    {
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->query('SELECT usuarios.*,roles.nombrerol AS nombrerol
        FROM usuarios
        INNER JOIN roles ON usuarios.idrol = roles.idrol
        
        ORDER BY idusuario ASC');//Definir la sentencia sql
        $sql->execute();//ejecutar la consulta
        Db::CerrarConexion($Db);
        return $sql->fetchAll(); //retorna todos los registros obtenindos en la consulta
       
    }

    public function registrarUsuario($usuario)
    {
        $mensaje = "";
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->prepare('INSERT INTO
         usuarios(nombreusuario, correoelectronico, contrasenausuario, estado, idrol, direccion, telefono) VALUES
         (:nombreusuario, :correoelectronico, :contrasenausuario, :estado, :idrol, :direccion, :telefono)'); //acá se pueden definir diferentes
         $sql->bindvalue('nombreusuario', $usuario->getnombreUsuario());
         $sql->bindvalue('correoelectronico', $usuario->getcorreoElectronico());
         $sql->bindvalue('contrasenausuario', $usuario->getcontrasenaUsuario());
         $sql->bindvalue('estado', $usuario->getestado());
         $sql->bindvalue('idrol', $usuario->getidRol());
         $sql->bindvalue('direccion', $usuario->getdireccion());
         $sql->bindvalue('telefono', $usuario->gettelefono());

        try{
            $sql->execute();
            $mensaje = "Registro Exitoso";
        }
        catch(Exception $e)
        {
            $mensaje = $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }

    public function buscarUsuario($idUsuario)
    {
        $usuario = new Usuario();
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->prepare('SELECT * FROM usuarios
        WHERE idusuario=:idusuario');
        $sql->bindvalue('idusuario', $idUsuario);

        try{
            $sql->execute();
            $registro = $sql->fetch(); //cuando se requiere solo un registro
            $usuario->setidUsuario($registro['idusuario']);
            $usuario->setnombreUsuario($registro['nombreusuario']);
            $usuario->setcorreoElectronico($registro['correoelectronico']);
            $usuario->setcontrasenaUsuario($registro['contrasenausuario']);
            $usuario->setestado($registro['estado']);
            $usuario->setidRol($registro['idrol']);
            $usuario->setdireccion($registro['direccion']);
            $usuario->settelefono($registro['telefono']);
            
        }
        catch(Exception $e)
        {
           echo $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $usuario;
    }

    public function actualizarUsuario($usuario)
    {
        $mensaje = "";
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->prepare('UPDATE usuarios
         SET nombreusuario=:nombreusuario, correoelectronico=:correoelectronico, contrasenausuario=:contrasenausuario,
         idrol=:idrol, direccion=:direccion, telefono=:telefono , estado =:estado
        WHERE idusuario=:idusuario'); 
         $sql->bindvalue('nombreusuario', $usuario->getnombreUsuario());
         $sql->bindvalue('correoelectronico', $usuario->getcorreoElectronico());
         $sql->bindvalue('contrasenausuario', $usuario->getcontrasenaUsuario());
         $sql->bindvalue('estado', $usuario->getestado());
         $sql->bindvalue('idrol', $usuario->getidRol());
         $sql->bindvalue('direccion', $usuario->getdireccion());
         $sql->bindvalue('telefono', $usuario->gettelefono());
         $sql->bindvalue('idusuario', $usuario->getidUsuario());

        try{
            $sql->execute();
            $mensaje = "Actualización Exitosa";
        }
        catch(Exception $e)
        {
            $mensaje = $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }

    public function eliminarUsuario($usuario)
    {
        $mensaje = "";
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->prepare('DELETE FROM usuarios
         WHERE idusuario=:idusuario'); 
         $sql->bindvalue('idusuario', $usuario->getidUsuario());

        try{
            $sql->execute();
            $mensaje = "Eliminación Exitosa";
        }
        catch(Exception $e)
        {
            $mensaje = $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }

    

}  
?>