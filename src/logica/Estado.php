<?php
require_once ("persistencia/EstadoDAO.php");
require_once ("persistencia/Connection.php");

class Estado {
	private $idEstado;
	private $nombre;
	private $detalles;
	private $estadoDAO;
	private $connection;

	function getIdEstado() {
		return $this -> idEstado;
	}

	function setIdEstado($pIdEstado) {
		$this -> idEstado = $pIdEstado;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getDetalles() {
		return $this -> detalles;
	}

	function setDetalles($pDetalles) {
		$this -> detalles = $pDetalles;
	}

	function Estado($pIdEstado = "", $pNombre = "", $pDetalles = ""){
		$this -> idEstado = $pIdEstado;
		$this -> nombre = $pNombre;
		$this -> detalles = $pDetalles;
		$this -> estadoDAO = new EstadoDAO($this -> idEstado, $this -> nombre, $this -> detalles);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idEstado = $result[0];
		$this -> nombre = $result[1];
		$this -> detalles = $result[2];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoDAO -> selectAll());
		$estados = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($estados, new Estado($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $estados;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoDAO -> selectAllOrder($order, $dir));
		$estados = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($estados, new Estado($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $estados;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoDAO -> search($search));
		$estados = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($estados, new Estado($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $estados;
	}
}
?>
