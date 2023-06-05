<?php

$idioma = isset($_GET['lang']) ? $_GET['lang'] : 'es';

$url_idioma = 'langs/' . $idioma . '.php';

if(file_exists($url_idioma)){
  include $url_idioma;
  }
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>navbar</title>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="inicio.php">XACOMETER</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><?php echo $lang['hola ']; ?> usuari@</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $lang['idiomas']; ?></a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="?lang=es"><?php echo $lang['castellano']; ?></a></li>
                  <li><a class="dropdown-item" href="?lang=en"><?php echo $lang['ingles']; ?></a></li>
                 
                </ul>
              </li>
              <!-- if(Sesion iniciada==true){
                Button visible
              }else{
                button invisible
              } -->
              <button value="Cerrar Sesion" class="btn btn-outline-danger my-2 my-sm-0" type="submit"><?php echo $lang['cerrar sesion']; ?></button>
            </ul>
          </div>
        </div>
      </nav>
  </body>
</html>