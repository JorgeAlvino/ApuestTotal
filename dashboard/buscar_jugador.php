<?php
include 'conexion.php';

$buscador = mysqli_query($con, "SELECT * FROM Table_jugador where id_jugador like Lower('%" . $_POST['buscar_jugador'] . "%')");
$resultado = mysqli_num_rows($buscador);
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nombre</th>
            <th scope="col">apellido</th>
            <th scope="col">Documento</th>
            <th scope="col">Datos</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($fila = mysqli_fetch_assoc($buscador)) { ?>
            <tr>
                <th scope="row"><?php echo $fila["id_jugador"] ?> </th>
                <td><?php echo $fila["nombre_jugador"] ?> </td>
                <td><?php echo $fila["apellido_jugador"] ?></td>
                <td><?php echo $fila["documento_jugador"] ?></td>
                <td>
                    <form action="deposito.php" method="POST">
                        <div class="input-group">
                            <input type="hidden" value="<?php echo $fila["id_jugador"] ?>" name="jugador">
                            <input type="text" name="monto" class="form-control" placeholder="Cantidad" maxlength="10" required onkeypress="return filterFloat(event,this);">
                            <select name="banco" class="form-select" id="" required>
                                <option value="">Seleccione</option>
                                <option value="BBVA">BBVA</option>
                                <option value="BCP">BCP</option>
                                <option value="SCOTIABANK">SCOTIABANK</option>
                                <option value="INTERBANK">INTERBANK</option>
                                <option value="AGENTE">AGENTE</option>
                                <option value="OTROS">OTROS</option>
                            </select>
                            <select name="via" class="form-select" id="" required>
                                <option value="">Seleccione</option>
                                <option value="Whatsapp">Whatsapp</option>
                                <option value="Telegram">Telegram</option>
                            </select>
                            <button type="submit" class="btn btn-danger btn-sm">enviar</button>
                        </div>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>