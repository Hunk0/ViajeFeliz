<?php
require_once ("persistencia/Arr_telefonoDAO.php");
require_once ("persistencia/Connection.php");

class Arr_telefono {
	private $idArr_telefono;
	private $telefono;
	private $arr_telefonoDAO;
	private $connection;

	function getIdArr_telefono() {
		return $this -> idArr_telefono;
	}

	function setIdArr_telefono($pIdArr_telefono) {
		$this -> idArr_telefono = $pIdArr_telefono;
	}

	function getTelefono() {
		return $this -> telefono;
	}

	function setTelefono($pTelefono) {
		$this -> telefono = $pTelefono;
	}

	function Arr_telefono($pIdArr_telefono = "", $pTelefono = ""){
		$this -> idArr_telefono = $pIdArr_telefono;
		$this -> telefono = $pTelefono;
		$this -> arr_telefonoDAO = new Arr_telefonoDAO($this -> idArr_telefono, $this -> telefono);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> arr_telefonoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> arr_telefonoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> arr_telefonoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idArr_telefono = $result[0];
		$this -> telefono = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> arr_telefonoDAO -> selectAll());
		$arr_telefonos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($arr_telefonos, new Arr_telefono($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $arr_telefonos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> arr_telefonoDAO -> selectAllOrder($order, $dir));
		$arr_telefonos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($arr_telefonos, new Arr_telefono($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $arr_telefonos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> arr_telefonoDAO -> search($search));
		$arr_telefonos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($arr_telefonos, new Arr_telefono($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $arr_telefonos;
	}
}
?>
