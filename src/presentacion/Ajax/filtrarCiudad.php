<?php
	$ciudad = new Ciudad();
	$ciudades = $ciudad -> search($_GET['search']);
	echo '<option selected disabled value="">Seleccionar...</option>';
	foreach($ciudades as $c){
		echo '<option value="'.$c->getIdCiudad().'">'.$c->getNombre().'</option>';
	}
?>
