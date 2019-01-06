<?php
  include("db.php");

  $numero = $_POST['numero'];

  if ($numero<77){
    header("Location: muybajo.php");
  }
  else if($numero>77){
    header("Location: muyalto.php");
  }
  else {
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

?>