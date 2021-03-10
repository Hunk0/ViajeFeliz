<?php 
    if(!isset($_POST["inicio"])&&!isset($_POST["fin"])){
        header("index.php");
    }

    if(isset($_POST["newReserva"])){
        $usuario = $_SESSION["id"];
        $alojamiento = $_GET["id"];
        $finicio = $_POST["inicio"];
        $ffin = $_POST["fin"];
        $personas = $_POST["personas"];
        $mascotas = $_POST["mascotas"];
        $reserva = new Reserva("", $usuario, $alojamiento, $finicio, $ffin, $personas, $mascotas, "");
        $reserva -> insert();
        $newid = $reserva -> ultimoId();
        header("Location: index.php?pid=".base64_encode("presentacion/pago.php")."&rid=".$newid);
    }else{    
        $alojamiento = new Alojamiento($_GET["id"]);
        $alojamiento -> select();
?>
<div class="container">
    <form action=<?php echo "index.php?pid=".base64_encode("presentacion/reservar.php")."&id=".$_GET["id"]?> method="post">
        <div class="card mx-auto">
            <div class="card-body">
                <h5 class="card-title">Datos de reserva</h5>
                <div class="form-group row">
                    <div class="col">
                        <label for="fechaInput1" >Reservar desde: </label>
                        <input name="inicio" type="date" class="form-control" id="fechaInput1" value="<?php echo $_POST["inicio"] ?>" readonly>
                    </div>
                    <div class="col">
                        <label for="fechaInput2" >Hasta: </label>
                        <input name="fin" type="date" class="form-control" id="fechaInput2" value="<?php echo $_POST["fin"] ?>" readonly>
                    </div>   
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="personasInput">Numero de acompañantes: </label>
                        <input name="personas" min="1" max="<?php echo $alojamiento -> getCapacidadPersonas()?>" type="number" class="form-control" id="personasInput" required>
                    </div>
                    <div class="col">
                        <label for="mascotasInput">Numero de mascotas: </label>
                        <input name="mascotas" type="number" class="form-control" id="mascotasInput" required>
                    </div>   
                </div>
                <button name="newReserva" type="submit" class="btn btn-primary">Ir a pagar</button>
            </div>
        </div>
    </form>
</div>
<?php } ?>


<script>
    $(function () {
       $( "#personasInput" ).change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));
          if ($(this).val() > max)
          {
              $(this).val(max);
          }
          else if ($(this).val() < min)
          {
              $(this).val(min);
          }       
        }); 
    });
</script>