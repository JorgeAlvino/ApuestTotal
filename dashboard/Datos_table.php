<?php
include 'conexion.php';


$sql = "SELECT `monto_billetera`,`jugador_id` FROM billetera_virtual 
WHERE MONTH(created_at) = MONTH(CURRENT_DATE());";
$result = mysqli_query($con, $sql);

 return json_encode($result);



?>