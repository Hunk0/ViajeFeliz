<?php
$reserva = new Reserva($_GET["rid"]);
$reserva -> select();

if(isset($_POST["transferencia"])){
    $pago = new Pago("", $reserva -> getIdReserva(), "2", "", $_POST["pago"]);
    $pago -> insert();
}

?>
<form action=<?php echo "index.php?pid=".base64_encode("presentacion/pago.php")."&rid=".$_GET["rid"]?> method="post">
    <div class="card mx-auto">
        <div class="card-body">
            <h5 class="card-title">Datos de facturacion</h5>
            <div class="form-group row">    
                <div class="col-6">
                    <img src="img/card.png" style="width: 250px;"/>
                </div>                    
                <div class="col-auto">
                    <div class="form-group row">
                        <label for="pagoInput">Cantidad a pagar: </label>
                        <div class="col">
                            <input name="pago" min="1" max="<?php echo "300000"?>" type="number" class="form-control" id="pagoInput" required>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <button name="transferencia" type="submit" class="btn btn-primary">Pagar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(function () {
       $( "#pagoInput" ).change(function() {
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