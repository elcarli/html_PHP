<?php 
  include ("includes/header.php") ;
  session_start();
  if(isset($_SESSION['contador'])){
    echo $_SESSION['contador'];
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
            <button type="submit">Enviar</button>
          </div>
        </form>
        
<?php include ("includes/footer.php") ?>