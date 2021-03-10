<?php
class NacionalidadDAO{
	private $nacionalidadId;
	private $nombre;

	function NacionalidadDAO( $pNacionalidadId = "", $pNombre = ""){
		$this -> nacionalidadId = $pNacionalidadId;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into Nacionalidad(nacionalidadId, nombre)
				values('" . $this -> nacionalidadId . "', '" . $this -> nombre . "')";
	}

	function update(){
		return "update Nacionalidad set 
				nombre = '" . $this -> nombre . "'	
				where nacionalidadId = '" . $this -> nacionalidadId . "'";
	}

	function select() {
		return "select *
				from Nacionalidad
				where nacionalidadId = '" . $this -> nacionalidadId . "'";
	}

	function selectAll() {
		return "select *
				from Nacionalidad";
	}

	function selectAllOrder($orden, $dir){
		return "select *
				from Nacionalidad
				order by " . $orden . " " . $dir;
	}
}
?>
