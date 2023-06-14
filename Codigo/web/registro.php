
<?php

$idioma = isset($_GET['lang']) ? $_GET['lang'] : 'es';

$url_idioma = 'langs/' . $idioma . '.php';

if(file_exists($url_idioma)){
  include $url_idioma;
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
  <div id="cuadrado">

  <form action="registro_usuarios.php" method="post">
    <img src="login.jpg"><br>
    <input type="text" class= "entradaTexto" id="nombre" name="nombre" required value=<?php echo $lang ['nombre']; ?> onfocus="if(this.value=='nombre') this.value='';" onblur="if(this.value=='') this.value='nombre';"><br>
    <input type="text" class= "entradaTexto" id="apellido" name="apellido" required value=<?php echo $lang ['apellido']; ?> onfocus="if(this.value=='apellido') this.value='';" onblur="if(this.value=='') this.value='apellido';"><br>
    <input type="email" class= "entradaTexto" id="email" name="email" required value=<?php echo $lang ['correo']; ?> onfocus="if(this.value=='email') this.value='';" onblur="if(this.value=='') this.value='email';"><br>
    <input type="text" class= "entradaTexto" id="usuario" name="usuario" required value=<?php echo $lang ['usuario']; ?> onfocus="if(this.value=='usuario') this.value='';" onblur="if(this.value=='') this.value='usuario';"><br>
    <input type="password" class= "entradaTexto" id="Contraseña"value="Contraseña" onfocus="if(this.value=='Contraseña') this.value='';" onblur="if(this.value=='') this.value='Contraseña';"><br>
    <input type="submit" class="boton" value= <?php echo $lang['registro']; ?>>
  </form>
  </div>
</body>
</html>