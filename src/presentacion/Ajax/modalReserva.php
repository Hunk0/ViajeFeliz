<form action=<?php echo "index.php?pid=".base64_encode("presentacion/reservar.php")."&id=".$_GET["id"]?> method="post">
    <div class="modal-body">
        <div class="form-group row">
            <label for="fechaInput1" class="col-5 col-form-label">Reservar desde: </label>
            <div class="col-7">
                <input name="inicio" type="date" class="form-control" id="fechaInput1" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="fechaInput2" class="col-5 col-form-label">Hasta: </label>
            <div class="col-7">
                <input name="fin" type="date" class="form-control" id="fechaInput2" required>
            </div>
        </div>    
    </div>
    <div class="modal-footer">
        <button name="new" type="submit" class="btn btn-primary text-center">Verificar disponibilidad</button>
    </div>
</form>
