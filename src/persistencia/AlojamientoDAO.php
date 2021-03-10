<?php
class AlojamientoDAO{
	private $alojamientoId;
	private $arrendadorId;
	private $tipoId;
	private $climatizacionId;
	private $barrioId;
	private $direccion;
	private $capacidadPersonas;
	private $soporteMascotas;
	private $noHabitaciones;
	private $noBanios;
	private $costoDiario;

	function AlojamientoDAO($palojamientoId = "", $pArrendadorId = "", $pTipoId = "", $pClimatizacionId = "", $pBarrioId = "", $pDireccion = "", $pCapacidadPersonas = "", $pSoporteMascotas = "", $pNoHabitaciones = "", $pNoBanios = "", $pCostoDiario = ""){
		$this -> alojamientoId = $palojamientoId;
		$this -> arrendadorId = $pArrendadorId;
		$this -> tipoId = $pTipoId;
		$this -> climatizacionId = $pClimatizacionId;
		$this -> barrioId = $pBarrioId;
		$this -> direccion = $pDireccion;
		$this -> capacidadPersonas = $pCapacidadPersonas;
		$this -> soporteMascotas = $pSoporteMascotas;
		$this -> noHabitaciones = $pNoHabitaciones;
		$this -> noBanios = $pNoBanios;
		$this -> costoDiario = $pCostoDiario;
	}

	function insert(){
		return "insert into Alojamiento(arrendadorId, tipoId, climatizacionId, barrioId, direccion, capacidadPersonas, soporteMascotas, noHabitaciones, noBanios, costoDiario)
				values('" . $this -> arrendadorId . "', '" . $this -> tipoId . "', '" . $this -> climatizacionId . "', '" . $this -> barrioId . "', '" . $this -> direccion . "', '" . $this -> capacidadPersonas . "', '" . $this -> soporteMascotas . "', '" . $this -> noHabitaciones . "', '" . $this -> noBanios . "', '" . $this -> costoDiario . "')";
	}

	function ultimoId(){
        return "SELECT MAX(alojamientoId) AS alojamientoId FROM Alojamiento";
    }

	function update(){
		return "update Alojamiento set 
				arrendadorId = '" . $this -> arrendadorId . "',
				tipoId = '" . $this -> tipoId . "',
				climatizacionId = '" . $this -> climatizacionId . "',
				barrioId = '" . $this -> barrioId . "',
				direccion = '" . $this -> direccion . "',
				capacidadPersonas = '" . $this -> capacidadPersonas . "',
				soporteMascotas = '" . $this -> soporteMascotas . "',
				noHabitaciones = '" . $this -> noHabitaciones . "',
				noBanios = '" . $this -> noBanios . "',
				costoDiario = '" . $this -> costoDiario . "'	
				where alojamientoId = '" . $this -> alojamientoId . "'";
	}

	function select() {
		return "select alojamientoId, arrendadorId, tipoId, climatizacionId, barrioId, direccion, capacidadPersonas, soporteMascotas, noHabitaciones, noBanios, costoDiario
				from Alojamiento
				where alojamientoId = '" . $this -> alojamientoId . "'";
	}

	function selectAll() {
		return "select alojamientoId, arrendadorId, tipoId, climatizacionId, barrioId, direccion, capacidadPersonas, soporteMascotas, noHabitaciones, noBanios, costoDiario
				from Alojamiento";
	}

	function selectAllOrder($orden, $dir){
		return "select alojamientoId, arrendadorId, tipoId, climatizacionId, barrioId, direccion, capacidadPersonas, soporteMascotas, noHabitaciones, noBanios, costoDiario
				from Alojamiento
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select alojamientoId, arrendadorId, tipoId, climatizacionId, barrioId, direccion, capacidadPersonas, soporteMascotas, noHabitaciones, noBanios, costoDiario
				from Alojamiento
				where arrendadorId like '%" . $search . "%' or tipoId like '%" . $search . "%' or climatizacionId like '%" . $search . "%' or barrioId like '%" . $search . "%' or direccion like '%" . $search . "%' or capacidadPersonas like '%" . $search . "%' or soporteMascotas like '%" . $search . "%' or noHabitaciones like '%" . $search . "%' or noBanios like '%" . $search . "%' or costoDiario like '%" . $search . "%'";
	}
}
?>
