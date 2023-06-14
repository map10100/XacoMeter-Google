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
    <style>
      
      </style>
    <title>navbar</title>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" style="height: 70px;">
        <div class="container-fluid">
          <a class="navbar-brand" href="inicio.php" style="color: white; font-size: 25px;margin-left: 20px;">XACOMETER</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" style="color: white; font-size: 20px; margin-left: 30px">
                  <?php
                  session_start();
                  if (isset($_SESSION['username'])) {
                    echo $lang['hola '] . ' ' . $_SESSION['username'];
                  } else {
                    echo $lang['hola '] . $lang['usuari@']; 
                  }
                  ?>
                </a>
              </li>
              <li class="nav-item dropdown"style="margin-left: 1160px">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"style="color: white; font-size: 20px;"><?php echo $lang['idiomas'] ; ?></a>
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

              <!-- el boton debe ir a la derecha -->
            <li action="inicio.php">
            <button value="Cerrar Sesion" class="btn my-2 my-sm-0" type="submit" style="width: 170px; background-color: #CCCCCC; margin-left: 50px; font-size: 20px;"
              <?php
              if (isset($_SESSION['username'])) {
                echo 'onclick="window.location.href=\'logout.php\'"';
              } else {
                echo 'onclick="';
                session_destroy();
                echo 'window.location.reload();"';
              }
              ?>>
                <?php
                if (isset($_SESSION['username'])) {
                  echo $lang['cerrar sesion'];
                } else {
                  echo $lang['inicio de sesion'];
                }
                ?>
              </button>
            </li>
            </ul>
          </div>
        </div>
      </nav>
  </body>
</html>