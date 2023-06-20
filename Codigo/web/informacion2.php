<?php
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
        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('fondo3.jpg');
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
    <?php
    
    include 'navbar.php';
    
    ?>

    <form method="POST">
    
    <button type="submit" name="descargar_pdf">Descargar PDF</button>


    <?php
        $datosTF =$_GET['desplegableTFI'];
    ?>
    <canvas id="GraficoT"></canvas>
    <script>

<?php
     $conexion = mysqli_connect("localhost", "root", "", "xacometer");
     
     $consulta2 =  "SELECT tendencias.porcentaje,  monumentos.BICs FROM tendencias JOIN monumentos ON tendencias.id = monumentos.id WHERE tendencias.fecha = '$datosTF' AND tendencias.porcentaje > 0";
     $resultado2 = mysqli_query ($conexion, $consulta2);

      

      $BICs = array();
      $porcentajes = array();
      while ($fila2 = mysqli_fetch_assoc($resultado2)){
        $BICs[] = $fila2['BICs'];
        $porcentaje[] = $fila2['porcentaje'];

      }
      

      mysqli_close($conexion);
      ?>

      var monumentos = <?php echo json_encode($BICs); ?>;

      

    var ctx = document.getElementById("GraficoT").getContext("2d");
    var graf=new Chart(ctx, {
      type: 'bar',
      data: {
        labels: monumentos,
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
    });



</script>
</body>
</html>