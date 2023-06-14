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
    <title>web</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css"> 
    <script src="js/bootstrap.min.js"></script>
    
    <style>
      img {
        width: 25%; 
        display: block; 
        margin: auto;
      }
      #cuadrado{
        border: black 2px solid;
        width: 25%;
        height: 50%;
        border-radius: 2%;
        background-color: transparent;
        margin: 0 auto;
        position: absolute;
        top: 43%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      
      body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('fondo3.jpg');
        background-size: cover;
      }
      form {
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
      }
    </style>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
    <div id="navbarContainer"></div>
    <script>
      fetch('navbar.php')
      .then(response => response.text())
      .then(data => {
        document.getElementById('navbarContainer').innerHTML = data;
      });
    </script>
    <div id="cuadrado">
    <form method="post" action="login_usuarios.php" >
      <img src="login.jpg"><br>
      <input type="text" class="entradaTexto" name="usuario" id="usuario" value="Usuario" onfocus="if(this.value=='Usuario') this.value='';" onblur="if(this.value=='') this.value='Usuario';"><br>
      <input type="password" class= "entradaTexto" name="contrasena" id="contrasena" value="Contraseña" onfocus="if(this.value=='Contraseña') this.value='';" onblur="if(this.value=='') this.value='Contraseña';"><br>
      <input type="submit" class="boton" value="Iniciar Sesión"><br>
      <p> <?php $lang['no tienes cuenta']?> <a href="registro.php"><?php $lang['registrate']?></a></p>
    </form>
  </div>
  </body>
</html>