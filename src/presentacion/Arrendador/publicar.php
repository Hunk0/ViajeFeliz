<?php
    if($_SESSION['rol']!="arr" || $_SESSION['id']==""){
        header("index.php");
    }
    $error="";
    if(isset($_POST["new"])){        
        $countfiles = count($_FILES['galeria']['name']);  
        // Verificar fotos
        for($i=0;$i<$countfiles;$i++){
            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/viajefeliz/src/img/';
            $nombrearchivo = round(microtime(true) * 1000); 
            $path = $_FILES['galeria']['name'][$i]; 
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $tipoarchivo = $_FILES['galeria']['type'][$i]; 
            if (!($tipoarchivo == "image/png" || $tipoarchivo == "image/jpeg" || $tipoarchivo == "image/jpg")){
                $error="Almenos uno de los archivos no es de tipo imagen";
            }      
        }

        if($error==""){
            $tipo = $_POST["customRadioInline1"];
            $climatizacion = $_POST["clima"];
            $barrio = $_POST["barrio"];
            $direccion = $_POST["direccion"];
            $noPersonas = $_POST["personas"];
            $aceptarMascota = (isset($_POST["mascotas"]))?"1":"0";
            $habitaciones = $_POST["habitaciones"];
            $banios = $_POST["banios"];
            $costo = $_POST["costo"];
            $alojamiento = new Alojamiento( "", 
                                            $_SESSION['id'],  
                                            $tipo,
                                            $climatizacion, 
                                            $barrio, 
                                            $direccion, 
                                            $noPersonas, 
                                            $aceptarMascota, 
                                            $habitaciones, 
                                            $banios,
                                            $costo);
            $alojamiento -> insert();
            $id = $alojamiento -> ultimoId();
            //Subir galeria
            for($i=0;$i<$countfiles;$i++){
                $nombrearchivo=(round(microtime(true) * 1000)).".".$ext;
                move_uploaded_file($_FILES['galeria']['tmp_name'][$i],$carpeta_destino.$nombrearchivo);
                $foto = new Foto('', $id, $nombrearchivo);
                $foto -> insert();
            }
            header("index.php?pid=".base64_encode("presentacion/publicaciones.php"));
        }
    }
?>

<script>
    function filtrarCiudad(region){
        url="indexAjax.php?pid=<?php echo base64_encode("presentacion/Ajax/filtrarCiudad.php") ?>&search="+region;
        $("#ciudadinput").load(url);
    };

    function filtrarBarrio(ciudad){
        url="indexAjax.php?pid=<?php echo base64_encode("presentacion/Ajax/filtrarBarrio.php") ?>&search="+ciudad;
        $("#barrioinput").load(url);
    };

    $(document).ready(function(){
        $("#regioninput").change(function(){
            var region = $(this).val();
            filtrarCiudad(region);     
            filtrarBarrio("");
        });

        $("#ciudadinput").change(function(){
            var ciudad = $(this).val();
            filtrarBarrio(ciudad);          
        });
    });

    
</script>


<div class="container p-4">
        <?php
            if($error!=""){
                echo '
                    <div id="alert" class="alert alert-danger alert-dismissible fade show" role ="alert" >
                        '.$error.'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br/>';
            }
        ?>
<div class="card mx-auto w-75" >
		<div class="card-body">
			<h5 class="card-title text-center">Nuevo Alojamiento</h5>
			<br />
			<form action=<?php echo "index.php?pid=".base64_encode("presentacion/Arrendador/publicar.php")?> enctype='multipart/form-data' method="post">
                <div class="form-group text-center " >
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" value="1" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" required>
                        <label class="custom-control-label" for="customRadioInline1">Casa</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" value="2" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" required>
                        <label class="custom-control-label" for="customRadioInline2">Cabaña</label>
                    </div>
				</div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Cantidad de habitaciones</label>
                        <input name="habitaciones" type="number" class="form-control" id="validationCustom01" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Cantidad de baños</label>
                        <input name="banios" type="number" class="form-control" id="validationCustom02" required>
                    </div>   
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Costo diario</label>
                        <input name="costo" type="number" class="form-control" id="validationCustom02" required>
                    </div>
                </div>	
                <div class="form-row align-items-center">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Capacidad para personas</label>
                        <input name="personas" type="number" class="form-control" id="validationCustom01" required>
                    </div>    
                    <div class="col-md-6 mb-3">
                        <label for="climainput">Sistema de calefaccion</label>
						<select name="clima" id="climainput" class="custom-select" required>
                            <?php 
                                $clima = new Climatizacion();
                                $climas = $clima -> selectAll();
                                foreach($climas as $c){
                                    echo '<option value="'.$c->getIdClimatizacion().'">'.$c->getNombre().'</option>';
                                }
                            ?>
						</select>
                    </div>    
                </div>	
                <div class="form-group form-row">
                    <div class="col mb-2" >
						<label for="regioninput">Region</label>
						<select name="region" id="regioninput" class="custom-select" required>
                            <?php
								$region = new Region();
								$regiones = $region -> selectAll();
								foreach($regiones as $r){
									echo '<option value="'.$r->getIdRegion().'">'.$r->getNombre().'</option>';
								}
							?>
						</select>
                    </div>   
                    <div class="col mb-2" >
                        <label for="ciudadinput">Ciudad</label>                        
						<select name="ciudad" id="ciudadinput" class="custom-select" required>
                            <script>
                                filtrarCiudad("1");
                            </script>
						</select>
                    </div> 
                    <div class="col mb-2" >
						<label for="barrioinput">Barrio</label>
						<select name="barrio" id="barrioinput" class="custom-select" required>
                            <script>
                                filtrarBarrio("1");
                            </script>
						</select>
                    </div> 
                    <div class="col mb-2" >
						<label for="regioninput">Direccion</label>
						<input name="direccion" type="text" class="form-control" id="validationCustom02" required>
					</div>              
                </div>	
                <div class="form-group custom-file">
                    <input type="file" name="galeria[]" required="true" accept="image/x-png,image/jpeg" class="custom-file-input" id="galeria" lang="es" multiple>
                    <label class="custom-file-label" for="galeria" data-browse="Elegir">Subir fotos</label>
                    <div class="invalid-feedback">Archivos invalidos, asegurate de subir archivos de imagen<br/><br/><br/></div>
                </div>
                
                <div class="form-group">
                    <br/>
                    <div class="form-check">
                        <input name="mascotas" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Aceptar mascotas
                        </label>
                    </div>
                </div>
                
                <button name="new" class="btn btn-primary" type="submit">Crear</button>
			</form>
		</div>
	</div>
</div>

<script type="application/javascript">
    $(document).on('change', '.custom-file-input', function (event) {
        $(this).next('.custom-file-label').html("Archivos cargados");
    })
</script>