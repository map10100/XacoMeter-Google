<?php
include 'navbar.php';
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
    <title><?php echo $lang['inicio de sesion'];?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css"> 
    <script src="js/bootstrap.min.js"></script>
    
    <style>

body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('fondo3.jpg');
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        
        } 
      form {
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
      }

@media screen and (max-width:991px) {
  img {
        width: 25%; 
       margin-left:38%
      }
      #cuadrado{
        border: black 2px solid;
        width: 25%;
        height: 50%;
        border-radius: 2%;
        background-color: rgba(255, 255, 255, 0.7);
        margin: 0 auto;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        
      }
      .textA{
        margin-top: 0%
      }
      .boton-peque{
        background-color: gray;
        border: none;
        border-radius: 10px;
        color: white;
        padding: 10px;
        width: 100%;
        text-align: center;
        display: inline-block;
        font-size: 16px;
        margin-top: 8px;
      }

}


@media screen and (min-width:991.20px) {

  

      img {
        width: 25%; 
        display: block; 
        margin: auto;
      }
      .textA{
        margin-top: -8%
      }
      #cuadrado{
        border: black 2px solid;
        width: 25%;
        height: 55%;
        border-radius: 2%;
        background-color: rgba(255, 255, 255, 0.7);
        margin: 0 auto;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        
      }
      
    
    }
     
    </style>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
    <div id="navbarContainer"></div>
    <?php
    if (isset($_SESSION['error'])) {
      echo "<div class='alert alert-danger' role='alert'> <strong>¡Atención!</strong> " . $_SESSION['error'] . "</div>";
      unset($_SESSION['error']); 
    }
    ?>
    <div id="cuadrado">
    <form method="post" action="login_usuarios.php" >
      <img src="login.png"><br>
      <input type="text" class="entradaTexto textA" name="usuario" id="usuario" placeholder="<?php echo $lang ['usuario']; ?>"><br>
      <input type="password" class= "entradaTexto" name="contrasena" id="contrasena" placeholder="<?php echo $lang ['contraseña']; ?>"><br>
      <input type="submit" class="boton boton-peque" value=<?php echo $lang ['iniciar sesion']; ?>><br>
      <p style="margin-top: 7%;"> <?php echo $lang['no tienes cuenta']; ?> <a href="registro.php"><?php echo $lang['registrate']; ?></a></p>
    </form>
  </div>
  </body>
</html>