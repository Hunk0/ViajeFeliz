<?php
require_once ("persistencia/PagoDAO.php");
require_once ("persistencia/Connection.php");

class Pago {
	private $idPago;
	private $reservaId;
	private $estadoId;
	private $fecha;
	private $cantidad;
	private $pagoDAO;
	private $connection;

	function getIdPago() {
		return $this -> idPago;
	}

	function setIdPago($pIdPago) {
		$this -> idPago = $pIdPago;
	}

	function getReservaId() {
		return $this -> reservaId;
	}

	function setReservaId($pReservaId) {
		$this -> reservaId = $pReservaId;
	}

	function getEstadoId() {
		return $this -> estadoId;
	}

	function setEstadoId($pEstadoId) {
		$this -> estadoId = $pEstadoId;
	}

	function getFecha() {
		return $this -> fecha;
	}

	function setFecha($pFecha) {
		$this -> fecha = $pFecha;
	}

	function getCantidad() {
		return $this -> cantidad;
	}

	function setCantidad($pCantidad) {
		$this -> cantidad = $pCantidad;
	}

	function Pago($pIdPago = "", $pReservaId = "", $pEstadoId = "", $pFecha = "", $pCantidad = ""){
		$this -> idPago = $pIdPago;
		$this -> reservaId = $pReservaId;
		$this -> estadoId = $pEstadoId;
		$this -> fecha = $pFecha;
		$this -> cantidad = $pCantidad;
		$this -> pagoDAO = new PagoDAO($this -> idPago, $this -> reservaId, $this -> estadoId, $this -> fecha, $this -> cantidad);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> pagoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> pagoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> pagoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idPago = $result[0];
		$this -> reservaId = $result[1];
		$this -> estadoId = $result[2];
		$this -> fecha = $result[3];
		$this -> cantidad = $result[4];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> pagoDAO -> selectAll());
		$pagos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($pagos, new Pago($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $pagos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> pagoDAO -> selectAllOrder($order, $dir));
		$pagos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($pagos, new Pago($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $pagos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> pagoDAO -> search($search));
		$pagos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($pagos, new Pago($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $pagos;
	}
}
?>
