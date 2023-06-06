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
            left: 39%;
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
            height: 50px;
            width: 200px;
            top: 49%;
            left: 36%;
            border-radius: 6px;
            background-color: transparent;
            
        }
        #registro{
            position: absolute;
            height: 50px;
            width: 200px;
            top: 49%;
            left: 53%;
            border-radius: 6px;
            background-color: transparent;
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
    
    <button type="button" id="login" onclick = "login()" style="font-size: 20px;"><?php echo $lang['iniciar sesion']; ?></button>
    <button type="button" id="registro" onclick = "registro()" style="font-size: 20px;"><?php echo $lang['registro']; ?></button>

    
    <script>
        function login() {
            window.location.href = "login.php";            
        }
        function registro() {
            window.location.href = "registro.php";
            
        }
    </script>
</body>
</html>
