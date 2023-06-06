<?php

$nombre =$_POST['nombre'];
$apellido =$_POST['apellido'];
$correo=$_POST['email'];
$username=$_POST['usuario'];
$contrasena=$_POST['Contraseña'];

$conexion = new mysqli("localhost", "root", "", "usuarios");
$consulta = "INSERT INTO usuarios(nombre, apellido, email, username, contrasena) VALUES ('$nombre', '$apellido', '$correo', '$username', '$contrasena')";
$resultado = mysqli_query($conexion, $consulta);


if($resultado){
    echo "<script>alert('Usuario registrado exitosamente');

    </script>";
}else{
    echo "<script>alert('Error al registrar usuario');

    </script>";
}

if($conexion -> connect_error){
    echo "Fallo la conexion".$conexion -> connect_error;
}

mysqli_close($conexion);
header("location: principal.php")


?>
