<?php
class CiudadDAO{
	private $ciudadId;
	private $regionId;
	private $nombre;

	function CiudadDAO($pCiudadId = "", $pRegionId = "", $pNombre = ""){
		$this -> ciudadId = $pCiudadId;
		$this -> regionId = $pRegionId;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into Ciudad(ciudadId, regionId, nombre)
				values('" . $this -> ciudadId . "', '" . $this -> regionId . "', '" . $this -> nombre . "')";
	}

	function update(){
		return "update Ciudad set 
				regionId = '" . $this -> regionId . "',
				nombre = '" . $this -> nombre . "'	
				where ciudadId = '" . $this -> ciudadId. "'";
	}

	function select() {
		return "select  ciudadId, regionId, nombre
				from Ciudad
				where ciudadId= '" . $this -> ciudadId. "'";
	}

	function selectAll() {
		return "select  ciudadId, regionId, nombre
				from Ciudad";
	}

	function selectAllOrder($orden, $dir){
		return "select  ciudadId, regionId, nombre
				from Ciudad
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select  ciudadId, regionId, nombre
				from Ciudad
				where regionId = '" . $search . "'";
	}
}
?>
