<?php
class ZonaDAO{
	private $zonaId;
	private $nombre;

	function ZonaDAO( $pZonaId = "", $pNombre = ""){
		$this -> zonaId = $pZonaId;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into Zona(zonaId, nombre)
				values('" . $this -> zonaId . "', '" . $this -> nombre . "')";
	}

	function update(){
		return "update Zona set 
				zonaId = '" . $this -> zonaId . "',
				nombre = '" . $this -> nombre . "'	
				where zonaId = '" . $this -> zonaId . "'";
	}

	function select() {
		return "select zonaId, nombre
				from Zona
				where zonaId = '" . $this -> zonaId . "'";
	}

	function selectAll() {
		return "select zonaId, nombre
				from Zona";
	}

	function selectAllOrder($orden, $dir){
		return "select zonaId, nombre
				from Zona
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select zonaId, nombre
				from Zona
				where zonaId like '%" . $search . "%' or nombre like '%" . $search . "%'";
	}
}
?>
