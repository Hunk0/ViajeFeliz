<?php
class EstadoDAO{
	private $estadoId;
	private $nombre;
	private $detalles;

	function EstadoDAO($p= "", $pEstadoId = "", $pNombre = "", $pDetalles = ""){
		$this -> estadoId = $pEstadoId;
		$this -> nombre = $pNombre;
		$this -> detalles = $pDetalles;
	}

	function insert(){
		return "insert into Estado(estadoId, nombre, detalles)
				values('" . $this -> estadoId . "', '" . $this -> nombre . "', '" . $this -> detalles . "')";
	}

	function update(){
		return "update Estado set 
				nombre = '" . $this -> nombre . "',
				detalles = '" . $this -> detalles . "'	
				where = estadoId '" . $this -> estadoId. "'";
	}

	function select() {
		return "select  estadoId, nombre, detalles
				from Estado
				where = estadoId'" . $this -> estadoId. "'";
	}

	function selectAll() {
		return "select  estadoId, nombre, detalles
				from Estado";
	}

	function selectAllOrder($orden, $dir){
		return "select  estadoId, nombre, detalles
				from Estado
				order by " . $orden . " " . $dir;
	}
}
?>
