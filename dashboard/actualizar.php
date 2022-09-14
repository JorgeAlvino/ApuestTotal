<?php
include 'conexion.php';

$deposito = $_POST['codigo'];
$monto = $_POST['monto'];
$banco = $_POST['banco'];
$via = $_POST['via'];


    $sql = "UPDATE billetera_virtual SET monto_billetera='".$monto."' WHERE id_billetera = '".$deposito."'";
    mysqli_query($con,$sql);
    $sql2 = "UPDATE detalle_deposito SET banco_deposito='".$banco."',via_deposito='".$via."' WHERE id_billetera = '".$deposito."'";
    mysqli_query($con,$sql2);

    if($deposito=1){
        header("location:index.php");
    }else{
        echo 'no';
    }
