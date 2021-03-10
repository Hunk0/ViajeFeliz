<?php
	$barrio = new Barrio();
    $barrios = $barrio -> search($_GET['search']);
    echo '<option selected disabled value="">Seleccionar...</option>';
	foreach($barrios as $b){
		echo '<option value="'.$b->getIdBarrio().'">'.$b->getNombre().'</option>';
	}
?>