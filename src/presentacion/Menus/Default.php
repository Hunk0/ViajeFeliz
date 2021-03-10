<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href='<?php echo "index.php"?>'>ViajeFeliz.SA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href='<?php echo "index.php?pid=".base64_encode("presentacion/publicaciones.php")?>'>Ver Ofertas</a>
      </li>
    </ul>
    <div class="navbar-nav my-2 my-lg-0">
        <li class="nav-item">
        <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Iniciar Sesion</a>
      </li>
      <li class="nav-item">
        <a class="nav-item nav-link" href='<?php echo "index.php?pid=" . base64_encode("presentacion/registro.php")?>'>Registrarse</a>
      </li>
</div>
  </div>
</nav>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>">
        <div class="modal-body">
                <div class="form-group">
                  <input type="email" name="correo" class="form-control" placeholder="Correo*" required="required">
                </div>
                <div class="form-group">
                  <input type="password" name="clave" class="form-control" placeholder="Clave*" required="required">
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button name="autenticar" type="submit" class="btn btn-primary">Autenticar</button>
        </div>
      </form>
    </div>
  </div>
 </div>
</div>