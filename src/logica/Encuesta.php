<?php
require_once ("persistencia/EncuestaDAO.php");
require_once ("persistencia/Connection.php");

class Encuesta {
	private $idEncuesta;
	private $usuarioId;
	private $alojamientoId;
	private $calificacion;
	private $detalles;
	private $encuestaDAO;
	private $connection;

	function getIdEncuesta() {
		return $this -> idEncuesta;
	}

	function setIdEncuesta($pIdEncuesta) {
		$this -> idEncuesta = $pIdEncuesta;
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

	function getCalificacion() {
		return $this -> calificacion;
	}

	function setCalificacion($pCalificacion) {
		$this -> calificacion = $pCalificacion;
	}

	function getDetalles() {
		return $this -> detalles;
	}

	function setDetalles($pDetalles) {
		$this -> detalles = $pDetalles;
	}

	function Encuesta($pIdEncuesta = "", $pUsuarioId = "", $pAlojamientoId = "", $pCalificacion = "", $pDetalles = ""){
		$this -> idEncuesta = $pIdEncuesta;
		$this -> usuarioId = $pUsuarioId;
		$this -> alojamientoId = $pAlojamientoId;
		$this -> calificacion = $pCalificacion;
		$this -> detalles = $pDetalles;
		$this -> encuestaDAO = new EncuestaDAO($this -> idEncuesta, $this -> usuarioId, $this -> alojamientoId, $this -> calificacion, $this -> detalles);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> encuestaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> encuestaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> encuestaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idEncuesta = $result[0];
		$this -> usuarioId = $result[1];
		$this -> alojamientoId = $result[2];
		$this -> calificacion = $result[3];
		$this -> detalles = $result[4];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> encuestaDAO -> selectAll());
		$encuestas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($encuestas, new Encuesta($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $encuestas;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> encuestaDAO -> selectAllOrder($order, $dir));
		$encuestas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($encuestas, new Encuesta($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $encuestas;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> encuestaDAO -> search($search));
		$encuestas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($encuestas, new Encuesta($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $encuestas;
	}
}
?>
