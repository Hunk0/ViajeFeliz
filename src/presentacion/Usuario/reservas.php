<?php
    if(!isset($_SESSION["id"])){
        header("index.php");
    }
    $reserva = new Reserva();
    $reservas = $reserva -> search($_SESSION["id"]);
?>
<div class="container">
<div class="list-group">
    <?php
        foreach($reservas as $r){
            $alojamiento = new Alojamiento($r -> getAlojamientoId());
            $alojamiento -> select();
            $barrio = new Barrio($alojamiento -> getBarrioId());
            $barrio -> select();
            $zona = new Zona($barrio -> getZonaId());
            $zona -> select();
            $ciudad = new Ciudad($barrio -> getCiudadId());
            $ciudad -> select();
            $region = new Region($ciudad -> getRegionId());
            $region -> select();
            $direccion = $alojamiento -> getDireccion();
            ?>
                <a href='<?php echo "index.php?pid=".base64_encode("presentacion/pago.php")."&rid=".$r -> getIdReserva() ?>' class="list-group-item list-group-item-action">
                    Reserva en: <?php echo $ciudad -> getNombre().", ".$barrio -> getNombre()?>
                </a>
            <?php
        }    
    ?>
    </div>
</div>