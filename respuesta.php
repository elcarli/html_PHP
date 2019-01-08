<?php
  include("db.php");
  session_start();

  $tipo = $_POST['tipo'];

  if ($tipo==1) //formulario de intentos
  {
    
    if(isset($_SESSION['contador'])){
      $_SESSION['contador']++;
    } else {
      $_SESSION['contador']=1;
    }

    $numero = $_POST['numero'];


    if ($numero<77){
      header("Location: muybajo.php");
    }
    else if($numero>77){
      header("Location: muyalto.php");
    }
    else if($numero==77) {
      include ("includes/header.php");
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
              <label>Nombre: <input type="text" name="nombre" maxlength="20"></label>             
            </div>
            <div id="divboton">
              <button type="submit">Guardar</button>
            </div>
        </form>
        </div>
  
      <figure id="imgright">
        <img src="images/7.png">
      </figure>
  
<?php

  include ("includes/footer.php");
    }
  } else if ($tipo==2){ //formulario de registro
  
    //si se envió el formulario, se registra la puntuacion en la BD con ayuda del ORM RedBean
    if(isset($_POST['nombre'])){

    $puntuacion = R::dispense('puntuaciones');
    $puntuacion->nombre = $_POST['nombre'];
    $puntuacion->intentos = $_SESSION['contador'];

    R::store($puntuacion);

    //se elimina la variable del contador para nuevos usuarios que jueguen
    unset($_SESSION['contador']);

    //Se redirecciona al usuario al index
    header("Location: index.php");
    }
  }
  
?>