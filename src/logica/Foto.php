<?php
require_once ("persistencia/FotoDAO.php");
require_once ("persistencia/Connection.php");

class Foto {
	private $idFoto;
	private $alojamientoId;
	private $ubicacion;
	private $fotoDAO;
	private $connection;

	function getIdFoto() {
		return $this -> idFoto;
	}

	function setIdFoto($pIdFoto) {
		$this -> idFoto = $pIdFoto;
	}

	function getAlojamientoId() {
		return $this -> alojamientoId;
	}

	function setAlojamientoId($pAlojamientoId) {
		$this -> alojamientoId = $pAlojamientoId;
	}

	function getUbicacion() {
		return $this -> ubicacion;
	}

	function setUbicacion($pUbicacion) {
		$this -> ubicacion = $pUbicacion;
	}

	function Foto($pIdFoto = "", $pAlojamientoId = "", $pUbicacion = ""){
		$this -> idFoto = $pIdFoto;
		$this -> alojamientoId = $pAlojamientoId;
		$this -> ubicacion = $pUbicacion;
		$this -> fotoDAO = new FotoDAO($this -> idFoto, $this -> alojamientoId, $this -> ubicacion);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> fotoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> fotoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> fotoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idFoto = $result[0];
		$this -> alojamientoId = $result[1];
		$this -> ubicacion = $result[2];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> fotoDAO -> selectAll());
		$fotos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($fotos, new Foto($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $fotos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> fotoDAO -> selectAllOrder($order, $dir));
		$fotos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($fotos, new Foto($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $fotos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> fotoDAO -> search($search));
		$fotos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($fotos, new Foto($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $fotos;
	}
}
?>
