<?php
require_once ("persistencia/ClimatizacionDAO.php");
require_once ("persistencia/Connection.php");

class Climatizacion {
	private $idClimatizacion;
	private $nombre;
	private $climatizacionDAO;
	private $connection;

	function getIdClimatizacion() {
		return $this -> idClimatizacion;
	}

	function setIdClimatizacion($pIdClimatizacion) {
		$this -> idClimatizacion = $pIdClimatizacion;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function Climatizacion($pIdClimatizacion = "", $pNombre = ""){
		$this -> idClimatizacion = $pIdClimatizacion;
		$this -> nombre = $pNombre;
		$this -> climatizacionDAO = new ClimatizacionDAO($this -> idClimatizacion, $this -> nombre);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> climatizacionDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> climatizacionDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> climatizacionDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idClimatizacion = $result[0];
		$this -> nombre = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> climatizacionDAO -> selectAll());
		$climatizacions = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($climatizacions, new Climatizacion($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $climatizacions;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> climatizacionDAO -> selectAllOrder($order, $dir));
		$climatizacions = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($climatizacions, new Climatizacion($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $climatizacions;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> climatizacionDAO -> search($search));
		$climatizacions = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($climatizacions, new Climatizacion($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $climatizacions;
	}
}
?>
