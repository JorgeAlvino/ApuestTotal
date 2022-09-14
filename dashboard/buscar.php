<?php
    include 'conexion.php';

    $buscador = mysqli_query($con,"SELECT * FROM datos_banco where num_deposito like Lower('%".$_POST['buscar']."%')");
    $resultado = mysqli_num_rows($buscador); 
?>

<h5 class="card-title"> Resultados encontrados: <?php echo $resultado  ?></h5>

<?php while($fila = mysqli_fetch_assoc($buscador)){ ?>

    <p class="card-text"> <?php echo $fila["num_deposito"] ?> - <?php echo $fila["cliente_deposito"] ?> - <?php echo $fila["cantidad_deposito"] ?> </p>
<?php }?> 