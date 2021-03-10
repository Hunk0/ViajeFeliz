<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card bg-light mb-3 w-100">
                <div class="card-body">
                    <h5 class="card-title">Encuentra el sitio ideal!</h5>
                    <p class="card-text">Usa los filtros para encontrar justo lo que buscas</p>
                    <form>
                        <div class="form-group row">
                            <label for="tipoInput" class="col-5 col-form-label">Tipo</label>
                            <div class="col-7">
                                <select id="inputState" class="form-control">
                                    <option selected>Cualquiera</option>
                                    <?php
                                        $tipo = new Tipo();
                                        $tipos = $tipo -> selectAll();
                                        foreach($tipos as $t){
                                            echo "<option value='".$t->getIdTipo()."'>".$t->getNombre()."</option>";
                                        }
                                    ?>                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fechaInput1" class="col-5 col-form-label">Fecha inicial</label>
                            <div class="col-7">
                                <input name="inicio" type="date" class="form-control" id="fechaInput1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fechaInput2" class="col-5 col-form-label">Fecha final</label>
                            <div class="col-7">
                                <input name="fin" type="date" class="form-control" id="fechaInput2">
                            </div>
                        </div>
                        <br/><br/>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-8">
            <div class="row row-cols-1 row-cols-md-2">
                <?php
                    $publicacion = new Alojamiento();
                    $publicaciones = $publicacion -> selectAll();
                    foreach ($publicaciones as $p){
                        $barrio = new Barrio($p -> getBarrioId());
                        $barrio -> select();
                        $ciudad = new Ciudad($barrio -> getCiudadId());
                        $ciudad -> select();
                ?>
                    <div class="col mb-4">
                        <div class="card">
                            <a href='<?php echo "index.php?pid=".base64_encode("presentacion/detalles.php")."&id=".$p->getIdAlojamiento()?>' style="color: inherit; text-decoration: none;">
                                <img src="https://image.freepik.com/free-vector/flat-hotel-booking-background_23-2148144883.jpg" class="card-img-top" height="180px" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">Alojamiento en: <?php echo $ciudad -> getNombre().", ".$barrio -> getNombre()?> </h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        
    </div>
</div>