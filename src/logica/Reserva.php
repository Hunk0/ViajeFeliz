<?php
require_once ("persistencia/ReservaDAO.php");
require_once ("persistencia/Connection.php");

class Reserva {
	private $idReserva;
	private $usuarioId;
	private $alojamientoId;
	private $fechaInicio;
	private $fechaFin;
	private $noPersonas;
	private $noMascotas;
	private $pagoTotal;
	private $reservaDAO;
	private $connection;

	function getIdReserva() {
		return $this -> idReserva;
	}

	function setIdReserva($pIdReserva) {
		$this -> idReserva = $pIdReserva;
	}

	function getUsuarioId() {
		return $this -> usuarioId;
	}

	function setUsuarioId($pUsuarioId) {
		$this -> usuarioId = $pUsuarioId;
	}

	function getAlojamientoId() {
		return $this -> alojamientoId;
	}

	function setAlojamientoId($pAlojamientoId) {
		$this -> alojamientoId = $pAlojamientoId;
	}

	function getFechaInicio() {
		return $this -> fechaInicio;
	}

	function setFechaInicio($pFechaInicio) {
		$this -> fechaInicio = $pFechaInicio;
	}

	function getFechaFin() {
		return $this -> fechaFin;
	}

	function setFechaFin($pFechaFin) {
		$this -> fechaFin = $pFechaFin;
	}

	function getNoPersonas() {
		return $this -> noPersonas;
	}

	function setNoPersonas($pNoPersonas) {
		$this -> noPersonas = $pNoPersonas;
	}

	function getNoMascotas() {
		return $this -> noMascotas;
	}

	function setNoMascotas($pNoMascotas) {
		$this -> noMascotas = $pNoMascotas;
	}

	function getPagoTotal() {
		return $this -> pagoTotal;
	}

	function setPagoTotal($pPagoTotal) {
		$this -> pagoTotal = $pPagoTotal;
	}

	function Reserva($pIdReserva = "", $pUsuarioId = "", $pAlojamientoId = "", $pFechaInicio = "", $pFechaFin = "", $pNoPersonas = "", $pNoMascotas = "", $pPagoTotal = ""){
		$this -> idReserva = $pIdReserva;
		$this -> usuarioId = $pUsuarioId;
		$this -> alojamientoId = $pAlojamientoId;
		$this -> fechaInicio = $pFechaInicio;
		$this -> fechaFin = $pFechaFin;
		$this -> noPersonas = $pNoPersonas;
		$this -> noMascotas = $pNoMascotas;
		$this -> pagoTotal = $pPagoTotal;
		$this -> reservaDAO = new ReservaDAO($this -> idReserva, $this -> usuarioId, $this -> alojamientoId, $this -> fechaInicio, $this -> fechaFin, $this -> noPersonas, $this -> noMascotas, $this -> pagoTotal);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> reservaDAO -> insert());
		$this -> connection -> close();
	}

	function ultimoId(){
        $this -> connection -> open();
        $this -> connection -> run($this -> reservaDAO -> ultimoId());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
        return $result[0];
    }

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> reservaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> reservaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idReserva = $result[0];
		$this -> usuarioId = $result[1];
		$this -> alojamientoId = $result[2];
		$this -> fechaInicio = $result[3];
		$this -> fechaFin = $result[4];
		$this -> noPersonas = $result[5];
		$this -> noMascotas = $result[6];
		$this -> pagoTotal = $result[7];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> reservaDAO -> selectAll());
		$reservas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($reservas, new Reserva($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7]));
		}
		$this -> connection -> close();
		return $reservas;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> reservaDAO -> selectAllOrder($order, $dir));
		$reservas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($reservas, new Reserva($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7]));
		}
		$this -> connection -> close();
		return $reservas;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> reservaDAO -> search($search));
		$reservas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($reservas, new Reserva($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7]));
		}
		$this -> connection -> close();
		return $reservas;
	}
}
?>
