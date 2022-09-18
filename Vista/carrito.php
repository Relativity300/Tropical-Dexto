<?php
require_once("../Controlador/controladorProducto.php");
$listaDetalle = json_decode($controladorproducto->listarDetalle());


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
        <div class="card-header bg-light text-white">
        <a href="../Diseño/index.php" class="btn btn-dark"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
        <!--<a href="../Vista/menu.php" class="btn btn-dark">VOLVER</a>-->
    </div>
    <div class="card-body" >
    <table border="1" class="table table-sriped table-bordered" id="listadetalle">
        <thead>
            <tr align="center">
                <th>
                    Id
                </th>
                <th>
                    Producto
                </th>
                <th>
                    Cantidad
                </th>
                <th>
                    Precio
                </th>
                <th>
                    Total
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
        <?php foreach($listaDetalle as $detalle)
            {
            ?>
            <tr>
                <td><?php echo $detalle->id?></td>
                <td><?php echo $detalle->nombreproducto?></td>
                <td><?php echo $detalle->cantidad?></td>
                <td><?php echo $detalle->preciop?></td>
                <td><?php echo $detalle->total= $detalle->cantidad * $detalle->preciop?></td>
                <td>
                    <img src="<?php echo ('../Diseño/images').'/'.$detalle->fotop?>" width="100" >
                </td>
                <td>
                <a href="#" class="btn btn-danger eliminar"><i class="fas fa-times-circle" aria-hidden="true"></i></a>
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
            $('#listadetalle').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );


        
    </script>

<script>
    Command: toastr["success"]("¡Creado Exitosamente!", "Producto")

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
</body>
</html>