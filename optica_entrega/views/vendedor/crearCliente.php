<?php

session_start();




?>




<!DOCTYPE html>
<html>

<head>
	<title>GestionClientes</title>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript">
		$(document).ready(function() {
			// $('select').formSelect();
			$('.datepicker').datepicker({
				format: 'dd/mm/yyyy',
				autoClose: 'true',
				i18n: {
					months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Agos", "Sept", "Oct", "Nov", "Dic"]


				},
				showDaysInNextAndPreviousMonths: 'true'
			});
		});

		// $(document).on('submit', '#registro', function(e){
		// 	e.preventDefault();
		// 	console.log($(this).serialize());
		// });
	</script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class=" lighten-5">

<?php
	if(isset($_SESSION['vendedor'])){?>


	


	<nav class="indigo lighten-1">
		<div class="nav-wrapper">
			<a href="#" class="brand-logo right"><img src="../../img/optica_img.png" alt="img not found" style="height: 60px;"></a>
			<ul id="nav-mobile" class="left hide-on-med-and-down">
				<li><a href="../../recetaConsulta.php">Buscar Rut</a></li>
				<li><a href="../../">Buscar nombre</a></li>
				<li><a href="../../index.php">Home</a></li>
				<li class="green-text">
				
				</li>
			</ul>
		</div>
	</nav>
	<br>
	<div class="container white" style="min-height:100vh; padding: 20px">
		<!-- CONTAINER -->
		<div class="row">
		<div class="col12">
		<h5>Bienvenido <?=$_SESSION['vendedor']['nombre']?></h5>
		</div>
		</div>
		<div class="row indigo lighten-5">
			<!-- ROW -->
		
			<form action="../../controllers/RegistroCliente.php" method="post" id="registro">
				<div class="input-field col l6 col-m6">
					<i class="material-icons prefix">account_circle</i>
					<input type="text" name="rut_cliente" id="rut">
					<label for="rut">Rut</label>
				</div>
				<div class="input-field col l6 col-m6">
					<i class="material-icons prefix">account_circle</i>
					<input type="text" name="nombre_cliente" id="nombre">
					<label for="nombre">Nombre</label>
				</div>
				<div class="clearfix"></div>
				<div class="input-field col l4 col-m4">
					<i class="material-icons prefix">swap_horiz</i>
					<input class="" type="text" name="direccion_cliente" id="direccion">
					<label for="direccion">Direccion</label>
				</div>

				<div class="input-field col l5 m5">
					<i class="material-icons prefix">settings_cell</i>
					<input type="text" name="telefono_cliente" id="telefono">
					<label for="telefono">telefono</label>
				</div>

				<div class="input-field col l4 col-m5">
					<i class="material-icons prefix">date_range</i>
					<input class="datepicker" type="text" name="fecha_creacion" id="creacion">
					<label for="creacion">Fecha Creacion</label>
				</div>
				
				<div class="input-field col l5 m5">
					<i class="material-icons prefix">directions</i>
					<input type="text" name="email_cliente" id="email">
					<label for="email">Email Cliente</label>
				</div>
			
				<button type="submit" class="btn waves-effect">
					<i class="material-icons right">check</i>
					Crear cliente
				</button>
			</form>
		</div> <!-- ROW -->
	</div> <!-- CONTAINER -->
	<br>

	<?php } else {?>
		<h2>No tienes permisos para esta aqui</h2>
	<a href="../../index.php">Home</a>
	<?php }?>
</body>


</html>