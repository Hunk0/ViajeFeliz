<?php
class Arr_telefonoDAO{
	private $arrendadorId;
	private $telefono;

	function Arr_telefonoDAO($pArrendadorId = "", $ptelefono = ""){
		$this -> arrendadorId = $pArrendadorId;
		$this -> telefono = $ptelefono;
	}

	function insert(){
		return "insert into Arr_telefono(arrendadorId, telefono)
				values('" . $this -> arrendadorId . "', '" . $this -> telefono . "')";
	}

	function selectAll() {
		return "select *
				from Arr_telefono
				where arrendadorId = '" . $this -> arrendadorId . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select *
				from Arr_telefono
				order by " . $orden . " " . $dir;
	}
}
?>
