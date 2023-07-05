<?php
try{

$nombre =$_POST['nombre'];
$apellido =$_POST['apellido'];
$correo=$_POST['email'];
$username=$_POST['usuario'];
$contrasena=$_POST['contrasena'];


$conexion = mysqli_connect("co28d739i4m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "k4ibhy838gyrdfcd", "qjlckj118obcht4d", "hz99pa5q46b8bho6");
$consulta = "INSERT INTO usuarios(nombre, apellido, email, username, contrasena) VALUES ('$nombre', '$apellido', '$correo', '$username', '$contrasena')";
$resultado = mysqli_query($conexion, $consulta);



if($resultado){
    session_start();
    $_SESSION['username'] = $username;
    header("Location: principal.php");
    exit;
}
 else{
    session_start();
    $_SESSION['errorR'] = "Error al realizar la inserción";
    header("Location: registro.php");
    exit;
 }

}catch(mysqli_sql_exception $e){ session_start();
    $_SESSION['errorR'] = "Usuario existente";
    header("Location: registro.php");
    exit;
}





?>
