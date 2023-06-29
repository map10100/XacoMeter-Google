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
<html>
<head>
  <title><?php echo $lang['registro']?></title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="estilos.css" > 
    <script src="js/bootstrap.min.js"></script>
  <style>
    img {
      width: 25%; 
      display: block; 
      margin: auto;
    }
    #cuadrado{
      border: #6a7075 2px solid;
      width: 400px;
      height: 550px;
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
      background-attachment: fixed;
        background-position: center;
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
  <?php
    if (isset($_SESSION['errorR'])) {
      echo "<div class='alert alert-danger' role='alert'> <strong>¡Atención!</strong> " . $_SESSION['errorR'] . "</div>";
      unset($_SESSION['errorR']); 
    }
    ?>
  <div id="cuadrado">

  <form action="registro_usuarios.php" method="post">
    <img src="login.png"><br>
    <input type="text" class= "entradaTexto" id="nombre" name="nombre" placeholder="<?php echo $lang ['nombre']; ?>"><br>
    <input type="text" class= "entradaTexto" id="apellido" name="apellido" placeholder="<?php echo $lang ['apellido']; ?>"><br>
    <input type="email" class= "entradaTexto" id="email" name="email" placeholder="<?php echo $lang ['correo']; ?>"><br>
    <input type="text" class= "entradaTexto" id="usuario" name="usuario" placeholder="<?php echo $lang ['usuario']; ?>"><br>
    <input type="password" class= "entradaTexto" id="contrasena" name="contrasena" placeholder="<?php echo $lang ['contraseña']; ?>"><br>
    <input type="submit" class="boton" value= <?php echo $lang['registro']; ?>>
  </form>
  </div>
</body>
</html>