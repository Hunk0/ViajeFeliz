<?php
require_once ("persistencia/RegionDAO.php");
require_once ("persistencia/Connection.php");

class Region {
	private $idRegion;
	private $nombre;
	private $regionDAO;
	private $connection;

	function getIdRegion() {
		return $this -> idRegion;
	}

	function setIdRegion($pIdRegion) {
		$this -> idRegion = $pIdRegion;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function Region($pIdRegion = "", $pNombre = ""){
		$this -> idRegion = $pIdRegion;
		$this -> nombre = $pNombre;
		$this -> regionDAO = new RegionDAO($this -> idRegion, $this -> nombre);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> regionDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> regionDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> regionDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idRegion = $result[0];
		$this -> nombre = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> regionDAO -> selectAll());
		$regions = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($regions, new Region($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $regions;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> regionDAO -> selectAllOrder($order, $dir));
		$regions = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($regions, new Region($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $regions;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> regionDAO -> search($search));
		$regions = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($regions, new Region($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $regions;
	}
}
?>
