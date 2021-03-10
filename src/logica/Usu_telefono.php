<?php
require_once ("persistencia/Usu_telefonoDAO.php");
require_once ("persistencia/Connection.php");

class Usu_telefono {
	private $idUsu_telefono;
	private $telefono;
	private $usu_telefonoDAO;
	private $connection;

	function getIdUsu_telefono() {
		return $this -> idUsu_telefono;
	}

	function setIdUsu_telefono($pIdUsu_telefono) {
		$this -> idUsu_telefono = $pIdUsu_telefono;
	}

	function getTelefono() {
		return $this -> telefono;
	}

	function setTelefono($pTelefono) {
		$this -> telefono = $pTelefono;
	}

	function Usu_telefono($pIdUsu_telefono = "", $pTelefono = ""){
		$this -> idUsu_telefono = $pIdUsu_telefono;
		$this -> telefono = $pTelefono;
		$this -> usu_telefonoDAO = new Usu_telefonoDAO($this -> idUsu_telefono, $this -> telefono);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> usu_telefonoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> usu_telefonoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> usu_telefonoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idUsu_telefono = $result[0];
		$this -> telefono = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> usu_telefonoDAO -> selectAll());
		$usu_telefonos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($usu_telefonos, new Usu_telefono($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $usu_telefonos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> usu_telefonoDAO -> selectAllOrder($order, $dir));
		$usu_telefonos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($usu_telefonos, new Usu_telefono($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $usu_telefonos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> usu_telefonoDAO -> search($search));
		$usu_telefonos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($usu_telefonos, new Usu_telefono($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $usu_telefonos;
	}
}
?>
