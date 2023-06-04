<?php

$nombre =$_POST['nombre'];
$apellido =$_POST['apellido'];
$correo=$_POST['email'];
$username=$_POST['usuario'];
$contrasena=$_POST['Contraseña'];

$conexion = mysqli_connect("localhost", "root", "", "usuarios");
$consulta = "INSERT INTO usuarios(nombre, apellido, correo, username, contrasena) VALUES ('$nombre', '$apellido', '$correo', '$username', '$contrasena')";
$resultado = mysqli_query($conexion, $consulta);


if($resultado){
    echo "<script>alert('Usuario registrado exitosamente');
    
    </script>";
}else{
    echo "<script>alert('Error al registrar usuario');
    
    </script>";
}

if($conexion -> connect_errno){
    echo "Fallo la conexion".$conexion -> connect_errno;
}

mysqli_close($conexion);
header("location: principal.html")


?>
