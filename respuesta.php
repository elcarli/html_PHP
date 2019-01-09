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
  
    //si se envió el formulario, se registra la puntuacion en la BD con ayuda del ORM RedBean
    if(isset($_POST['nombre'])){

    $puntuacion = R::dispense('puntuaciones');
    $puntuacion->nombre = $_POST['nombre'];
    $puntuacion->intentos = $_SESSION['contador'];

    R::store($puntuacion);

    //se eliminan las variables de SESSION para nuevos usuarios que jueguen
    unset($_SESSION['contador']);
    unset($_SESSION['aleatorio']);

    //Se redirecciona al usuario al index
    header("Location: index.php");
    }
  }
  
?>