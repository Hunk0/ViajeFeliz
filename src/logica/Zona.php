<?php
require_once ("persistencia/ZonaDAO.php");
require_once ("persistencia/Connection.php");

class Zona {
	private $idZona;
	private $nombre;
	private $zonaDAO;
	private $connection;

	function getIdZona() {
		return $this -> idZona;
	}

	function setIdZona($pIdZona) {
		$this -> idZona = $pIdZona;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function Zona($pIdZona = "", $pNombre = ""){
		$this -> idZona = $pIdZona;
		$this -> nombre = $pNombre;
		$this -> zonaDAO = new ZonaDAO($this -> idZona, $this -> nombre);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> zonaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> zonaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> zonaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idZona = $result[0];
		$this -> nombre = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> zonaDAO -> selectAll());
		$zonas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($zonas, new Zona($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $zonas;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> zonaDAO -> selectAllOrder($order, $dir));
		$zonas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($zonas, new Zona($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $zonas;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> zonaDAO -> search($search));
		$zonas = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($zonas, new Zona($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $zonas;
	}
}
?>
