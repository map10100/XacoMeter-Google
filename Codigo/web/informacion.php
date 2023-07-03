<?php


if (isset($_POST["descargar_csv"]))  {

  $conexion = mysqli_connect("localhost", "root", "", "xacometer");
        
  $sql = "SELECT tendencias.fecha, tendencias.porcentaje, monumentos.BICs FROM tendencias JOIN monumentos ON tendencias.id = monumentos.id";
  $result = $conexion->query($sql);
  
   $filename = "datos.csv";
   $file = fopen($filename, 'w');
   if (!$file) {
    die('No se pudo abrir el archivo.');
  }
  

  $encabezados = array ('BICs', 'Fecha', 'Porcentaje');
  fputcsv($file, $encabezados);
  
  
  if ($result->num_rows>0){
    while ($row = $result->fetch_assoc()){
    
      $datos = array($row['BICs'], $row['fecha'], $row['porcentaje']);
      fputcsv($file, $datos);
    }
  
  }
  
  fclose($file);
     
      header("Content-Disposition: attachment; filename=$filename");
      header("Content-Type: application/pdf");
      header("Content-Length: " . filesize($filename));
      readfile($filename);
  
      unlink($filename);
      $conexion->close();
  }


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
    <title><?php echo $lang['informacion']; ?></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
  
    
    <form method="POST">
    

        <!--Recibe los datos -->
      <?php
      
      // Hay que cambiarloooo

      $datosM =isset($_GET['desplegable'])? $_GET['desplegable']: null;
      $datosF = isset($_GET['desplegableFI']) ? $_GET['desplegableFI']: null;
      $datosFF =isset($_GET['desplegableFF'])? $_GET['desplegableFF'] :null;
    

      if ($datosF>$datosFF) {
        echo "<div class='alert alert-danger' role='alert'> <strong>¡Atención! La fecha de fin debe ser posterior a la fecha de inicio.</div>";

      }else{
            

      
      echo $lang['monu'] . $datosM . " " . $lang['fechaInicialT'] . $datosF . " " . $lang['fechaFinalT'] .  $datosFF;
      
      ?>

        <!-- Grafico v -->
        <canvas id="Grafico"></canvas>
        <script>


  <?php
     $conexion = mysqli_connect("localhost", "root", "", "xacometer");
     
     $consulta2 =  "SELECT  tendencias.fecha, tendencias.porcentaje FROM tendencias JOIN monumentos ON tendencias.id = monumentos.id WHERE monumentos.BICs = '$datosM' AND tendencias.fecha >= '$datosF' AND fecha <='$datosFF'";
     $resultado2 = mysqli_query ($conexion, $consulta2);

      

      $fechas2 = array();
      $porcentajes = array();
      while ($fila2 = mysqli_fetch_assoc($resultado2)){
        $fechas2[] = $fila2['fecha'];
        $porcentaje[] = $fila2['porcentaje'];

      }
      

      mysqli_close($conexion);
      ?>

    var fechasPosteriores = <?php echo json_encode($fechas2); ?>;
        fechasPosteriores.sort(function(a, b){
              return new Date(a) - new Date(b);
            });
    

    var ctx = document.getElementById("Grafico").getContext("2d");
    var graf=new Chart(ctx, {
      type: 'bar',
      data: {
        labels: fechasPosteriores,
        datasets: [{
          label: "<?php echo $lang['tendencias']; ?>",
          data: <?php echo json_encode ($porcentaje); ?>,
          backgroundColor: 'rgba(137,0,0)'
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero:true
          }
        }
      }
    })
  ;

</script>

<!-- Grafico ^ -->

<form>
<input style="background-color: #CCCCCC; border-radius:10px; height:33px; margin-top: 5%;" type="submit" name="descargar_csv" value="<?php echo $lang['descarga']; ?>">
  </form>
  <?php
}
?>
  </body>
</html>