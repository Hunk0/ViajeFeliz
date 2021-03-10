<?php
class Connection {
	private $mysqli;
	private $result;
	
	//abrir conexion con la base de datos
	function open(){
		$this -> mysqli = new mysqli("localhost", "root", "", "viajefeliz");
		$this -> mysqli -> set_charset("utf8");
	}

	//obtener el ultimo id
	function lastId(){
		return $this -> mysqli -> insert_id;
	}

	//ejecutar una consulta
	function run($query){
		$this -> result = $this -> mysqli -> query($query);
	}

	//cerrar conexion
	function close(){
		$this -> mysqli -> close();
	}

	//obtener la cantidad de filas obtenidas de una consulta
	function numRows(){
		return ($this -> result != null)?$this -> result -> num_rows : 0;
	}

	//extraer informacion de una consulta
	function fetchRow(){
		return $this -> result -> fetch_row();
	}

	//obtener el estado tras ejecutar una consulta
	function querySuccess(){
		return $this -> result === TRUE;
	}
}
?>
