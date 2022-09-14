<?php
include 'conexion.php';

$nombre = $_POST['nombres'];
$apellido = $_POST['apellidos'];
$celular = $_POST['celular'];
$documento = $_POST['documento'];
$nacionalidad = $_POST['nacionalidad'];
$genero = $_POST['genero'];
$edad = $_POST['edad'];

    $sql = "insert into Table_jugador(nombre_jugador,apellido_jugador,documento_jugador,celular_jugador,nacionalidad_jugador,genero_jugador,edad_jugador) 
    values('".$nombre."','".$apellido."','".$celular."','".$documento."','".$nacionalidad."','".$genero."','".$edad."')";
    mysqli_query($con,$sql);
    if($nombre=1){
        header("location:index.php");
    }else{
        echo 'no';
    }


?>