<?php


$idioma = isset($_GET['lang']) ? $_GET['lang'] : 'es';

$url_idioma = 'langs/' . $idioma . '.php';

if(file_exists($url_idioma)){
  include $url_idioma;
  }else {
    echo 'Idioma no encontrado';
  }
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
      @media screen and (max-width:991px) {
        .idiomas{
          margin-left:29px;
          

        }
        
        
        .btn{
          margin-left: 10px;
          background-color:transparent;
          color:#fff;
        }
        .boton:hover{
        color:red;
      }
      }
      @media screen and (min-width:992px) {
        .idiomas{
          margin-left: 94%;
          margin-top: 1%: 
      }
      
      .boton{
        background-color: #CCCCCC;
      }
     }
     @media screen and (min-width:1040px) {
        .idiomas{
        margin-left: 106%;
      }
    }
    @media screen and (min-width:1327px) {
        .idiomas{
        margin-left: 171%;
      }
    }
     
    @media screen and (min-width:1850px) {
      .idiomas{
        margin-left: 1160px;
        margin-right: 90px;
        
      }
      .boton{
        background-color: #CCCCCC;
      }
      
    }

      
      </style>
    <title>navbar</title>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-body-tertiary bg-dark" style="height: 70px;">
        <div class="container-fluid">
          <a class="navbar-brand" href="inicio.php" style="color: white; font-size: 25px;margin-left: 20px;">XACOMETER</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 " style="background-color:#212529">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" style="color: white; font-size: 20px; margin-left: 30px">
                  <?php
                  session_start();
                  if (isset($_SESSION['username'])) {
                    echo $lang['hola '] . ' ' . $_SESSION['username'];
                  } else {
                    echo $lang['hola '] .  $lang['usuari@']; 
                  }
                  ?>
                </a>
              </li>
              <li class="idiomas nav-item dropdown ml-auto" >
                <a class="nav-link dropdown-toggle" href="#" role="button" style="color: white; font-size: 20px;" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $lang['idiomas'] ; ?></a>
                <ul class="dropdown-menu" style="background-color:#212529">
                  <li><a class="dropdown-item" style="color: #fff" href="?lang=es"><?php echo $lang['castellano']; ?></a></li>
                  <li><a class="dropdown-item" style="color: #fff" href="?lang=en"><?php echo $lang['ingles']; ?></a></li>
                </ul>
              </li>
              <!-- if(Sesion iniciada==true){
                Button visible
              }else{
                button invisible
              } -->

              <!-- el boton debe ir a la derecha -->
            <li action="inicio.php">
            <button value="Cerrar Sesion" class="boton btn my-2 my-sm-0" type="submit" style="width: 170px;  font-size: 20px;"
              <?php
              if (isset($_SESSION['username'])) {
                echo 'onclick="window.location.href=\'logout.php\'"';
              } else {
                echo 'onclick="';
                session_destroy();
                echo 'window.location.href=\'login.php\'"';
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