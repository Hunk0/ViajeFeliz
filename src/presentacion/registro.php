<?php
	if(isset($_SESSION['rol']) && $_SESSION['rol']!=""){
		header('Location: index.php');
	}
	
	if(isset($_POST["new"])){
		$val = $_POST["customRadioInline1"];
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$correo = $_POST["correo"];
		$clave = $_POST["clave"];
		if($val==1){
			$usuario = new Usuario('', '', '', '', '', $correo, $clave);
			if($usuario -> auth()){
				echo "<h2>Ya existe una cuenta asociada a este correo</h2>";
			}else{
				$arrendador = new Arrendador('', $nombre, $apellido, $correo, $clave);
				$arrendador -> insert();
				//echo "<h2>Todo listo, ya puedes iniciar sesion</h2>";
				$pid= base64_encode("presentacion/autenticar.php");
				header('Location: index.php?pid=' . $pid . '&NewUser=1');
			}
		}else if($val==2){
			$arrendador = new Arrendador('', '', '', $correo, $clave);
			if($arrendador -> auth()){
				echo "<h2>Ya existe una cuenta asociada a este correo</h2>";
			}else{
				$nacionalidad = $_POST["nacionalidad"];
				$residencia = $_POST["residencia"];
				$usuario = new Usuario('', $nacionalidad, $nombre, $apellido, $residencia, $correo, $clave);
				$usuario -> insert();
				$pid= base64_encode("presentacion/autenticar.php");
				header('Location: index.php?pid=' . $pid . '&NewUser=1');
				//echo "<h2>Todo listo, ya puedes iniciar sesion</h2>";
			}
		}else{
			echo "<h2>Ocurrio un problema. Intenta de nuevo!</h2>";
		}
	}else{
?>

<div class="container p-4">
	<div class="card mx-auto" style="width: 25rem;">
		<div class="card-body">
			<h5 class="card-title text-center">Formulario de Registro</h5>
			<br />
			<form action=<?php echo "index.php?pid=".base64_encode("presentacion/registro.php")?> method="post">
				<div class="form-group text-center ">
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" value="1" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
					<label class="custom-control-label" for="customRadioInline1">Quiero Arrendar</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" value="2" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" checked>
					<label class="custom-control-label" for="customRadioInline2">Quiero Alojarme</label>
				</div>
				</div>
				<br />
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="nombreinput">Nombre</label>
							<input name="nombre" type="text" class="form-control" id="nombreinput" required>
						</div>
						<div class="col-md-6 mb-3">
							<label for="apellidoinput">Apellido</label>
							<input name="apellido" type="text" class="form-control" id="apellidoinput" required>
						</div>
					</div>
				</div>
				<div id="userDetails">
					<div class="form-group" >
						<label for="nacionalidadinput">Nacionalidad</label>
						<select name="nacionalidad" id="nacionalidadinput" class="custom-select">
							<?php
								$nacionalidad = new Nacionalidad();
								$nacionalidades = $nacionalidad -> selectAll();
								foreach($nacionalidades as $n){
									echo '<option value="'.$n->getIdNacionalidad().'">'.$n->getNombre().'</option>';
								}
							?>
						</select>
					</div>					
					<div class="form-group" >
						<label for="residenciainput">Residencia</label>
						<input name="residencia" type="text" class="form-control" id="residenciainput">
					</div>					
				</div>
				<div>
					<div class="form-group">
						<label for="correoinput">Correo</label>
						<input name="correo" type="email" class="form-control" id="correoinput" placeholder="correo@bda.com" required>
					</div>
					<div class="form-group">
						<label for="claveinput">Contraseña</label>
						<input name="clave" type="password" class="form-control" id="claveinput" required>
					</div>
				</div>
				<div class="text-center">
					<button name="new" class="btn btn-primary" type="submit">Registrarse</button>
				</div>				
			</form>
		</div>
	</div>
</div>

<script>
	if($('#customRadioInline2').prop('checked', true)){
		document.getElementById("userDetails").style.display = 'block';
		document.getElementById("nacionalidadinput").setAttribute("required", "");
		document.getElementById("residenciainput").setAttribute("required", "");
	}
	$('#customRadioInline2').click(function(){
		document.getElementById("userDetails").style.display = 'block';
		document.getElementById("nacionalidadinput").setAttribute("required", "");
		document.getElementById("residenciainput").setAttribute("required", "");
	});
	$('#customRadioInline1').click(function(){
		document.getElementById("userDetails").style.display = 'none';
		document.getElementById("nacionalidadinput").removeAttribute("required");
		document.getElementById("residenciainput").removeAttribute("required");
	});
</script>
<?php } ?>