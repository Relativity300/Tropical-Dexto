<?php
class CrudDetalle
{
    public function __construct()
    {}

    public function listarDetalle()
    {
        
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->query("SELECT detalleventas.*,productos.nombre AS nombreproducto,productos.precio AS preciop,productos.foto AS fotop
        FROM detalleventas
        
        INNER JOIN productos ON detalleventas.idproducto = productos.id
        INNER JOIN usuarios ON detalleventas.idusuarios = usuarios.idusuario
         
        ORDER BY id ASC");//Definir la sentencia sql
        $sql->execute();//ejecutar la consulta
        Db::CerrarConexion($Db);
        return $sql->fetchAll(); //retorna todos los registros obtenindos en la consulta
       
    }

    

    public function registrarDetalle($detalle)
    {
        $mensaje = "";
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->prepare('INSERT INTO
         detalleventas(idproducto, cantidad, precio, total, idusuarios) VALUES
         (:idproducto, :cantidad, :precio, :total, :idusuarios)'); //acá se pueden definir diferentes
         $sql->bindvalue('idproducto', $detalle->getidproducto());
         $sql->bindvalue('cantidad', $detalle->getcantidad());
         $sql->bindvalue('precio', $detalle->getprecio());
         $sql->bindvalue('total', $detalle->gettotal());
         $sql->bindvalue('idusuarios', $detalle->getidusuarios());

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

    public function buscarDetalle($id)
    {
        $detalleventa = new detalleVenta();
        $Db = Db::Conectar(); //Conexion a Bd
        $sql = $Db->prepare('SELECT * FROM detalleventas
        WHERE id=:id');
        $sql->bindvalue('id', $id);

        try{
            $sql->execute();
            $registro = $sql->fetch(); //cuando se requiere solo un registro
            $detalleventa->setid($registro['id']);
            $detalleventa->setidproducto($registro['idproducto']);
            $detalleventa->setcantidad($registro['cantidad']);
            $detalleventa->setprecio($registro['precio']);
            $detalleventa->settotal($registro['total']);
            
        }
        catch(Exception $e)
        {
           echo $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $detalleventa;
    }

    

}  
?>