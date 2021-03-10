<?php
require_once ("persistencia/CiudadDAO.php");
require_once ("persistencia/Connection.php");

class Ciudad {
	private $idCiudad;
	private $regionId;
	private $nombre;
	private $ciudadDAO;
	private $connection;

	function getIdCiudad() {
		return $this -> idCiudad;
	}

	function setIdCiudad($pIdCiudad) {
		$this -> idCiudad = $pIdCiudad;
	}

	function getRegionId() {
		return $this -> regionId;
	}

	function setRegionId($pRegionId) {
		$this -> regionId = $pRegionId;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function Ciudad($pIdCiudad = "", $pRegionId = "", $pNombre = ""){
		$this -> idCiudad = $pIdCiudad;
		$this -> regionId = $pRegionId;
		$this -> nombre = $pNombre;
		$this -> ciudadDAO = new CiudadDAO($this -> idCiudad, $this -> regionId, $this -> nombre);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> ciudadDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> ciudadDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> ciudadDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idCiudad = $result[0];
		$this -> regionId = $result[1];
		$this -> nombre = $result[2];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> ciudadDAO -> selectAll());
		$ciudads = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($ciudads, new Ciudad($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $ciudads;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> ciudadDAO -> selectAllOrder($order, $dir));
		$ciudads = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($ciudads, new Ciudad($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $ciudads;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> ciudadDAO -> search($search));
		$ciudads = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($ciudads, new Ciudad($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $ciudads;
	}
}
?>
