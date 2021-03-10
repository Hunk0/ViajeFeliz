<?php
class ClimatizacionDAO{
	private $climatizacionId;
	private $nombre;

	function ClimatizacionDAO($pClimatizacionId = "", $pNombre = ""){
		$this -> climatizacionId = $pClimatizacionId;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into Climatizacion(climatizacionId, nombre)
				values('" . $this -> climatizacionId . "', '" . $this -> nombre . "')";
	}

	function update(){
		return "update Climatizacion set 
				nombre = '" . $this -> nombre . "'	
				where climatizacionId = '" . $this -> climatizacionId . "'";
	}

	function select() {
		return "select  climatizacionId, nombre
				from Climatizacion
				where climatizacionId= '" . $this -> climatizacionId . "'";
	}

	function selectAll() {
		return "select  climatizacionId, nombre
				from Climatizacion";
	}

	function selectAllOrder($orden, $dir){
		return "select  climatizacionId, nombre
				from Climatizacion
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select  climatizacionId, nombre
				from Climatizacion
				where nombre like '%" . $search . "%'";
	}
}
?>
