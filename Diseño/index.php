<?php
require_once("../Controlador/controladorProducto.php");
$listaProducto = json_decode($controladorproducto->listarProducto());
include("../Vista/menu.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Filtrando elementos por categorias</title>

	<link rel="stylesheet" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/script.js"></script>
	
</head>

<body>
	
	<div class="wrap">
		<!--<h1>Mira nuestro catalogo de diseños</h1>-->
		<div class="store-wrapper">
			<div class="category_list">
				<a href="#" class="category_item ct_item-active" category="all">Todos</a>
			</div>
			
			<section class="products-list">
				<?php foreach($listaProducto as $producto)
            	{
				?>
				<div class="product-item" category="all">
					<img src="<?php echo ('../Diseño/images').'/'.$producto->foto?>" alt="" height="130" width="100">
					<?php echo $producto->id?>
					<?php echo $producto->nombre?>
					<a href="../Controlador/controladorProducto.php?buscarProducto&id=<?php echo $producto->id?>">Ver</a>
					
					
				</div>
				<?php
				}
				?>
				
			</section>
		</div>
	</div>

</body>
</html>