<?php 
    if(!isset($_GET["id"])){
        header("index.php");
    }
?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    
                <ol class="carousel-indicators">
                    <?php 
                        $foto = new Foto();
                        $fotos = $foto -> search($_GET["id"]);
                        for($i=0; $i<sizeof($fotos); $i++){
                            ?>
                            <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $i ?>"></li>
                            <?php
                        }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php 
                        for($i=0; $i<sizeof($fotos); $i++){
                            ?>
                            <div class="carousel-item <?php echo ($i==0)?"active":""; ?>">
                                <img src="img/<?php echo $fotos[$i]-> getUbicacion()?>" class="d-block w-100" style="height: 400px; object-fit: cover;">
                            </div>
                            <?php
                        }
                    ?>
                    
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
        </div>
        <div class="col">
        <?php
            $alojamiento = new Alojamiento($_GET["id"]);
            $alojamiento -> select();

            $temperatura = new Climatizacion($alojamiento -> getClimatizacionId());
            $temperatura -> select();

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
        <div class="card w-100" style="min-height: 400px;">
            <div class="card-body">
                <h5 class="card-title">Hospedaje en: <?php echo $ciudad -> getNombre().", ".$barrio -> getNombre();?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Zona <?php echo $zona -> getNombre() ?></h6>
                <br/>
                <div class="container row text-center">
                    <div class="col">
                        <h3>
                            <i class="fas fa-users" data-toggle="tooltip" data-placement="top" title="Capacidad"></i>
                            <small class="text-muted"><?php echo $alojamiento -> getCapacidadPersonas()?></small>
                        </h3>
                    </div>
                    <div class="col">
                        <h3>
                            <i class="fas fa-bed" data-toggle="tooltip" data-placement="top" title="Habitaciones"></i>
                            <small class="text-muted"><?php echo $alojamiento -> getNoHabitaciones()?></small>
                        </h3>
                    </div>
                    <div class="col">
                        <h3>
                            <i class="fas fa-bath" data-toggle="tooltip" data-placement="top" title="Baños"></i>
                            <small class="text-muted"><?php echo $alojamiento -> getNoBanios()?></small>
                        </h3>
                    </div>
                </div>
                <hr/>
                <div class="container row">
                    <div class="col-auto ml-md-4">
                        <h3>
                            <i class="fas fa-map-marked-alt" data-toggle="tooltip" data-placement="top" title="Ubicacion"></i>
                            <small class="text-muted"><?php echo $alojamiento -> getDireccion()?></small>
                        </h3>
                        <br/>
                        <h3>
                            <i class="fas fa-thermometer-half" data-toggle="tooltip" data-placement="top" title="Sistema de temperatura"></i>
                            <small class="text-muted"><?php echo $temperatura -> getNombre()?></small>
                        </h3>
                        <br/>
                        <?php if($alojamiento -> getSoporteMascotas() == 1){ ?>
                            <h3>
                                <i class="fas fa-dog"></i>
                                <small class="text-muted">Se permiten mascotas</small>
                            </h3>
                    <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <blockquote class="blockquote">
                            <p class="mb-0">$<?php echo $alojamiento -> getCostoDiario()?></p>
                            <footer>Costo diario sujeto a cambios.</footer>
                        </blockquote>
                    </div>
                    <div class="col">
                        <div class="text-right">
                            <button id="reservar" type="button" class="btn btn-primary">Hacer reserva</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <br/><br/>
    <div style="width: 100%">
        <iframe scrolling="no" 
                marginheight="0" 
                marginwidth="0" 
                src="https://maps.google.com/maps?width=100%25&amp;height=300&amp;hl=es&amp;q=<?php echo "%".$ciudad -> getNombre().",%".$barrio -> getNombre()."+(".str_replace(' ', '%', $direccion).")";?>&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" 
                width="100%" 
                height="300" 
                frameborder="0">
        </iframe>
    </div>
    <?php
        $text='';
        $tel = new Arr_telefono($alojamiento -> getArrendadorId());
        $telefonos = $tel -> selectAll();
        if(sizeof($telefonos)==0){
            $arrendador = new Arrendador($alojamiento -> getArrendadorId());
            $arrendador -> select();
            $text=$text.'al correo: '.$arrendador -> getCorreo();
        }else{
            $text=$text.'al telefono(s): ';
            for($i=0; $i<sizeof($telefonos); $i++){
                $text=$text.' '.$telefonos[$i] -> getTelefono();
                if($i!=sizeof($telefonos)-1){
                    $text=$text.',';
                }
            }
        }
            
    ?>
    <h6>La ubicacion real puede diferir, para mas informacion contacte al dueño de la publicacion <?php echo $text;?></h6>
</div>

<div id="reservaModal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reservar hospedaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="content">
                
            </div>
        </div>
    </div>
</div>

<script>
    $("#reservar").click(function(e){
        if('<?php echo $_SESSION['id']?>'!=''){
            if('<?php echo $_SESSION['rol']?>'=='user'){
                url="indexAjax.php?pid=<?php echo base64_encode("presentacion/Ajax/modalReserva.php") ?>&id=<?php echo $_GET["id"];?>";
                $("#content").load(url);
                $('#reservaModal').modal('show');
            }
        }else{
            $('#exampleModal').modal('show');
        }
    });
</script>

