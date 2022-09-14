<?php
include 'conexion.php';

$jugador = $_POST['jugador'];
$monto = $_POST['monto'];
$banco = $_POST['banco'];
$via = $_POST['via'];



$sql = "insert into billetera_virtual(monto_billetera,jugador_id ) values('" . $monto . "','" . $jugador . "')";
mysqli_query($con, $sql);
$id = mysqli_insert_id($con);
$sql2 = "insert into detalle_deposito(banco_deposito,via_deposito, id_billetera ) 
    values('" . $banco . "','" . $via . "','" . $id. "')";
mysqli_query($con, $sql2);

if($jugador=1){
    header("location:index.php");
}else{
    echo "Error";
}