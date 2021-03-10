<?php
class TipoDAO{
	private $tipoId;
	private $nombre;

	function TipoDAO($ptipoId = "", $pNombre = ""){
		$this -> tipoId = $ptipoId;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into Tipo(nombre)
				values('" . $this -> nombre . "')";
	}

	function update(){
		return "update Tipo set 
				nombre = '" . $this -> nombre . "'	
				where tipoId = '" . $this -> tipoId . "'";
	}

	function select() {
		return "select tipoId, nombre
				from Tipo
				where tipoId = '" . $this -> tipoId . "'";
	}

	function selectAll() {
		return "select tipoId, nombre
				from Tipo";
	}

	function selectAllOrder($orden, $dir){
		return "select tipoId, nombre
				from Tipo
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select tipoId, nombre
				from Tipo
				where nombre like '%" . $search . "%'";
	}
}
?>
