<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<a class="navbar-brand" href='<?php echo "index.php"?>'>ViajeFeliz.SA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href='<?php echo "index.php?pid=" . base64_encode("presentacion/Arrendador/publicar.php")?>'>Publicar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href='<?php echo "index.php?pid=".base64_encode("presentacion/publicaciones.php")?>'>Ver Ofertas</a>
      </li>
    </ul>
    <div class="navbar-nav my-2 my-lg-0">
      <li class="nav-item">
        <?php 
          $arrendador = new Arrendador($_SESSION["id"]);
          $arrendador -> select();
        ?>
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo $arrendador -> getCorreo()?></a>
      </li>
      <li class="nav-item">
        <a class="nav-item nav-link" href='<?php echo "index.php?logOut"?>'>Cerrar Sesion</a>
      </li>
</div>
  </div>
</nav>