<?php
class RegionDAO{
	private $regionId;
	private $nombre;

	function RegionDAO( $pRegionId = "", $pNombre = ""){
		$this -> regionId = $pRegionId;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into Region(nombre)
				values('" . $this -> nombre . "')";
	}

	function update(){
		return "update Region set 
				nombre = '" . $this -> nombre . "'	
				where regionId = '" . $this -> regionId . "'";
	}

	function select() {
		return "select *
				from Region
				where regionId = '" . $this -> regionId . "'";
	}

	function selectAll() {
		return "select *
				from Region";
	}

	function selectAllOrder($orden, $dir){
		return "select *
				from Region
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select *
				from Region
				where regionId like '%" . $search . "%' or nombre like '%" . $search . "%'";
	}
}
?>
