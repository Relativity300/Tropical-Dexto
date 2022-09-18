<?php
class CrudProducto
{
    public function __construct()
    {}

    public function listarProducto()
    {
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->query('SELECT * FROM productos');//Definir la sentencia sql
        $sql->execute();//ejecutar la consulta
        Db::CerrarConexion($Db);
        return $sql->fetchAll(); //retorna todos los registros obtenindos en la consulta
       
    }

    public function buscarProducto($id)
    {
        $producto = new Producto();
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->prepare('SELECT * FROM productos
        WHERE id=:id');
        $sql->bindvalue('id', $id);

        try{
            $sql->execute();
            $registro = $sql->fetch(); //cuando se requiere solo un registro
            $producto->setid($registro['id']);
            $producto->setnombre($registro['nombre']);
            $producto->setprecio($registro['precio']);
            $producto->setexistencia($registro['existencia']);
            //$usuario->setestado($registro['estado']);
            $producto->setfoto($registro['foto']);
            
        }
        catch(Exception $e)
        {
           echo $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $producto;
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
            
        }
        catch(Exception $e)
        {
           echo $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $usuario;
    }

    public function registrarProducto($producto)
    {
        $mensaje = "";
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->prepare('INSERT INTO
         productos(nombre, precio, existencia, foto) VALUES
         (:nombre, :precio, :existencia, :foto)'); //acá se pueden definir diferentes
         $sql->bindvalue('nombre', $producto->getnombre());
         $sql->bindvalue('precio', $producto->getprecio());
         $sql->bindvalue('existencia', $producto->getexistencia());
         //$sql->bindvalue('estado', $usuario->getestado());
         $sql->bindvalue('foto', $producto->getfoto());

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
    
    public function actualizarProducto($producto)
    {
        $mensaje = "";
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->prepare('UPDATE productos
         SET nombre=:nombre, precio=:precio, existencia=:existencia,
         foto=:foto
        WHERE id=:id'); 
         $sql->bindvalue('nombre', $producto->getnombre());
         $sql->bindvalue('precio', $producto->getprecio());
         $sql->bindvalue('existencia', $producto->getexistencia());
         //$sql->bindvalue('estado', $usuario->getestado());
         $sql->bindvalue('foto', $producto->getfoto());
         $sql->bindvalue('id', $producto->getid());

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

    public function eliminarProducto($producto)
    {
        $mensaje = "";
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->prepare('DELETE FROM productos
         WHERE id=:id'); 
         $sql->bindvalue('id', $producto->getid());

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

    public function consultarPrecio($id)
    {
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->query("SELECT * FROM productos
        WHERE id= $id
        ORDER BY nombre");//Definir la sentencia sql
        $sql->execute();//ejecutar la consulta
        Db::CerrarConexion($Db);
        return $sql->fetch(); //retorna todos los registros obtenindos en la consulta
       
    }

    
}
?>