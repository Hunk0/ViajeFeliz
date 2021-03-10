<?php
require_once ("persistencia/BarrioDAO.php");
require_once ("persistencia/Connection.php");

class Barrio {
	private $idBarrio;
	private $ciudadId;
	private $zonaId;
	private $nombre;
	private $barrioDAO;
	private $connection;

	function getIdBarrio() {
		return $this -> idBarrio;
	}

	function setIdBarrio($pIdBarrio) {
		$this -> idBarrio = $pIdBarrio;
	}

	function getCiudadId() {
		return $this -> ciudadId;
	}

	function setCiudadId($pCiudadId) {
		$this -> ciudadId = $pCiudadId;
	}

	function getZonaId() {
		return $this -> zonaId;
	}

	function setZonaId($pZonaId) {
		$this -> zonaId = $pZonaId;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function Barrio($pIdBarrio = "", $pCiudadId = "", $pZonaId = "", $pNombre = ""){
		$this -> idBarrio = $pIdBarrio;
		$this -> ciudadId = $pCiudadId;
		$this -> zonaId = $pZonaId;
		$this -> nombre = $pNombre;
		$this -> barrioDAO = new BarrioDAO($this -> idBarrio, $this -> ciudadId, $this -> zonaId, $this -> nombre);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> barrioDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> barrioDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> barrioDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idBarrio = $result[0];
		$this -> ciudadId = $result[1];
		$this -> zonaId = $result[2];
		$this -> nombre = $result[3];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> barrioDAO -> selectAll());
		$barrios = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($barrios, new Barrio($result[0], $result[1], $result[2], $result[3]));
		}
		$this -> connection -> close();
		return $barrios;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> barrioDAO -> selectAllOrder($order, $dir));
		$barrios = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($barrios, new Barrio($result[0], $result[1], $result[2], $result[3]));
		}
		$this -> connection -> close();
		return $barrios;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> barrioDAO -> search($search));
		$barrios = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($barrios, new Barrio($result[0], $result[1], $result[2], $result[3]));
		}
		$this -> connection -> close();
		return $barrios;
	}
}
?>
