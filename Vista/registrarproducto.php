<?php
require_once("../Controlador/controladorProducto.php");
include("../Vista/menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Formulario Registro</title>
</head>
<body>
  <section class="form-register">
    <h4>Formulario Registro</h4>
    <div class="container" >
    <form name="frmProducto" id="frmProducto" method="POST" action="../Controlador/controladorProducto.php"  class="form-inline">
    <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-edit" aria-hidden="true"></i></span>
  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Producto" required>
</div>

<div class="input-group">
  <span class="input-group-addon">$</span>
  <input type="number" name="precio" id="precio" class="form-control" placeholder="Ingrese el precio" required>
</div>

<div class="input-group">
  <span class="input-group-addon"><i class="fa fa-cubes" aria-hidden="true"></i></span>
  <input type="number" name="existencia" id="existencia" class="form-control" placeholder="Ingrese existencias" required>
  
</div>

<div class="input-group">
  <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
  <input type="file" name="foto" id="foto" class="form-control" placeholder="Ingrese la Foto" required>
  
</div>
    
    <button class="btn btn-success" type="submit" name="registrarProducto">Registrar</button>
    </form>
    </div>
  </section>

</body>
</html>