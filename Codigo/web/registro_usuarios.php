<?php
try{

$nombre =$_POST['nombre'];
$apellido =$_POST['apellido'];
$correo=$_POST['email'];
$username=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

// $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);
// $contrasenaHash en la consulta
$conexion = new mysqli("localhost", "root", "", "xacometer");
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
