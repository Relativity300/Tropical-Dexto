<?php
require_once("../Controlador/controladorUsuario.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <title>Formulario Registro</title>
</head>
<body>
  <section class="form-register">
    <h4>Formulario Registro</h4>
    <form name="frmUsuario" id="frmUsuario" method="POST" action="../Controlador/controladorUsuario.php">
    <input class="controls" type="text" name="nombreusuario" id="nombreusuario" placeholder="Ingrese su Nombre" minlength="6" maxlength="20" required>
    <input class="controls" type="email" name="correoelectronico" id="correoelectronico" placeholder="Ingrese su Correo" required>
    <input class="controls" type="password" name="contrasenausuario" id="contrasenausuario" placeholder="Ingrese su Contraseña" minlength="2" maxlength="10" required>
    <input type="hidden" name="estado" value=1 />
    <input type="hidden" name="idrol" value=2 />
    <input class="controls" type="text" name="direccion" id="direccion" placeholder="Ingrese su Dirección" required>
    <input class="controls" type="number" name="telefono" id="telefono" placeholder="Ingrese su Teléfono" required >
    
    
    </select>
    <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
    <button class="botons" type="submit" name="registrarUsuario" onclick="alerta()">Registrar</button>
    <p><a href="../Iniciar sesion/index.php">¿Ya tengo Cuenta?</a></p>
    
    
    </form>
  </section>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>

function alerta()
    {
      alert('Usuario registrado exitosamente');
    }
    
</script>

</body>
</html>