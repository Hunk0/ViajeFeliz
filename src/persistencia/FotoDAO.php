<?php
class FotoDAO{
	private $fotoId;
	private $alojamientoId;
	private $ubicacion;

	function FotoDAO($pfotoId = "", $pAlojamientoId = "", $pUbicacion = ""){
		$this -> fotoId = $pfotoId;
		$this -> alojamientoId = $pAlojamientoId;
		$this -> ubicacion = $pUbicacion;
	}

	function insert(){
		return "insert into Foto(alojamientoId, ubicacion)
				values('" . $this -> alojamientoId . "', '" . $this -> ubicacion . "')";
	}

	function update(){
		return "update Foto set 
				alojamientoId = '" . $this -> alojamientoId . "',
				ubicacion = '" . $this -> ubicacion . "'	
				where fotoId = '" . $this -> fotoId . "'";
	}

	function select() {
		return "select fotoId, alojamientoId, ubicacion
				from Foto
				where fotoId = '" . $this -> fotoId . "'";
	}

	function selectAll() {
		return "select fotoId, alojamientoId, ubicacion
				from Foto";
	}

	function selectAllOrder($orden, $dir){
		return "select fotoId, alojamientoId, ubicacion
				from Foto
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select fotoId, alojamientoId, ubicacion
				from Foto
				where alojamientoId = '" . $search . "'";
	}
}
?>
