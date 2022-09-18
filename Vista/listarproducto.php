<?php
require_once("../Controlador/controladorProducto.php");
$listaProducto = json_decode($controladorproducto->listarProducto());
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
            background-color:#0BDDD6;
            color: white;
        }
    </style>
<body>
    <div class="container mt-4">
    <div class="card border-white">
        <div class="card-header bg-light text-white">
        <a href="../Controlador/controladorProducto.php?registrarProducto" class="btn btn-dark">NUEVO</a>
        <!--<a href="../Vista/menu.php" class="btn btn-dark">VOLVER</a>-->
    </div>
    <div class="card-body" >
    <table border="1" class="table table-sriped table-bordered" id="listaproducto">
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
            <?php foreach($listaProducto as $producto)
            {
            ?>
            <tr>
                <td><?php echo $producto->id?></td>
                <td><?php echo $producto->nombre?></td>
                <td><?php echo $producto->precio?></td>
                <td><?php echo $producto->existencia?></td>
                <td>
                    <img src="<?php echo ('../Diseño/images').'/'.$producto->foto?>" width="100" >
                <td>
                <a href="../Controlador/controladorProducto.php?editarProducto&id=<?php echo $producto->id ?>" class="btn btn-info"><i class="fas fa-edit" aria-hidden="true"></i></a>
                <a href="#" class="btn btn-danger" onclick="eliminarProducto(<?php echo $producto->id?>)"><i class="fas fa-times-circle"></i></a>
                </td>
            </tr>
            <?php
               
            }
            ?>         
        </tbody>
    </table>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#listaproducto').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );


        function eliminarProducto(id)
        {
       var formData = new FormData();
       formData.append('id',id);
       formData.append('eliminarProducto','');
        
        Swal.fire({
        title: '¿Está seguro de eliminar el Producto?',
        text: "Usted no podrá revertir el cambio",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#AFA',
        confirmButtonText: 'Si, borrar éste!'
        }).then((result) => {
        if(result.isConfirmed){
            $.ajax({
                url:'../Controlador/controladorProducto.php',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    Swal.fire(
                    '',
                    response,
                    'success'
                    );
                }
            }); 
        }
        });
    }
    </script>
</body>
</html>
