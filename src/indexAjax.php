<?php 
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
$pid=base64_decode($_GET['pid']);
include($pid);
?>
