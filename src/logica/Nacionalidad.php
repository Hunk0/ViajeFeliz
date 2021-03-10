<?php
require_once ("persistencia/NacionalidadDAO.php");
require_once ("persistencia/Connection.php");

class Nacionalidad {
	private $idNacionalidad;
	private $nombre;
	private $nacionalidadDAO;
	private $connection;

	function getIdNacionalidad() {
		return $this -> idNacionalidad;
	}

	function setIdNacionalidad($pIdNacionalidad) {
		$this -> idNacionalidad = $pIdNacionalidad;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function Nacionalidad($pIdNacionalidad = "", $pNombre = ""){
		$this -> idNacionalidad = $pIdNacionalidad;
		$this -> nombre = $pNombre;
		$this -> nacionalidadDAO = new NacionalidadDAO($this -> idNacionalidad, $this -> nombre);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> nacionalidadDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> nacionalidadDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> nacionalidadDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idNacionalidad = $result[0];
		$this -> nombre = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> nacionalidadDAO -> selectAll());
		$nacionalidads = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($nacionalidads, new Nacionalidad($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $nacionalidads;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> nacionalidadDAO -> selectAllOrder($order, $dir));
		$nacionalidads = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($nacionalidads, new Nacionalidad($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $nacionalidads;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> nacionalidadDAO -> search($search));
		$nacionalidads = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($nacionalidads, new Nacionalidad($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $nacionalidads;
	}
}
?>
