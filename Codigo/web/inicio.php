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
    <title><?php echo $lang['inicio']; ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    
    <link href="langs/en.php">
    <link href="langs/es.php">
    <style>
        h1{
            position: absolute;
            top: 20%;
            left: 40%;
            font-size: 80px;
        }
        p{
            position: absolute;
            top: 35%;
            left: 30%;
            width: 40%;
            font-size: 20px;
            text-align: center;
        }
        #login{
            position: absolute;
            top: 50%;
            left: 40%;
            background-color: blueviolet;
            
        }
        #registro{
            position: absolute;
            top: 50%;
            left: 55%;
            background-color: aqua;
        }
      img {
        width: 25%; 
        display: block; 
        margin: auto;
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
    <h1>Xacometer</h1>
    <p><?php echo $lang['texto']; ?></p>
    
    <button type="button" id="login" onclick = "login()"><?php echo $lang['iniciar sesion']; ?></button>
    <button type="button" id="registro" onclick = "registro()"><?php echo $lang['registro']; ?></button>

    
    <script>
        function login() {
            window.location.href = "login.php";            
        }
        function registro() {
            window.location.href = "registro.html";
            
        }
    </script>
</body>
</html>
