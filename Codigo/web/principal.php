<?php

$idioma = isset($_GET['lang']) ? $_GET['lang'] : 'es';

$url_idioma = 'langs/' . $idioma . '.php';

if(file_exists($url_idioma)){
  include $url_idioma;
  }
  ?>

<?php
$mysqli=new mysqli ('localhost', 'root','', 'xacometer');

?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <title><?php echo $lang['principal']; ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

    <style>
      img {
        width: 25%; 
        display: block; 
        margin: auto;
      }
      .top {
        width: 100%;
        height: 100px;
        padding-top: 40px;
        opacity: 1;
        transition: all .5s ease;
      }
      li {
        padding-left: 10px;
        font-size: 12px;
        display: inline;
        text-align: left;
        text-transform: uppercase;
        padding-right: 10px;
        
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
      .xMonumento-activo a {
        cursor: pointer;
        color: rgba(0,0,0);
        text-decoration: none;
        border-bottom: solid 2px #1059FF;
        padding-bottom: 2px;
      }

      .xMonumento-inactivo a {
        cursor: pointer;
        color: rgba(157,157,157);
        text-decoration: none;
        transition: all .25s ease;
      }
      .todo-activo a {
        cursor: pointer;
        color: rgba(0,0,0);
        text-decoration: none;
        border-bottom: solid 2px #1059FF;
        padding-bottom: 2px;
      }

      .todo-inactivo a {
        cursor: pointer;
        color: rgba(157,157,157);
        text-decoration: none;
        transition: all .25s ease;
      }
      form {
        width: 430px;
  
	      font-size: 16px;
	      font-weight: 300;
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
      }
      .form-xMonumento {
  
        padding-left: 37px;
        padding-right: 37px;
        padding-top: 55px;
        transition: opacity .5s ease, transform .5s ease;
      }

      .form-todo {
        
        padding-left: 37px;
        padding-right: 37px;
        padding-top: 55px;
        position: relative;
        top: 0px;
        left: 400px;
        opacity: 0;
        transition: all .5s ease;
      }
      .form-xMonumento-left {
        transform: translateX(-400px);
        opacity: .0;
      }

      .form-todo-left {
        transform: translateX(-399px);
        opacity: 1;
      }
    </style>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
  <div id="navbarContainer"></div>
  <?php
    
    include 'navbar.php';
    
    ?>
    <div id="cuadrado">
    <div class="top">
        <ul class="cambio">
          <li class="xMonumento-activo"><a class="btnli">
            <?php echo $lang['busXMonu']; ?>
          </a></li>
          <li class="todo-inactivo"><a class="btnli">
            <?php echo $lang['busTodo']; ?>
          </a></li>
        </ul>
      </div>
    <form method="GET" action="informacion.php" class="form-xMonumento">
        <!-- Desplegable MOnumentos -->
        <select id="desplegable_Nombre" name="desplegable">
          <option disabled selected style="display:none;">
          <?php echo $lang['select']; ?>
        </option>

          <?php
          $query = $mysqli->query("SELECT * FROM monumentos");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="' . $valores['BICs'] . '">' . $valores['BICs'] . '</option>';
          }
          ?>
        </select>
          <!-- https://mundocursos.online/como-mostrar-datos-mysql-en-lista-desplegable-select-en-php/ -->
          
          <!-- Desplegable fecha Inicio -->
        <select id="desplegable_FechaI" name="desplegableFI">
          <option disabled selected style="display:none;">
          <?php echo $lang['fechaInicial']; ?>
        </option>

          <?php
          $query2 = $mysqli->query("SELECT * FROM tendencias");
          while ($valores2 = mysqli_fetch_array($query2)) {
            echo '<option value="' . $valores2['fecha'] . '">' . $valores2['fecha'] . '</option>';
          }
          ?>


        </select>
<!-- Desplegable fecha fin -->
        <select id="desplegable_FechaF" name="desplegableFF">
          <option disabled selected style="display:none;">
          <?php echo $lang['fechaFinal']; ?>
        </option>

          <?php
          $query3 = $mysqli->query("SELECT * FROM tendencias WHERE fecha > '$valores2'");
          while ($valores3 = mysqli_fetch_array($query3)) {
            echo '<option value="' . $valores3['fecha'] . '">' . $valores3['fecha'] . '</option>';
          }
          ?>


        </select>
        
        <button type="submit"><?php echo $lang['buscar']; ?></button>
        
    </form>

    <form method="GET" action="informacion2.php" class="form-todo">

      <!-- Desplegable2 fecha Inicio -->
      <select id="desplegable2_FechaI" name="desplegableTFI">
          <option disabled selected style="display:none;">
            <?php $lang['fechaInicial']; ?>
        </option>

          <?php
          $queryT = $mysqli->query("SELECT * FROM tendencias");
          while ($valoresT = mysqli_fetch_array($queryT)) {
            echo '<option value="' . $valoresT['fecha'] . '">' . $valoresT['fecha'] . '</option>';
          }
          ?>


        </select>

        <button type="submit"><?php echo $lang['buscar']; ?></button>

    </form>
    </div>

      
    <script>
  (function() {
    var btnLiElements=document.querySelectorAll(".btnli");
    
    var formxMonu=document.querySelector(".form-xMonumento");
    var formtodo=document.querySelector(".form-todo");
    var todoInactivo=document.querySelector(".todo-inactivo");
    var xMonumento=document.querySelector(".xMonumento-activo");

    btnLiElements.forEach(function(btnLi){
      btnLi.addEventListener("click", function(){
      var clases=xMonumento.classList;
      var clases2=todoInactivo.classList;
  
      formxMonu.classList.toggle("form-xMonumento-left");
      formtodo.classList.toggle("form-todo-left");
      if (clases.contains("xMonumento-activo")
      && clases2.contains("todo-inactivo")) {
        clases.remove("xMonumento-activo");
        clases.add("xMonumento-inactivo");
        clases2.remove("todo-inactivo");
        clases2.add("todo-activo");
      } else {
        clases.remove("xMonumento-inactivo");
        clases.add("xMonumento-activo");
        clases2.remove("todo-activo");
        clases2.add("todo-inactivo");
      }
    });
    })
    
})();
</script>

  </body>
</html>
