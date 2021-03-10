<?php
class ReservaDAO{
	private $reservaId;
	private $usuarioId;
	private $alojamientoId;
	private $fechaInicio;
	private $fechaFin;
	private $noPersonas;
	private $noMascotas;
	private $pagoTotal;

	function ReservaDAO($preservaId = "", $pUsuarioId = "", $pAlojamientoId = "", $pFechaInicio = "", $pFechaFin = "", $pNoPersonas = "", $pNoMascotas = "", $pPagoTotal = ""){
		$this -> reservaId = $preservaId;
		$this -> usuarioId = $pUsuarioId;
		$this -> alojamientoId = $pAlojamientoId;
		$this -> fechaInicio = $pFechaInicio;
		$this -> fechaFin = $pFechaFin;
		$this -> noPersonas = $pNoPersonas;
		$this -> noMascotas = $pNoMascotas;
		$this -> pagoTotal = $pPagoTotal;
	}

	function insert(){
		return "insert into Reserva(usuarioId, alojamientoId, fechaInicio, fechaFin, noPersonas, noMascotas, pagoTotal)
				values('" . $this -> usuarioId . "', '" . $this -> alojamientoId . "', '" . $this -> fechaInicio . "', '" . $this -> fechaFin . "', '" . $this -> noPersonas . "', '" . $this -> noMascotas . "', '" . $this -> pagoTotal . "')";
	}

	function update(){
		return "update Reserva set 
				usuarioId = '" . $this -> usuarioId . "',
				alojamientoId = '" . $this -> alojamientoId . "',
				fechaInicio = '" . $this -> fechaInicio . "',
				fechaFin = '" . $this -> fechaFin . "',
				noPersonas = '" . $this -> noPersonas . "',
				noMascotas = '" . $this -> noMascotas . "',
				pagoTotal = '" . $this -> pagoTotal . "'	
				where reservaId = '" . $this -> reservaId . "'";
	}

	function select() {
		return "select reservaId, usuarioId, alojamientoId, fechaInicio, fechaFin, noPersonas, noMascotas, pagoTotal
				from Reserva
				where reservaId = '" . $this -> reservaId . "'";
	}

	function ultimoId(){
        return "SELECT MAX(reservaId) AS reservaId FROM Reserva";
    }

	function selectAll() {
		return "select reservaId, usuarioId, alojamientoId, fechaInicio, fechaFin, noPersonas, noMascotas, pagoTotal
				from Reserva";
	}

	function selectAllOrder($orden, $dir){
		return "select reservaId, usuarioId, alojamientoId, fechaInicio, fechaFin, noPersonas, noMascotas, pagoTotal
				from Reserva
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select reservaId, usuarioId, alojamientoId, fechaInicio, fechaFin, noPersonas, noMascotas, pagoTotal
				from Reserva
				where usuarioId = '" . $search . "'";
	}
}
?>
