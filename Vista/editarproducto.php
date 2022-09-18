<?php
require_once("../Controlador/controladorProducto.php");
$producto = $controladorproducto->buscarProducto($_GET['id']);
include("../Vista/menu.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    
</head>
<style>
        table thead {
            background-color:#16E694 ;
            color: white;
        }
    </style>
<body>
    <div class="container mt-4">
    <div class="card border-white">
        <div class="card-header bg-light text-black">
            <h2>Editar Producto  <i class="fas fa-box"></i></h2>
    </div>
    <div class="card-body" >
    <form name="frmProducto" id="frmProducto" method="POST" action="../Controlador/controladorProducto.php">
    <table border="1" class="table table-sriped table-bordered" id="editproducto">
        <thead>
            <tr align="center">
                <th>
                    Id
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Precio
                </th>
                <th>
                    Existencia
                </th>
                <th>
                    Foto
                </th>
                <th>
                    Acción
                </th>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
            <td>
              <input type="text" name="id" id="id" class="form-control"   title="Digite el campo" readonly
              value="<?php echo $producto->getid()?>">
            </td>
            <td>
              <input type="text" name="nombre" id="nombre" class="form-control"
              value="<?php echo $producto->getnombre()?>">
            </td>
            <td>
              <input type="number" name="precio" id="precio" class="form-control"
              value="<?php echo $producto->getprecio()?>">
            </td>
            <td>
              <input type="number" name="existencia" id="existencia" class="form-control"
              value="<?php echo $producto->getexistencia()?>">
            </td>
            <td>
            <input type="file" name="foto" id="foto" class="form-control">
            
            </td>
            <td>
            <button type="submit" name="editarProducto" class="btn btn-success"><i class="fas fa-save"></i></a></button >
            </td>
            </tr>       
        </tbody>
    </table>
      </form>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#editproducto').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );
    </script>
</body>
</html>