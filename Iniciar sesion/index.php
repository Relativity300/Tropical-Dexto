<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="fonts.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">
    
  </head>
  <body>
    <div class="contenedor">

      <header>
        <h1 class="title">Tropical Detox</h1>
        
        <!--Redireccion al registrar-->
          <ul class="horizontal">
          <li><a href="../Registro/registro.php">Registrate</a></li>
          </ul>
      </header>
      <div class="login">
        <article class="fondo">
          <img src="img/men.png" alt="User">
          <h3>Inicio de Sesión</h3>
          <form name="frmAcceso" action="../Controlador/controladoracceso.php" method="POST">
            <span class="icon-user"></span><input class="inp" type="text" name="usuario" id="usuario" placeholder="Digite su Correo" >
            <br>
            <span class="icon-key"></span><input class="inp" type="password" name="contrasena" id="contrasena" placeholder="Digite su contraseña" >
            <br>
            <a href="" class="he">He olvidado mi contraseña</a>
            <button type="submit" name="acceder"  class="boton">Iniciar Sesión</button>
          </form>
        </article>
      </div>

    </div>
  </body>
</html>
