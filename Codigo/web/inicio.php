<?php


// Verificar si hay un idioma seleccionado en la variable de sesión
if (isset($_SESSION['idioma'])) {
  $idioma = $_SESSION['idioma'];
} else {
  // Si no hay un idioma seleccionado, establecer un idioma predeterminado
  $idioma = 'es';
}

// Incluir el archivo de idioma correspondiente
$url_idioma = 'langs/' . $idioma . '.php';

if (file_exists($url_idioma)) {
  include $url_idioma;
} else {
  echo 'Idioma no encontrado';
}
  ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $lang['inicio']; ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    
    
    <style>
      @media screen and (max-width:991px) {

        h1{
            position: absolute;
            top: 28%;
            left: 35%;
            font-size: 80px;
        }
        p{
            position: absolute;
            top: 45%;
            left: 33%;
            width: 40%;
            font-size: 20px;
            text-align: center;
        }
        #login{
            position: absolute;
            height: 50px;
            width: 150px;
            top: 69%;
            left: 36%;
            border-radius: 6px;
            background-color: #CCCCCC;
            
        }
        #registro{
            position: absolute;
            height: 50px;
            width: 150px;
            top: 69%;
            left: 55%;
            border-radius: 6px;
            background-color: #CCCCCC;
        }
      
      body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('fondo3.jpg');
          
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      } 
      }
      @media screen and (min-width:992px) {

        h1{
            position: absolute;
            top: 28%;
            left: 35%;
            font-size: 80px;
        }
        p{
            position: absolute;
            top: 45%;
            left: 33%;
            width: 40%;
            font-size: 20px;
            text-align: center;
        }
        #login{
            position: absolute;
            height: 50px;
            width: 130px;
            top: 70%;
            left: 36%;
            border-radius: 6px;
            background-color: #CCCCCC;
            
        }
        #registro{
            position: absolute;
            height: 50px;
            width: 125px;
            top: 70%;
            left: 55%;
            border-radius: 6px;
            background-color: #CCCCCC;
        }

        body {
          background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('fondo3.jpg');
          
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        } 
        }
      @media screen and (min-width: 1500px) {
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
            top: 53%;
            left: 36%;
            border-radius: 6px;
            background-color: #CCCCCC;
            
        }
        #registro{
            position: absolute;
            height: 50px;
            width: 200px;
            top: 53%;
            left: 53%;
            border-radius: 6px;
            background-color: #CCCCCC;
        }
      
        body {
          background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('fondo3.jpg');
          background-size: cover;
          background-attachment: fixed;
          
        }
      }
        
      
    </style>
    </head>
    <body>
        <div id="navbarContainer"></div>
        <?php
    
    include 'navbar.php';
    
    ?>
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
