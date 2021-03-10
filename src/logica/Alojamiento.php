<?php
require_once ("persistencia/AlojamientoDAO.php");
require_once ("persistencia/Connection.php");

class Alojamiento {
	private $idAlojamiento;
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
	private $alojamientoDAO;
	private $connection;

	function getIdAlojamiento() {
		return $this -> idAlojamiento;
	}

	function setIdAlojamiento($pIdAlojamiento) {
		$this -> idAlojamiento = $pIdAlojamiento;
	}

	function getArrendadorId() {
		return $this -> arrendadorId;
	}

	function setArrendadorId($pArrendadorId) {
		$this -> arrendadorId = $pArrendadorId;
	}

	function getTipoId() {
		return $this -> tipoId;
	}

	function setTipoId($pTipoId) {
		$this -> tipoId = $pTipoId;
	}

	function getClimatizacionId() {
		return $this -> climatizacionId;
	}

	function setClimatizacionId($pClimatizacionId) {
		$this -> climatizacionId = $pClimatizacionId;
	}

	function getBarrioId() {
		return $this -> barrioId;
	}

	function setBarrioId($pBarrioId) {
		$this -> barrioId = $pBarrioId;
	}

	function getDireccion() {
		return $this -> direccion;
	}

	function setDireccion($pDireccion) {
		$this -> direccion = $pDireccion;
	}

	function getCapacidadPersonas() {
		return $this -> capacidadPersonas;
	}

	function setCapacidadPersonas($pCapacidadPersonas) {
		$this -> capacidadPersonas = $pCapacidadPersonas;
	}

	function getSoporteMascotas() {
		return $this -> soporteMascotas;
	}

	function setSoporteMascotas($pSoporteMascotas) {
		$this -> soporteMascotas = $pSoporteMascotas;
	}

	function getNoHabitaciones() {
		return $this -> noHabitaciones;
	}

	function setNoHabitaciones($pNoHabitaciones) {
		$this -> noHabitaciones = $pNoHabitaciones;
	}

	function getNoBanios() {
		return $this -> noBanios;
	}

	function setNoBanios($pNoBanios) {
		$this -> noBanios = $pNoBanios;
	}

	function getCostoDiario() {
		return $this -> costoDiario;
	}

	function setCostoDiario($pCostoDiario) {
		$this -> costoDiario = $pCostoDiario;
	}

	function Alojamiento($pIdAlojamiento = "", $pArrendadorId = "", $pTipoId = "", $pClimatizacionId = "", $pBarrioId = "", $pDireccion = "", $pCapacidadPersonas = "", $pSoporteMascotas = "", $pNoHabitaciones = "", $pNoBanios = "", $pCostoDiario = ""){
		$this -> idAlojamiento = $pIdAlojamiento;
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
		$this -> alojamientoDAO = new AlojamientoDAO($this -> idAlojamiento, $this -> arrendadorId, $this -> tipoId, $this -> climatizacionId, $this -> barrioId, $this -> direccion, $this -> capacidadPersonas, $this -> soporteMascotas, $this -> noHabitaciones, $this -> noBanios, $this -> costoDiario);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> alojamientoDAO -> insert());
		$this -> connection -> close();
	}

	function ultimoId(){
        $this -> connection -> open();
        $this -> connection -> run($this -> alojamientoDAO -> ultimoId());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
        return $result[0];
    }

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> alojamientoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> alojamientoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idAlojamiento = $result[0];
		$this -> arrendadorId = $result[1];
		$this -> tipoId = $result[2];
		$this -> climatizacionId = $result[3];
		$this -> barrioId = $result[4];
		$this -> direccion = $result[5];
		$this -> capacidadPersonas = $result[6];
		$this -> soporteMascotas = $result[7];
		$this -> noHabitaciones = $result[8];
		$this -> noBanios = $result[9];
		$this -> costoDiario = $result[10];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> alojamientoDAO -> selectAll());
		$alojamientos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($alojamientos, new Alojamiento($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10]));
		}
		$this -> connection -> close();
		return $alojamientos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> alojamientoDAO -> selectAllOrder($order, $dir));
		$alojamientos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($alojamientos, new Alojamiento($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10]));
		}
		$this -> connection -> close();
		return $alojamientos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> alojamientoDAO -> search($search));
		$alojamientos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($alojamientos, new Alojamiento($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10]));
		}
		$this -> connection -> close();
		return $alojamientos;
	}
}
?>
