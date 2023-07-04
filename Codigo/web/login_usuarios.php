<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$usuario=$_POST['usuario'];
$contrasena=trim($_POST['contrasena']);


$conexion = mysqli_connect("us-cdbr-east-06.cleardb.net", "bf3e0dec361658", "57467eec", "heroku_c70e32124a1dcb2");


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