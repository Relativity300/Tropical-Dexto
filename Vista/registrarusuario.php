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
    <form name="frmProducto" id="frmProducto" method="POST" action="../Controlador/controladorUsuario.php"  class="form-inline">

<div class="input-group">
  <span class="input-group-addon">nombre</span>
  <input type="number" name="nombreusuario" id="nombreusuario" class="form-control" placeholder="ingrese el nombre" required>
</div>

<div class="input-group">
  <span class="input-group-addon">Correo</span>
  <input type="number" name="correoelectronico" id="correoelectronico" class="form-control" placeholder="ingrese el nombre" required>
</div>

<div class="input-group">
  <span class="input-group-addon">contraseña</span>
  <input type="number" name="contrasenausuario" id="contrasenausuario" class="form-control" placeholder="ingrese el nombre" required>
</div>

<div class="input-group">
  <span class="input-group-addon">estado</span>
  <input type="number" name="estado" id="estado" class="form-control" placeholder="ingrese el nombre" required>
</div>

<div class="input-group">
  <span class="input-group-addon">id rol</span>
  <input type="number" name="idrol" id="idrol" class="form-control" placeholder="ingrese el nombre" required>
</div>

<div class="input-group">
  <span class="input-group-addon">direccion</span>
  <input type="number" name="direccion" id="direccion" class="form-control" placeholder="ingrese el nombre" required>
</div>

<div class="input-group">
  <span class="input-group-addon">telefono</span>
  <input type="number" name="telefono" id="telefono" class="form-control" placeholder="ingrese el nombre" required>
</div>


    
    <button class="btn btn-success" type="submit" name="registrarUsuario2">Registrar</button>
    </form>
    </div>
  </section>

</body>
</html>