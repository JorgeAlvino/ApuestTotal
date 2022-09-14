

function buscar_ahora(buscar){
    var parametros = {"buscar":buscar};  
    $.ajax({
      data:parametros,
      type:'POST',
      url:'buscar.php',
      success: function (data){
        document.getElementById("datos_buscador").innerHTML = data;
      }
    })
  }

  function buscar_ahora2(buscar){
    var parametros = {"buscar":buscar};  
    $.ajax({
      data:parametros,
      type:'POST',
      url:'buscar.php',
      success: function (data){
        document.getElementById("datos_buscador2").innerHTML = data;
      }
    })
  }

  function buscar_jugador(buscar){
    var parametros = {"buscar_jugador":buscar};  
    $.ajax({
      data:parametros,
      type:'POST',
      url:'buscar_jugador.php',
      success: function (data){
        document.getElementById("datos_jugador").innerHTML = data;
      }
    })
  }




  function actualizar_deposito($id){

    $('#actualizar').modal();

    $billetera = $('#data' + $id).data('id');
    $monto = $('#data' + $id).data('monto');
    $nombre = $('#data' + $id).data('nombre');
    $documento = $('#data' + $id).data('documento');
    $deposito = $('#data' + $id).data('deposito');
    $banco = $('#data' + $id).data('banco');
    $via = $('#data' + $id).data('via');
    $fecha = $('#data' + $id).data('fecha');

    var modal = $('#actualizar')
        modal.find('#jugador').val($nombre);
        modal.find('#codigo').val($billetera);
        modal.find('#banco').val($banco);
        modal.find('#via').val($via);
        modal.find('#monto').val($monto);
        modal.find('#fecha').val($fecha);
  }



  function filterFloat(evt, input) {
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value + chark;
    if (key >= 48 && key <= 57) {
      if (filter(tempValue) === false) {
        return false;
      } else {
        return true;
      }
    } else {
      if (key == 8 || key == 13 || key == 0) {
        return true;
      } else if (key == 46) {
        if (filter(tempValue) === false) {
          return false;
        } else {
          return true;
        }
      } else {
        return false;
      }
    }
  }

  function filter(__val__) {
    var preg = /^([0-9]+\.?[0-9]{0,2})$/;
    if (preg.test(__val__) === true) {
      return true;
    } else {
      return false;
    }

  }



