<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$usuario=$_POST['usuario'];
$contrasena=trim($_POST['contrasena']);


$conexion = mysqli_connect("co28d739i4m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "k4ibhy838gyrdfcd", "qjlckj118obcht4d", "hz99pa5q46b8bho6");


$consulta = "SELECT * FROM usuarios WHERE username = '$usuario'";
$resultado = $conexion->query($consulta);

if ($resultado) {
    if ($resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();
        $contrasenaAlmacenada = $fila['contrasena'];

        if ($contrasenaAlmacenada == $contrasena) {
            session_start();
            $_SESSION['username'] = $usuario;
            header("Location: principal.php");
            exit;
        } else {
            session_start();
            $_SESSION['error'] = "Contraseña incorrecta";
            header("Location: login.php");
            exit;
        }
    } else {
        session_start();
        $_SESSION['error'] = "Usuario incorrecto";
        header("Location: login.php");
        exit;
    }
} else {
    echo "No se pudo realizar la consulta: " . $conexion->error;
}


?>