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


require_once ('../fpdf185/fpdf.php');
// esto es el codigo del generador del pdf
      if( isset($_POST["descargar_pdf"])){

$conexion = mysqli_connect("localhost", "root", "", "xacometer");
      
$sql = "SELECT tendencias.fecha, tendencias.porcentaje, monumentos.BICs FROM tendencias JOIN monumentos ON tendencias.id = monumentos.id";
$result = $conexion->query($sql);


$pdf = new FPDF();
$pdf->ADDPage();

// Esto lo modificas tu
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(90, 10, 'Columna 1', 1);
$pdf->Cell(40, 10, 'Columna 2', 1);
$pdf->Cell(40, 10, 'Columna 3', 1);
$pdf->Ln();



if ($result->num_rows>0){
  while ($row = $result->fetch_assoc()){
    // Lo mismo
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(90, 10, $row['BICs'], 1);
    $pdf->Cell(40, 10, $row['fecha'], 1);
    $pdf->Cell(40, 10, $row['porcentaje'], 1);
    $pdf->Ln();
  }

}

    $filename = "datos.pdf";
    $pdf->Output($filename, 'F');


    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/pdf");
    header("Content-Length: " . filesize($filename));
    readfile($filename);

    unlink($filename);
    $conexion->close();
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
      $datosM =$_GET['desplegable'];
      $datosF =$_GET['desplegableFI'];
      $datosFF = $_GET['desplegableFF'];


      if ($datosF>$datosFF) {
        echo "<div class='alert alert-danger' role='alert'> <strong>¡Atención! La información solicitada no dispone de datos para mostrar.</div>";

      }else{
            

      //esto es pa probar
      echo "Monumento: " . $datosM . " " . "Fecha: " . $datosF . " " . "Fecha Fin: " . $datosFF;
      
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
          label: 'Tendencias',
          data: <?php echo json_encode ($porcentaje); ?>,
          backgroundColor: 'rgba(0,0,0)'
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

<button style="background-color: #CCCCCC; border-radius:10px; height:33px; margin-top: 5%;" type="submit" name="descargar_pdf">Descargar PDF</button>
<?php
}
?>
  </body>
</html>