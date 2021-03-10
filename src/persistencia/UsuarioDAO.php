<?php
class UsuarioDAO{
	private $usuarioId;
	private $nacionalidadId;
	private $nombres;
	private $apellidos;
	private $residencia;
	private $correo;
	private $clave;

	function UsuarioDAO( $pUsuarioId = "", $pNacionalidadId = "", $pNombres = "", $pApellidos = "", $pResidencia = "", $pCorreo = "", $pClave = ""){
		$this -> usuarioId = $pUsuarioId;
		$this -> nacionalidadId = $pNacionalidadId;
		$this -> nombres = $pNombres;
		$this -> apellidos = $pApellidos;
		$this -> residencia = $pResidencia;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
	}

	function insert(){
		return "insert into Usuario(usuarioId, nacionalidadId, nombres, apellidos, residencia, correo, clave)
				values('" . $this -> usuarioId . "', '" . $this -> nacionalidadId . "', '" . $this -> nombres . "', '" . $this -> apellidos . "', '" . $this -> residencia . "', '" . $this -> correo . "', md5('" . $this -> clave . "'))";
	}

	function auth(){
		return "select usuarioId from Usuario
				where correo = '" . $this -> correo . "' and clave = md5('". $this -> clave . "')";
	}

	function update(){
		return "update Usuario set 
				nacionalidadId = '" . $this -> nacionalidadId . "',
				nombres = '" . $this -> nombres . "',
				apellidos = '" . $this -> apellidos . "',
				residencia = '" . $this -> residencia . "',
				correo = '" . $this -> correo . "',
				clave = '" . $this -> clave . "'	
				where usuarioId = '" . $this -> usuarioId . "'";
	}

	function select() {
		return "select usuarioId, nacionalidadId, nombres, apellidos, residencia, correo, clave
				from Usuario
				where usuarioId = '" . $this -> usuarioId . "'";
	}

	function selectAll() {
		return "select usuarioId, nacionalidadId, nombres, apellidos, residencia, correo, clave
				from Usuario";
	}

	function selectAllOrder($orden, $dir){
		return "select usuarioId, nacionalidadId, nombres, apellidos, residencia, correo, clave
				from Usuario
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select usuarioId, nacionalidadId, nombres, apellidos, residencia, correo, clave
				from Usuario
				where usuarioId like '%" . $search . "%' or nacionalidadId like '%" . $search . "%' or nombres like '%" . $search . "%' or apellidos like '%" . $search . "%' or residencia like '%" . $search . "%' or correo like '%" . $search . "%' or clave like '%" . $search . "%'";
	}
}
?>
