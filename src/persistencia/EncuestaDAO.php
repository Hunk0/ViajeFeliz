<?php
class EncuestaDAO{
	private $usuarioId;
	private $alojamientoId;
	private $calificacion;
	private $detalles;

	function EncuestaDAO( $pUsuarioId = "", $pAlojamientoId = "", $pCalificacion = "", $pDetalles = ""){
		$this -> usuarioId = $pUsuarioId;
		$this -> alojamientoId = $pAlojamientoId;
		$this -> calificacion = $pCalificacion;
		$this -> detalles = $pDetalles;
	}

	function insert(){
		return "insert into Encuesta(usuarioId, alojamientoId, calificacion, detalles)
				values('" . $this -> usuarioId . "', '" . $this -> alojamientoId . "', '" . $this -> calificacion . "', '" . $this -> detalles . "')";
	}

	function update(){
		return "update Encuesta set 
				calificacion = '" . $this -> calificacion . "',
				detalles = '" . $this -> detalles . "'	
				where usuarioId = '" . $this -> usuarioId . "' and alojamientoId = '" . $this -> alojamientoId . "'";
	}

	function select() {
		return "select , usuarioId, alojamientoId, calificacion, detalles
				from Encuesta
				where usuarioId = '" . $this -> usuarioId . "' and alojamientoId = '" . $this -> alojamientoId . "'";
	}

	function selectAll() {
		return "select *
				from Encuesta";
	}

	function selectAllOrder($orden, $dir){
		return "select *
				from Encuesta
				order by " . $orden . " " . $dir;
	}
}
?>
