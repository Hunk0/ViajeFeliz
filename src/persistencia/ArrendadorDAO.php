<?php
class ArrendadorDAO{
	private $arrendadorId;
	private $nombres;
	private $apellidos;
	private $correo;
	private $clave;

	function ArrendadorDAO($pArrendadorId = "", $pNombres = "", $pApellidos = "", $pCorreo = "", $pClave = ""){
		$this -> arrendadorId = $pArrendadorId;
		$this -> nombres = $pNombres;
		$this -> apellidos = $pApellidos;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
	}

	function insert(){
		return "insert into Arrendador(arrendadorId, nombres, apellidos, correo, clave)
				values('" . $this -> arrendadorId . "', '" . $this -> nombres . "', '" . $this -> apellidos . "', '" . $this -> correo . "', md5('" . $this -> clave . "'))";
	}

	function auth(){
		return "select arrendadorId from Arrendador
				where correo = '" . $this -> correo . "' and clave = md5('". $this -> clave . "')";
	}

	function update(){
		return "update Arrendador set 
				nombres = '" . $this -> nombres . "',
				apellidos = '" . $this -> apellidos . "',
				correo = '" . $this -> correo . "',
				clave = '" . $this -> clave . "'	
				where arrendadorId = '" . $this -> arrendadorId . "'";
	}

	function select() {
		return "select *
				from Arrendador
				where arrendadorId = '" . $this -> arrendadorId . "'";
	}

	function selectAll() {
		return "select *
				from Arrendador";
	}

	function selectAllOrder($orden, $dir){
		return "select *
				from Arrendador
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select *
				from Arrendador
				where nombres like '%" . $search . "%' or apellidos like '%" . $search . "%' or correo like '%";
	}
}
?>
