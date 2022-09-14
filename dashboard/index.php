<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.101.0">
  <title>Caso | Apuesta Total</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <link href="dashboard.css" rel="stylesheet">
</head>

<body>

  <?php
  include 'conexion.php';
  $sql = 'SELECT * FROM billetera_virtual JOIN Table_jugador ON Table_jugador.id_jugador = billetera_virtual.jugador_id JOIN detalle_deposito ON detalle_deposito.id_billetera = billetera_virtual.id_billetera';
  $resultado = mysqli_query($con, $sql);
  ?>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Compañia</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home" class="align-text-bottom"></span>
                Inicio
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#crear">
                <span data-feather="file" class="align-text-bottom"></span>
                Crear Jugador
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#registro">
                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                Registrar Deposito
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Inicio</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
          </div>
        </div>
        <h3>Depositos recientes</h3>
        <div class="table-responsive">
          <table class="table table-striped table-sm" id="data">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Monto</th>
                <th scope="col">Jugador</th>
                <th scope="col">Documento</th>
                <th scope="col">Create</th>
                <th scope="col">Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($filas = mysqli_fetch_assoc($resultado)) {
              ?>
                <tr>
                  <td><?php echo $filas['id_billetera']; ?></td>
                  <td><?php echo 'S/.' . $filas['monto_billetera']; ?></td>
                  <td><?php echo $filas['nombre_jugador'] . ' ' . $filas['apellido_jugador']; ?></td>
                  <td><?php echo $filas['documento_jugador']; ?></td>
                  <td><?php echo $filas['created_at']; ?></td>
                  <td><button class="btn btn-primary btn-sm" id="<?php echo 'data' . $filas['id_billetera']; ?>" data-id="<?php echo $filas['id_billetera']; ?>" 
                  data-monto="<?php echo $filas['monto_billetera']; ?>" data-nombre="<?php echo $filas['nombre_jugador'] . ' ' . $filas['apellido_jugador']; ?>" 
                  data-documento="<?php echo $filas['documento_jugador']; ?>" data-deposito="<?php echo $filas['id_deposito']; ?>" data-banco="<?php echo $filas['banco_deposito']; ?>" 
                  data-via="<?php echo $filas['via_deposito']; ?>" onclick="actualizar_deposito(<?php echo $filas['id_billetera']; ?>)" data-fecha="<?php echo $filas['created_at']; ?>" 
                  data-bs-toggle="modal" data-bs-target="#actualizar">editar</button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/dist/js/jquery-3.6.1.min"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
  <script src="buscador.js"></script>
  <script>
    $(document).ready(function() {
      $('#data').DataTable();
    });
  </script>
</body>


<!-- Modal -->
<div class="modal fade" id="crear" aria-hidden="true" aria-labelledby="crear" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crear">Crear Jugador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="crear_jugador.php">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nombres" aria-label="Nombres" name="nombres" pattern="[a-z]{1,15}" required>
            <span class="input-group-text">-</span>
            <input type="text" class="form-control" placeholder="Apellidos" aria-label="Apellidos" name="apellidos" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Celular</span>
            <input type="text" class="form-control" placeholder="Celular" id="celular" name="celular" min="1" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Documento" name="documento" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
            <span class="input-group-text">/</span>
            <input type="" class="form-control" placeholder="Nacionalidad" name="nacionalidad" required>
          </div>
          <div class="input-group mb-3">
            <select type="text" class="form-control" placeholder="Genero" name="genero" required>
              <option selected>Género</option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
              <option value="Nulo">Sin especificar</option>
            </select>
            <span class="input-group-text">Nacimiento:</span>
            <input type="text" class="form-control" placeholder="Edad" name="edad" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Crear</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="registro" aria-hidden="true" aria-labelledby="registro" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registro">Registrar deposito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="buscar" class="form-label">Codigo Bancario</label>
        <input type="text" class="form-control" id="buscar2" name="buscar" onkeyup="(buscar_ahora2($('#buscar2').val()));">
        <div class="card col-12 mt-2">
          <div class="card-header">
            datos:
          </div>
          <div class="card-body">
            <div id="datos_buscador2" class="container pl-5 pr-5"></div>
          </div>
        </div>
        <hr>
        <label for="buscar" class="form-label">Codigo Jugador</label>
        <input type="text" class="form-control" id="buscar_jugador" name="buscar_jugador " onkeyup="(buscar_jugador($('#buscar_jugador').val()));">
        <div class="card col-12 mt-2">
          <div class="card-body">
            <div id="datos_jugador" class="container pl-5 pr-5"></div>
          </div>
        </div>
        <hr>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="actualizar" aria-hidden="true" aria-labelledby="actualizar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registro">Actualizar deposito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="buscar" class="form-label">Codigo Bancario</label>
        <input type="text" class="form-control" id="buscar" name="buscar " onkeyup="(buscar_ahora($('#buscar').val()));">
        <div class="card col-12 mt-2">
          <div class="card-header">
            datos:
          </div>
          <div class="card-body">
            <div id="datos_buscador" class="container pl-5 pr-5"></div>
          </div>
        </div>
        <hr>
        <form action="actualizar.php" method="POST">
          <div class="input-group mb-3">
            <span class="input-group-text bg-warning">Deposito registrado</span>
            <input type="text" class="form-control" placeholder="Codigo" id="codigo" name="codigo" readonly>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="jugador" id="jugador" readonly>
            <span class="input-group-text bg-success text-white" id="basic-addon2">Jugador</span>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text bg-primary text-white">fecha de registro</span>
            <input type="date" class="form-control" id="fecha" readonly>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Monto: S/.</span>
            <input type="text" class="form-control" id="monto" name="monto" maxlength="10" onkeypress="return filterFloat(event,this);">
            <span class="input-group-text">.00</span>
          </div>
          <div class="input-group mb-3">
            <select name="banco" class="form-select" id="banco" name="banco" required>
              <option id="BBVA" value="BBVA">BBVA</option>
              <option id="BCP" value="BCP">BCP</option>
              <option id="SCOTIABANK" value="SCOTIABANK">SCOTIABANK</option>
              <option id="INTERBANK" value="INTERBANK">INTERBANK</option>
              <option id="AGENTE" value="AGENTE">AGENTE</option>
              <option id="OTROS" value="OTROS">OTROS</option>
            </select>
            <span class="input-group-text">-</span>
            <select name="via" class="form-select" id="via" name="via" required>
              <option value="Whatsapp">Whatsapp</option>
              <option value="Telegram">Telegram</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Actualizar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
</html>