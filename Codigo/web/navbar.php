<?php
 session_start();

 if (isset($_GET['lang'])) {
  $idioma = $_GET['lang'];

  setcookie('idioma', $idioma, time() + (86400 * 30), '/');

}else{
  $idioma = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'es';
}
  
  $_SESSION['idioma'] = $idioma;


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
    .saludo{
      width: 300px;
    }
      @media screen and (max-width:991px) {
        .idiomas{
          margin-left:29px;
        }
        
        .btnHam{
          border: none;
          background-color:transparent;
          color:#fff;
          margin-left:12px
        }
        .holaHam{
          padding-top:0;
        }
        .navHam{
        align-items: start;
        }
        
      }
      @media screen and (min-width:992px) {
        .idiomas{
          padding-left: 36%;
          margin-top: 1%: 
      }
      
        .botonNav{
          border-radius: 10px;
          padding: 8px;
          background-color: #CCCCCC;
          margin-top: 6%;
        }
        .hola{
          padding-top:14%
        }
        .navbar-nav{
          align-items:center;
        }
      }
      @media screen and (min-width:1040px) {
        .idiomas{
          padding-left: 45%;
          padding-top:1%;
        }
        .botonNav{
          border-radius: 10px;
          padding: 8px;
          background-color: #CCCCCC;
          margin-top: 6%;
        }
        .hola{
          padding-top:14%
        }
        .navbar-nav{
          align-items:center;
        }
      }
      @media screen and (min-width:1150px) {
        .idiomas{
          padding-left: 63%;
          padding-top:1%;
        }
        .botonNav{
          border-radius: 10px;
          padding: 8px;
          background-color: #CCCCCC;
          margin-top: 6%;
        }
        .hola{
          padding-top:14%
        }
        .navbar-nav{
          align-items:center;
        }
      }
      @media screen and (min-width:1230px) {
        .idiomas{
          padding-left: 77%;
          padding-top:1%;
        }
        .botonNav{
          border-radius: 10px;
          padding: 8px;
          background-color: #CCCCCC;
          margin-top: 6%;
        }
        .hola{
          padding-top:14%
        }
        .navbar-nav{
          align-items:center;
        }
      }
      @media screen and (min-width:1350px) {
        .idiomas{
          padding-left: 98%;
          padding-top:1%;
        }
        .botonNav{
          border-radius: 10px;
          padding: 8px;
          background-color: #CCCCCC;
          margin-top: 6%;
        }
        .hola{
          padding-top:14%
        }
        .navbar-nav{
          align-items:center;
        }
      }
      @media screen and (min-width:1481px) {
        .idiomas{
          padding-left: 121%;
          padding-top:1%;
        }
        .botonNav{
          border-radius: 10px;
          padding: 8px;
          margin-top: 6%;
          background-color: #CCCCCC;
        }
        .hola{
          padding-top:14%
        }
        .navbar-nav{
          align-items:center;
        }
     
      }
      @media screen and (min-width:1536px) {
        .idiomas{
          padding-left: 130%;
          padding-top:1%;
        }
        .botonNav{
          border-radius: 10px;
          padding: 8px;
          margin-top: 6%;
          background-color: #CCCCCC;
        }
        .hola{
          padding-top:14%
        }
        .navbar-nav{
          align-items:center;
        }
     
      }
      @media screen and (min-width:1706px) {
        .idiomas{
          padding-left: 250%;
          padding-top:1%;
        }
        .botonNav{
          border-radius: 10px;
          padding: 8px;
          margin-top: 6%;
          background-color: #CCCCCC;
        }
        .hola{
          padding-top:14%
        }
        .navbar-nav{
          align-items:center;
        }
     
      }
      
      @media screen and (min-width:1850px) {
        .idiomas{
          padding-left: 223%;
          margin-right: 90px;
          padding-top:1%;
          
        }
        .botonNav{
          border-radius: 10px;
          padding: 8px;
          background-color: #CCCCCC;
          margin-top: 6%;
        }
        .hola{
          padding-top:14%
        }
        .navbar-nav{
          align-items:center;
        }
        
      }
      </style>

    
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-body-tertiary bg-dark" style="height: 70px;">
        <div class="container-fluid">
          <a class="navbar-brand" style="color: white; font-size: 25px;margin-left: 20px; cursor: context-menu" 
          <?php
                if (isset($_SESSION['username'])) {
                  echo 'onclick="window.location.href=\'principal.php\'"';
                } else {
                  echo 'onclick="';
                  session_destroy();
                  echo 'window.location.href=\'inicio.php\'"';
                }
                ?>
                >XACOMETER</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 navHam" style="background-color:#212529; ">
              <li class="nav-item">
                <div class="saludo">
                <a class="nav-link active" aria-current="page" style="color: white; font-size: 20px; margin-left: 30px; width:200%; padding-top:8%; cursor: context-menu">
                  <?php
                 
                  if (isset($_SESSION['username'])) {
                    echo $lang['hola '] . ' ' . $_SESSION['username'];
                  } else {
                    echo $lang['hola '] .  $lang['usuari@']; 
                  }
                  ?>
                </a>
                </div>
              </li>
              <li class="idiomas nav-item dropdown ml-auto" >
                <a class="nav-link dropdown-toggle" href="#" role="button" style="color: white; font-size: 20px;" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $lang['idiomas'] ; ?></a>
                <ul class="dropdown-menu" style="background-color:#212529">
                  <li><a class="dropdown-item" style="color: #fff" href="?lang=es"><?php echo $lang['castellano']; ?></a></li>
                  <li><a class="dropdown-item" style="color: #fff" href="?lang=en"><?php echo $lang['ingles']; ?></a></li>
                </ul>
              </li>

              <!-- el boton debe ir a la derecha -->
              <li action="inicio.php">
              <button value="Cerrar Sesion" class="botonNav btnHam " type="submit" style="width: 170px;  font-size: 20px;"
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