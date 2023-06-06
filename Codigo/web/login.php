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
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="estilos.css" /> 
    <style>
      img {
        width: 25%; 
        display: block; 
        margin: auto;
      }
      #cuadrado{
        border: #6a7075 2px solid;
        width: 400px;
        height: 400px;
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 0.7);
        margin: 0 auto;
        position: absolute;
        top: 50%;
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
    <form>
      <img src="login.png"><br>
      <input type="text" class="entradaTexto" id="usuario" value="Usuario" onfocus="if(this.value=='Usuario') this.value='';" onblur="if(this.value=='') this.value='Usuario';"><br>
      <input type="text" class= "entradaTexto" id="contraseña"value="Contraseña" onfocus="if(this.value=='Contraseña') this.value='';" onblur="if(this.value=='') this.value='Contraseña';"><br>
      <input type="submit" class="boton" value="Iniciar Sesión"><br>
      <p>¿No tienes una cuenta? <a href="registro.php">Regístrate</a></p>
    </form>
  </div>
  </body>
</html>