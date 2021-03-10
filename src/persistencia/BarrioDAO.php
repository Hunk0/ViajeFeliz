<?php
class BarrioDAO{
	private $barrioId;
	private $ciudadId;
	private $zonaId;
	private $nombre;

	function BarrioDAO($pBarrioId = "", $pCiudadId = "", $pZonaId = "", $pNombre = ""){
		$this -> barrioId = $pBarrioId;
		$this -> ciudadId = $pCiudadId;
		$this -> zonaId = $pZonaId;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into Barrio(barrioId, ciudadId, zonaId, nombre)
				values('" . $this -> barrioId . "', '" . $this -> ciudadId . "', '" . $this -> zonaId . "', '" . $this -> nombre . "')";
	}

	function update(){
		return "update Barrio set 
				zonaId = '" . $this -> zonaId . "',
				nombre = '" . $this -> nombre . "'	
				where barrioId = '" . $this -> barrioId . "'";
	}

	function select() {
		return "select *
				from Barrio
				where barrioId = '" . $this -> barrioId . "'";
	}

	function selectAll() {
		return "select *
				from Barrio";
	}

	function selectAllOrder($orden, $dir){
		return "select *
				from Barrio
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select *
				from Barrio
				where ciudadId = '.$search.'";
	}
}
?>
