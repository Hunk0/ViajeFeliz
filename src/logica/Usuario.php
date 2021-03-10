<?php
require_once ("persistencia/UsuarioDAO.php");
require_once ("persistencia/Connection.php");

class Usuario {
	private $idUsuario;
	private $nacionalidadId;
	private $nombres;
	private $apellidos;
	private $residencia;
	private $correo;
	private $clave;
	private $usuarioDAO;
	private $connection;

	function getIdUsuario() {
		return $this -> idUsuario;
	}

	function setIdUsuario($pIdUsuario) {
		$this -> idUsuario = $pIdUsuario;
	}

	function getNacionalidadId() {
		return $this -> nacionalidadId;
	}

	function setNacionalidadId($pNacionalidadId) {
		$this -> nacionalidadId = $pNacionalidadId;
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

	function getResidencia() {
		return $this -> residencia;
	}

	function setResidencia($pResidencia) {
		$this -> residencia = $pResidencia;
	}

	function getCorreo() {
		return $this -> correo;
	}

	function setCorreo($pCorreo) {
		$this -> correo = $pCorreo;
	}

	function getClave() {
		return $this -> clave;
	}

	function setClave($pClave) {
		$this -> clave = $pClave;
	}

	function Usuario($pIdUsuario = "", $pNacionalidadId = "", $pNombres = "", $pApellidos = "", $pResidencia = "", $pCorreo = "", $pClave = ""){
		$this -> idUsuario = $pIdUsuario;
		$this -> nacionalidadId = $pNacionalidadId;
		$this -> nombres = $pNombres;
		$this -> apellidos = $pApellidos;
		$this -> residencia = $pResidencia;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> usuarioDAO = new UsuarioDAO($this -> idUsuario, $this -> nacionalidadId, $this -> nombres, $this -> apellidos, $this -> residencia, $this -> correo, $this -> clave);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> usuarioDAO -> insert());
		$this -> connection -> close();
	}

	function auth(){
		$this -> connection -> open();
        $this -> connection -> run($this -> usuarioDAO -> auth());
        if($this -> connection -> numRows() == 1){
            $resultado = $this -> connection -> fetchRow();
            $this -> idUsuario = $resultado[0];
            $this -> connection -> close();
            return true;
        }else{
            $this -> connection -> close();
            return false;
        }
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> usuarioDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> usuarioDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idUsuario = $result[0];
		$this -> nacionalidadId = $result[1];
		$this -> nombres = $result[2];
		$this -> apellidos = $result[3];
		$this -> residencia = $result[4];
		$this -> correo = $result[5];
		$this -> clave = $result[6];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> usuarioDAO -> selectAll());
		$usuarios = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($usuarios, new Usuario($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6]));
		}
		$this -> connection -> close();
		return $usuarios;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> usuarioDAO -> selectAllOrder($order, $dir));
		$usuarios = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($usuarios, new Usuario($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6]));
		}
		$this -> connection -> close();
		return $usuarios;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> usuarioDAO -> search($search));
		$usuarios = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($usuarios, new Usuario($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6]));
		}
		$this -> connection -> close();
		return $usuarios;
	}
}
?>
