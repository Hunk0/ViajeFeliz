<?php
class PagoDAO{
	private $pagoId;
	private $reservaId;
	private $estadoId;
	private $fecha;
	private $cantidad;

	function PagoDAO($pPagoId = "", $pReservaId = "", $pEstadoId = "", $pFecha = "", $pCantidad = ""){
		$this -> pagoId = $pPagoId;
		$this -> reservaId = $pReservaId;
		$this -> estadoId = $pEstadoId;
		$this -> fecha = $pFecha;
		$this -> cantidad = $pCantidad;
	}

	function insert(){
		return "insert into Pago(pagoId, reservaId, estadoId, fecha, cantidad)
				values('" . $this -> pagoId . "', '" . $this -> reservaId . "', '" . $this -> estadoId . "', '" . $this -> fecha . "', '" . $this -> cantidad . "')";
	}

	function update(){
		return "update Pago set 
				reservaId = '" . $this -> reservaId . "',
				estadoId = '" . $this -> estadoId . "',
				fecha = '" . $this -> fecha . "',
				cantidad = '" . $this -> cantidad . "'	
				where pagoId = '" . $this -> pagoId . "'";
	}

	function select() {
		return "select *
				from Pago
				where pagoId = '" . $this -> pagoId . "'";
	}

	function selectAll() {
		return "select *
				from Pago";
	}

	function selectAllOrder($orden, $dir){
		return "select *
				from Pago
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select *
				from Pago
				where estadoId like '%" . $search . "%' or fecha like '%" . $search . "%' or cantidad like '%" . $search . "%'";
	}
}
?>
