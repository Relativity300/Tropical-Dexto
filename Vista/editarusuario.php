<?php
require_once("../Controlador/controladorUsuario.php");
$usuario = $controladorusuario->buscarUsuario($_GET['idUsuario']);
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
        <div class="card-header bg-light text-black">
            <h2>Editar Usuario  <i class="fas fa-user"></i></h2>
    </div>
    <div class="card-body" >
    <form name="frmUsuario" id="frmUsuario" method="POST" action="../Controlador/controladorUsuario.php">
    <table border="1" class="table table-sriped table-bordered" id="editusuario">
        <thead>
            <tr align="center">
                <th>
                    Id
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Correo
                </th>
                <th>
                    Contraseña
                </th>
                <th>
                    Estado
                </th>
                <th>
                    Rol
                </th>
                <th>
                    Dirección
                </th>
                <th>
                    Teléfono
                </th>
                <th>
                    Acción
                </th>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
            <td>
              <input type="text" name="idusuario" id="idusuario" class="form-control"   title="Digite el campo" readonly
              value="<?php echo $usuario->getidUsuario()?>">
            </td>
            <td>
              <input type="text" name="nombreusuario" id="nombreusuario" class="form-control"
              value="<?php echo $usuario->getnombreUsuario()?>">
            </td>
            <td>
              <input type="email" name="correoelectronico" id="correoelectronico" class="form-control"
              value="<?php echo $usuario->getcorreoElectronico()?>">
            </td>
            <td>
              <input type="password" name="contrasenausuario" id="contrasenausuario" class="form-control"
              value="<?php echo $usuario->getcontrasenaUsuario()?>">
            </td>
            <td>
            <select class="custom-select mr-sm-2" id="estado" name="estado" class="form-control">
            <option selected>Estado</option>
            <option value="1">Habilitado</option>
            <option value="2">Inhabilitado</option>
            </select>
              
              <?php echo $usuario->getestado()?>
            </td>
            <td>
              <input type="text" name="idrol" id="idrol" class="form-control"
              value="<?php echo $usuario->getidRol()?>">
            </td>
            <td>
              <input type="text" name="direccion" id="direccion" class="form-control"
              value="<?php echo $usuario->getdireccion()?>">
            </td>
            <td>
              <input type="number" name="telefono" id="telefono" class="form-control"
              value="<?php echo $usuario->gettelefono()?>">
            </td>
            <td>
            <button type="submit" name="editarUsuario" class="btn btn-success"><i class="fas fa-save"></i></a></button >
            </td>
            </tr>       
        </tbody>
    </table>
      </form>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#editusuario').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );

        function eliminarUsuario(idusuario)
        {
       var formData = new FormData();
       formData.append('idusuario',idusuario);
       formData.append('eliminarUsuario','');
        
        Swal.fire({
        title: '¿Está seguro de eliminar el Usuario?',
        text: "Usted no podrá revertir el cambio",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#AFA',
        confirmButtonText: 'Si, borrar éste!'
        }).then((result) => {
        if(result.isConfirmed){
            $.ajax({
                url:'../Controlador/controladorUsuario.php',
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