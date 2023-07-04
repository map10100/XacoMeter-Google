<?php


if (isset($_POST["descargar_csv"]))  {
  

  $conexion = mysqli_connect("co28d739i4m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "k4ibhy838gyrdfcd", "qjlckj118obcht4d", "hz99pa5q46b8bho6");

      
$sql = "SELECT tendencias.fecha, tendencias.tendencia, bics.nombre FROM tendencias JOIN bics ON tendencias.id = bics.id";
$result = $conexion->query($sql);

 $filename = "datos.csv";
 $file = fopen($filename, 'w');
 if (!$file) {
  die('No se pudo abrir el archivo.');
}



$encabezados = array ('nombre', 'Fecha', 'Porcentaje');
fputcsv($file, $encabezados);



if ($result->num_rows>0){
  while ($row = $result->fetch_assoc()){
  
    $datos = array($row['nombre'], $row['fecha'], $row['tendencia']);
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
    <title><?php echo $lang['informacion'] ?></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    
    <style>
      img {
        width: 25%; 
        display: block; 
        margin: auto;
      }
      
      body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('imagenes/fondo.jpg');
        background-size: cover;
      }
      form {
        position: absolute; 
        top: 50%; 
        left: 50%; 
        width: 60%;
        height: 60%;
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
    
    <?php
        $datosTF =$_GET['desplegableTFI'];

        echo $lang['fecha']  . $datosTF;
      
    ?>
    <canvas id="GraficoT"></canvas>
    <script>

<?php
     $conexion = mysqli_connect("co28d739i4m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "k4ibhy838gyrdfcd", "qjlckj118obcht4d", "hz99pa5q46b8bho6");
     
     
     $consulta2 =  "SELECT tendencias.tendencia,  bics.nombre FROM tendencias JOIN bics ON tendencias.id = bics.id WHERE tendencias.fecha = '$datosTF' AND tendencias.tendencia > 0";
     $resultado2 = mysqli_query ($conexion, $consulta2);

      

      $nombre = array();
      $porcentajes = array();
      while ($fila2 = mysqli_fetch_assoc($resultado2)){
        $nombre[] = $fila2['nombre'];
        $tendencia[] = $fila2['tendencia'];

      }
      
      mysqli_close($conexion);
      ?>

      var monumentos = <?php echo json_encode($nombre); ?>;

      

    var ctx = document.getElementById("GraficoT").getContext("2d");
    var graf=new Chart(ctx, {
      type: 'bar',
      data: {
        labels: monumentos,
        datasets: [{
          label: '<?php echo $lang['tendencias']; ?>',
          data: <?php echo json_encode ($tendencia); ?>,
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
    });



</script>
<form>
<input style="background-color: #CCCCCC; border-radius:10px; height:33px; margin-top: 5%;" type="submit" name="descargar_csv" value="<?php echo $lang['descarga']; ?>">
  </form>
</body>
</html>