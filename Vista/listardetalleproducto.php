<?php
require_once("../Controlador/controladorProducto.php");
$producto = $controladorproducto->buscarProducto($_GET['id']);
require_once("../Controlador/controladorUsuario.php");



include("../Vista/menu.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <link rel="stylesheet" href="../Diseño//css//estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
</head>

<style>
    .card{
        display: flex;
        justify-content: center;
        left: 47%;
    }
</style>
<body>
<div class="card" style="width: 18rem;">
<form name="frmDetalle" id="frmDetalle" method="POST" action="../Controlador/controladorProducto.php"  class="form-inline">
    <img class="card-img-top" src="<?php echo ('../Diseño/images').'/'.$producto->getfoto()?>" alt="Card image cap" >
    <ul class="list-group list-group-flush">
    <input type="number" class="list-group-item" value="<?php echo $producto->getid()?>" name="idproducto" id="idproducto" readonly>
	
    <li class="list-group-item">Diseño: <?php echo $producto->getnombre()?></li>

    <input type="text" class="list-group-item" value="<?php echo $producto->getprecio()?>" name="precio" id="precio" readonly>

    <input type="number" class="list-group-item" placeholder="Cantidad" name="cantidad" id="cantidad" onkeypress="probando()" required>

    <input type="number" class="list-group-item" placeholder="Total" name="total" id="total" onkeypress="probando()" required readonly>

    
    <input type="hidden" class="list-group-item" value="<?php echo $_SESSION['idusuario']?>"  name="idusuarios" id="idusuarios" readonly>
    
    <button class="btn btn-danger" type="submit" name="registrarDetalle" onclick="alerta()"><i class="fas fa-shopping-cart nav-icon"></i></button>
    
	</ul>
    
</form>
				
			
		
</div>
</body>
<script>
        
    function probando()
    {
        $("#cantidad").keyup(function(){
        $('#total').val($('#cantidad').val() * $('#precio').val());
        document.getElementById('total').value = document.getElementById('cantidad').value * document.getElementById('precio').value;
    });          
    }

    function alerta()
    {
        alert('Compra exitosa');
    }

</script>
</html>