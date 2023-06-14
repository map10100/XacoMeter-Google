<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$usuario=$_POST['usuario'];
$contrasena=trim($_POST['contrasena']);


$conexion = mysqli_connect("localhost", "root", "", "usuarios");

$consulta = "SELECT * FROM usuarios WHERE username = '$usuario'";
$resultado = $conexion->query($consulta);

if ($resultado) {
if ($resultado->num_rows === 1){
    $fila = $resultado->fetch_assoc();
    $contrasenaAlmacenada = $fila['contrasena'];


if ($contrasenaAlmacenada == $contrasena){
    session_start();
    
    $_SESSION['username'] = $usuario;
    
    header("Location: principal.php");
    exit;
}else{
    echo "Contraseña incorrecta";
}
    // $error = error_get_last();
    // echo "Error al verificar la contraseña: " .$error['message'];
    // //header("Location: login.php");
    // echo "<script>alert('Usuario o contraseña incorrectos');</script>";
}else{
    echo "Usuario incorrecto";
}
}else{
    echo "No va la consulta" . $conexion->error;


}
?>