<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php $lang['informacion'] ?></title>
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
    <script>
      fetch('navbar.php')
      .then(response => response.text())
      .then(data => {
        document.getElementById('navbarContainer').innerHTML = data;
      });
    </script>
        
      <?php
      $datosM =$_GET['desplegable'];
      $datosF =$_GET['desplegableFI'];
            

      //esto es pa probar
      echo "Monumento: " . $datosM . "Fecha: " . $datosF;
      ?>

        <!-- Grafico v -->
        <canvas id="Grafico"></canvas>
        <script>

    


    <?php
     $conexion = mysqli_connect("localhost", "root", "", "xacometer");
     $consulta = "SELECT fecha FROM tendencias WHERE fecha >= '$datosF'";
     $resultado = mysqli_query($conexion, $consulta);
     $consulta2 =  "SELECT tendencias.fecha, tendencias.porcentaje FROM tendencias INNER JOIN monumentos ON tendencias.id = monumentos.id WHERE tendencias.fecha >= '$datosF' AND monumentos.BICs = '$datosM'";
     $resultado2 = mysqli_query ($conexion, $consulta2);

      $fechas = array();
      while ($fila =mysqli_fetch_assoc($resultado)){
        $fechas[] = $fila['fecha'];
      }

      $fechas2 = array();
      $porcentajes = array();
      while ($fila2 = mysqli_fetch_assoc($resultado2)){
        $fechas2[] = $fila2['fecha'];
        $porcentaje[] = $fila2['porcentaje'];

      }
      

      mysqli_close($conexion);
      ?>

    var fechasPosteriores = <?php echo json_encode($fechas); ?>;

    fechasPosteriores.sort(function(a, b){
      return new Date(a) - new Date(b);
    });

    var ctx = document.getElementById("Grafico").getContext("2d");
    var graf=new Chart(ctx, {
      type: 'bar',
      data: {
        labels: fechasPosteriores,
        datasets: [{
          label: 'Porcentajes',
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
<!-- Grafico ^ -->

  </body>
</html>