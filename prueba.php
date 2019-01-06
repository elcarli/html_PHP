<?php
include 'db.php';

//Crea un bean, le coloca valores 
$puntuacion = R::dispense('puntuaciones');
$puntuacion->nombre = 'Carlos';
$puntuacion->intentos = 10;

R::store($puntuacion);  //el bean lo inserta en la BD (y crea la tabla)

//consulta una puntuacion
$registro = R::load('puntuaciones', 1);
echo $registro->intentos;

//editamos el bean cambiando el número de intentos a 20
$registro->intentos=20;
R::store($registro);  //guardamos esto en la BD

//borramos el registro
$regABorrar = R::load("puntuaciones",1);
R::trash($regABorrar);

//Buscar todos
$tabla = R::findAll("puntuaciones");

Foreach ($tabla as $registro) {
  Echo $registro["nombre"];
}
?>