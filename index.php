<?php 
  include_once ("includes/header.php");
  session_start();
  if(isset($_SESSION['aleatorio'])){
    echo $_SESSION['aleatorio'];
  }
?>

        <h1>BIENVENIDO</h1>
        <p id="info">Ingrese un número entre 0 y 100</p>
        <form action="respuesta.php" method="post">
          <div id="divvalor">
            <label>número: <input type="number" name="numero" maxlength="3" min="0" max="100"></label>
            <input type="hidden" name="tipo" value="1">
          </div>
          <div id="divboton">
            <button type="submit" class="btnenviar">Enviar</button>
          </div>
        </form>
        
<?php include_once ("includes/footer.php") ?>