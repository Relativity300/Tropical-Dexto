<?php
session_start();
if(!($_SESSION['idusuario']))
{
    header("Location:../Iniciar sesion/index.php");
}
?>    


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Menú</title>
	<link rel="stylesheet" href="../css/styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        
        <ul>
            
            <li><a href="../Vista/menu.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-user"></i>Perfil</a></li>
            <?php if($_SESSION['idrol']==1)
            {
            ?>
            <li><a href="../Controlador/controladorUsuario.php?listarUsuario"><i class="fas fa-address-card"></i>Usuarios</a></li>
            <li><a href="Cliente.php?listarUsuario"><i class="fas fa-address-card"></i>Cliente</a></li>
            <li><a href="../Vista/listarproducto.php"><i class="fas fa-project-diagram"></i>Productos</a></li>
            <li><a href="#"><i class="fas fa-shopping-cart nav-icon"></i>Carrito</a></li>
            <li><a href="../Controlador/destruirsesion.php"><i class="fas fa-times-circle"></i>Cerrar Sesión</a></li>
            <?php
            }
            ?>
            
        
            <!--Opciones menu usuarios-->
            <?php if($_SESSION['idrol']==2)
            {
            ?>
            <li><a href="../Diseño/index.php"><i class="fas fa-project-diagram"></i>Productos</a></li>
            <li><a href="../Vista/carrito.php"><i class="fas fa-shopping-cart nav-icon"></i>Carrito</a></li>
            <li><a href="../Controlador/destruirsesion.php"><i class="fas fa-times-circle"></i>Cerrar Sesión</a></li>
            <?php
            }
            ?>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">Bienvenido!! Tenga un buen día.</div>  
        <div>
          <br>
          <h1 align="center">Tropical Detox </h1>
            
            
      </div>
    </div>
</div>

</body>
</html>
