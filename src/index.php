<?php 
session_start();
require("logica/Encuesta.php");
require("logica/Nacionalidad.php");
require("logica/Foto.php");
require("logica/Reserva.php");
require("logica/Usuario.php");
require("logica/Usu_telefono.php");
require("logica/Pago.php");
require("logica/Estado.php");
require("logica/Climatizacion.php");
require("logica/Tipo.php");
require("logica/Alojamiento.php");
require("logica/Barrio.php");
require("logica/Ciudad.php");
require("logica/Zona.php");
require("logica/Region.php");
require("logica/Arr_telefono.php");
require("logica/Arrendador.php");
date_default_timezone_set("America/Bogota");
if(isset($_GET['logOut'])){
	$_SESSION['id']="";
	$_SESSION['rol']="";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Viaje Feliz</title>
		<meta http-eqpresentacionv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://bootswatch.com/4/litera/bootstrap.css" rel="stylesheet" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
		<script charset="utf-8">
			$(function () { 
				$("[data-toggle='tooltip']").tooltip(); 
			});
		</script>
	</head>
	<body>
		<?php
		if(isset($_SESSION['rol'])){
			if($_SESSION['rol']=="arr"){
				include 'presentacion/Menus/Arrendador.php';
			}else if($_SESSION['rol']=="user"){
				include 'presentacion/Menus/Usuario.php';
			}else{
				include 'presentacion/Menus/Default.php';
			}
		}else{
			include 'presentacion/Menus/Default.php';
		}

		if(isset($_GET["pid"])){
			$pid = base64_decode($_GET["pid"]);				
			echo '<div class="container p-4">';			
				include($pid);
			echo '</div>';
        }else{
			include('presentacion/inicio.php');			
		}
		
		?>
	</body>
</html>
