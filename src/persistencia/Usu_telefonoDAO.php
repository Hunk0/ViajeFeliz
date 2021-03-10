<?php
class Usu_telefonoDAO{
	private $usuarioId;
	private $telefono;

	function Usu_telefonoDAO($pUsuarioId = "", $ptelefono = ""){
		$this -> usuarioId = $pUsuarioId;
		$this -> telefono = $ptelefono;
	}

	function insert(){
		return "insert into Usu_telefono(usuarioId, telefono)
				values('" . $this -> usuarioId . "', '" . $this -> telefono . "')";
	}

	function select() {
		return "select *
				from Usu_telefono
				where usuarioId = '" . $this -> usuarioId . "'";
	}

	function selectAll() {
		return "select *
				from Usu_telefono";
	}

	function selectAllOrder($orden, $dir){
		return "select *
				from Usu_telefono
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select *
				from Usu_telefono
				where usuarioId like '%" . $search . "%' or telefono like '%" . $search . "%'";
	}
}
?>
