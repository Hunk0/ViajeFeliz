<?php
require_once ("persistencia/ArrendadorDAO.php");
require_once ("persistencia/Connection.php");

class Arrendador {
	private $idArrendador;
	private $nombres;
	private $apellidos;
	private $correo;
	private $clave;
	private $arrendadorDAO;
	private $connection;

	function getIdArrendador() {
		return $this -> idArrendador;
	}

	function setIdArrendador($pIdArrendador) {
		$this -> idArrendador = $pIdArrendador;
	}

	function getNombres() {
		return $this -> nombres;
	}

	function setNombres($pNombres) {
		$this -> nombres = $pNombres;
	}

	function getApellidos() {
		return $this -> apellidos;
	}

	function setApellidos($pApellidos) {
		$this -> apellidos = $pApellidos;
	}

	function getCorreo() {
		return $this -> correo;
	}

	function setCorreo($pCorreo) {
		$this -> correo = $pCorreo;
	}

	function Arrendador($pIdArrendador = "", $pNombres = "", $pApellidos = "", $pCorreo = "", $pClave = ""){
		$this -> idArrendador = $pIdArrendador;
		$this -> nombres = $pNombres;
		$this -> apellidos = $pApellidos;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> arrendadorDAO = new ArrendadorDAO($this -> idArrendador, $this -> nombres, $this -> apellidos, $this -> correo, $this -> clave);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> arrendadorDAO -> insert());
		$this -> connection -> close();
	}

	function auth(){
		$this -> connection -> open();
        $this -> connection -> run($this -> arrendadorDAO -> auth());
        if($this -> connection -> numRows() == 1){
            $resultado = $this -> connection -> fetchRow();
            $this -> idArrendador = $resultado[0];
            $this -> connection -> close();
            return true;
        }else{
            $this -> connection -> close();
            return false;
        }
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> arrendadorDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> arrendadorDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idArrendador = $result[0];
		$this -> nombres = $result[1];
		$this -> apellidos = $result[2];
		$this -> correo = $result[3];
		$this -> clave = $result[4];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> arrendadorDAO -> selectAll());
		$arrendadors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($arrendadors, new Arrendador($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $arrendadors;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> arrendadorDAO -> selectAllOrder($order, $dir));
		$arrendadors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($arrendadors, new Arrendador($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $arrendadors;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> arrendadorDAO -> search($search));
		$arrendadors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($arrendadors, new Arrendador($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $arrendadors;
	}
}
?>
