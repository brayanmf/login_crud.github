
<?php 
session_start();
require_once "./../controlador/borrar.php";

?>
<!DOCTYPE html>
<html lang="es">
  <?php
require_once "./head.php";

?>
<body>
  

<div class="block">
<h1 class="f1" ><a href="./graficos.php"> Ver ventas <i class="fas fa-binoculars"></i></a></h1>
  <h1>Bienvenido : <?php echo $_SESSION['usuario'] ?></h1>
  <h1 class="f"><a href="panel.php?cerrar=cerrar"> &#128100; Cerrar Sesion</a> </h1>
</div>


<table class="tabla"  cellspacing="20"  > 
  <thead>
    <tr>
      <th>Nro</th>
      <th>usuario</th>
      <th>Nombre</th>
      <th>rol</th>
     
      <th><a  href="./crear.php">Agregar <i class="fas fa-user-plus"></i></a></th>
     
    </tr>
  </thead>
  
<?php

require_once "./../controlador/tabla1.php";
?>
</table>

  
</body>


