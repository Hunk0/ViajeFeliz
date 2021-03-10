<?php
if(isset($_SESSION['rol']) && $_SESSION['rol']!=""){
    header('Location: index.php');
}

$error=0;
if(isset($_POST["clave"])){
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];

    $arrendador = new Arrendador("", "", "", $correo, $clave);
    $usuario = new Usuario("", "", "", "", "", $correo, $clave);

    if($arrendador -> auth()){        
        $_SESSION['id'] = $arrendador -> getIdArrendador();
        $_SESSION['rol'] = "arr";
        $pid= base64_encode("presentacion/Arrendador/inicio.php");
        header('Location: index.php?pid=' . $pid);
    }else if( $usuario -> auth()){    
        $_SESSION['id'] = $usuario -> getIdUsuario();
        $_SESSION['rol'] = "user";
        $pid= base64_encode("presentacion/publicaciones.php");
        header('Location: index.php?pid=' . $pid);
    }else{      
        $error=1;
    }
}
?>
<br/><br/><br/><br/>
<div class="container">
    <div class="row mx-md-n5">
        <div class="col-3 container">
            <img class="foto" src=""  style="width: 300px "/>
        </div>
        <div class="col-5 container">
            <?php
                if($error==1){
                    echo '<div class="alert alert-danger" role="alert">
                            Correo o contraseña invalidos, intenta de nuevo!
                        </div>';
                }
                if(isset($_GET["NewUser"])){
                    echo '<div class="alert alert-success" role="alert">
                            Registro exitoso! inicia sesion para continuar
                        </div>';
                }
            ?>
            <br/>
            <h1>Iniciar Sesion</h1>
            
            <form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>">
                <div class="modal-body mx-auto">
                        <div class="form-group">
                        <input type="email" name="correo" class="form-control" placeholder="Correo*" required="required">
                        </div>
                        <div class="form-group">
                        <input type="password" name="clave" class="form-control" placeholder="Clave*" required="required">
                        </div>

                        <button name="autenticar" type="submit" class="btn btn-primary  btn-block" >Ingresar</button>
                        
                </div>        
            </form>

            <div class="container" style="text-align: center;">
            <a href="#">Olvidaste tu contraseña?</a>
            <br/>
            <br/>
            <h>No tienes una cuenta? </h><a href=<?php echo "index.php?pid=" . base64_encode("presentacion/registro.php")?> >Registrate</a>
            </div>
        </div>
    </div>
</div>