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

<?php
$mysqli=new mysqli ("co28d739i4m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "k4ibhy838gyrdfcd", "qjlckj118obcht4d", "hz99pa5q46b8bho6");



?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <title><?php echo $lang['principal']; ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
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
      /* li{
        margin-left: 25%;
      } */
      .lis {
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
        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('fondo.jpg');
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
        border-bottom: solid 2px #000;
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
        border-bottom: solid 2px #000;
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
        padding-top: 45px;
      }

      .form-todo {
        display:none;
        padding-left: 37px;
        padding-right: 37px;
        padding-top: 55px;
        
        opacity: 0;
        
        
      }
      .form-xMonumento-left {
        
        opacity: .0;
        display: none;

      }

      .form-todo-left {
        display: block;
        opacity: 1;
        
      }
      
      select{
        padding-bottom: 1%;
        border-radius:10px;
        width: 309px;
        margin: 2%;
        margin-left: 7%;
        height: 41px;
      }
      .boton{
        height: 42px;
        width: 309px;
        border-radius: 6px;
        margin-left: 7%;
        margin-top: 5%;
        border: none;
        background-color: gray;
      }
    </style>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
  <div id="navbarContainer"></div>
  
    <div id="cuadrado">
    <div class="top">
        <ul class="cambio">
          <li class="xMonumento-activo lis"><a class="btnli">
            <?php echo $lang['busXMonu']; ?>
          </a></li>
          <li class="todo-inactivo lis"><a class="btnli">
            <?php echo $lang['busTodo']; ?>
          </a></li>
        </ul>
      </div>
    <form method="GET" action="informacion.php" class="form-xMonumento" >
        
        <select id="desplegable_Nombre" name="desplegable">
          <option disabled selected style="display:none;">
          <?php echo $lang['select']; ?>
        </option>

          <?php
          $query = $mysqli->query("SELECT * FROM bics");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="' . $valores['nombre'] . '">' . $valores['nombre'] . '</option>';
          }
          ?>
        </select>
          <select id="desplegable2_FechaI" name="desplegableTFI">
          <option disabled selected style="display:none;">
            <?php echo $lang['fechaInicial']; ?>
          </option>

          <?php
          $queryT = $mysqli->query("SELECT DISTINCT fecha FROM tendencias");
          while ($valoresT = mysqli_fetch_array($queryT)) {
            echo '<option value="' . $valoresT['fecha'] . '">' . $valoresT['fecha'] . '</option>';
          }
          ?>

        </select>
<!-- Desplegable fecha fin -->
        <select id="desplegable_FechaF" name="desplegableFF">
          <option disabled selected style="display:none;">
            <?php echo $lang['fechaFinal']; ?>
          </option>

          <?php
          $query3 = $mysqli->query("SELECT DISTINCT fecha FROM tendencias");
          while ($valores3 = mysqli_fetch_array($query3)) {
            echo '<option value="' . $valores3['fecha'] . '">' . $valores3['fecha'] . '</option>';
          }
          ?>

        </select>

        
        <button type="submit" class="boton"><?php echo $lang['buscar']; ?></button>
        
    </form>

    <form method="GET" action="informacion2.php" class="form-todo">

      <!-- Desplegable2 fecha Inicio -->
      <select id="desplegable2_FechaI" name="desplegableTFI">
      <option disabled selected style="display:none;">
        <?php echo $lang['fechaInicial']; ?>
      </option>

      <?php
      $queryT = $mysqli->query("SELECT DISTINCT fecha FROM tendencias");
      while ($valoresT = mysqli_fetch_array($queryT)) {
        echo '<option value="' . $valoresT['fecha'] . '">' . $valoresT['fecha'] . '</option>';
      }
      ?>

    </select>


        <button type="submit" class="boton boton-quitado"><?php echo $lang['buscar']; ?></button>

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
