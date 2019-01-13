<?php
  include_once("db.php");
  session_start();
  if(!isset($_SESSION['aleatorio'])){
      $_SESSION['aleatorio'] = rand(0,100);
    }

  $tipo = $_POST['tipo'];

  if ($tipo==1) //formulario de intentos
  {
    
    if(isset($_SESSION['contador'])){
      $_SESSION['contador']++;
    } else {
      $_SESSION['contador']=1;
    }
    $numero = $_POST['numero'];
    if ($numero< $_SESSION['aleatorio']){
      header("Location: muybajo.php");
    }
    else if($numero> $_SESSION['aleatorio']){
      header("Location: muyalto.php");
    }
    else if($numero== $_SESSION['aleatorio']) {
      include_once ("includes/header.php");
?>
      <figure id="imgleft">
        <img src="images/2.png">
      </figure>
        <div id="mensaje">
          <div class="motivacion">
            <p>¡Felicitaciones!, has adivinado el número.</p>
            <p>Ingrese su nombre</p>
          </div>
          <form action="respuesta.php" method="post">
            <div id="divvalor">
              <input type="hidden" name="tipo" value="2">
              <label>Nombre: <input type="text" name="nombre" autocomplete="off" maxlength="20"></label>             
            </div>
            <div id="divboton">
              <button type="submit" class="btnenviar">Guardar</button>
            </div>
        </form>
        </div>
  
      <figure id="imgright">
        <img src="images/7.png">
      </figure>
<?php

include_once ("includes/footer.php");
    }
  } else if ($tipo==2){ //formulario de registro
  
    ///si se envió el formulario, se registra la puntuacion en la BD con ayuda del ORM RedBean
    if(isset($_POST['nombre']) && isset($_SESSION['contador'])){

    $puntuacion = R::dispense('puntuaciones');
    $puntuacion->nombre = $_POST['nombre'];
    $puntuacion->intentos = $_SESSION['contador'];

    R::store($puntuacion);

    $mensaje="Se ha guardado tu puntuación :D";
    $tipo = "success";
    }
    else {
    
      $mensaje="Algo salió mal, intenta nuevamente :(";
      $tipo = "error";
    }
    //se eliminan las variables de SESSION para nuevos usuarios que jueguen
    unset($_SESSION['contador']);
    unset($_SESSION['aleatorio']);
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="sweetalert2.min.js"></script>
    <title>Información</title>
  </head>
  <!-- CARGO EL SWEETALERT-->
  <body onload="aviso()">
    <input type="hidden" id="mensaje" value = "<?php echo $mensaje ?>" >
    <input type="hidden" id="tipo" value = "<?php echo $tipo ?>" >

    <script>
      function aviso() {
        swal({
          type: document.getElementById("tipo").value,
          title: "Información",
          text: document.getElementById("mensaje").value,
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
        }). then(function(result){
          window.location.href='index.php';
          })
        }
    </script>

  </body>
  </html>
<?php
  } 
?>