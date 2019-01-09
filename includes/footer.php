<?php
  include_once 'db.php';
  $tabla = R::findAll("puntuaciones", "ORDER BY intentos, id ASC"); //Lista las puntuaciones de menor a mayor

?>
      </section>

      <aside id="puntajes">
        <table>
          <caption>Tabla de puntuaciones</caption>
          <tr> 
            <th>Posición</th> <th>Nombre</th> <th>Intentos</th>
          </tr>
          
            <?php 
              $posicion = 1;
              Foreach ($tabla as $registro) {
                
            ?>
          <tr>   
                <td> <?php echo $posicion ?> </td> 
                <td> <?php echo $registro["nombre"] ?> </td> 
                <td> <?php echo $registro["intentos"]; ?> </td>
          </tr>
            <?php
              $posicion++;
              }
            ?>

        </table>
      </aside>
      <div class="recuperar"></div>
    </div>
 </main>
  <footer id="piedepagina">
    <div>
      <section class="seccionpie">
        <address>Cartagena, Colombia</address>
        <small>&copy; Derechos reservados 2019</small>
      </section>
    <div class="recuperar"></div>
    </div>
  </footer>
</body>
</html>