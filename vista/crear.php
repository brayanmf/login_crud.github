
<?php
require('./../controlador/crear1.php');


?>

<!DOCTYPE html>
<html lang="es">
<?php require_once "./head.php"
?>
<body>
    <a class="bton" href="./panel.php">&#129044;</a>
  <section>
       <div class="titulo">
           <h1>Crear</h1>
       </div>
    <form action="" class="formulario"   method="post"> 
    <?php if(count($error)>0):?>
                <div class="alert">
                <?php foreach($error as $e): ?>
                <li><?php  echo $e;?> </li>
                <?php endforeach;/*un foreach para recorrer los errores de del array*/?>
                  </div>
    <?php endif;?>
    <label><i class="fas fa-user"></i> Nombre</label>
        <input type="text" name="name" placeholder="ingrese la nombre">
        <label><i class="fas fa-user-tie"></i> Usuario </label>
        <input type="text" name="usuario" placeholder="ingrese el usuario">

        <label><i class="fas fa-lock"></i> Contraseña</label>
        <input type="password" name="contraseña" placeholder="ingrese la contraseña">
      
        <label ><i class="fas fa-ruler-horizontal"></i> Cargo  </label>
        <select id="select" name="select" class="select" ><!--ajax ideal de una db-->
            <option selected disabled>Seleccione</option>        
            <option>Administrador</option>
            <option>Jefe de Personal</option>
            <option>Usuario</option>
        </select>
     
        <button type="submit" name="ingresar">Crear</button>
    </form>
    </section>
 
</body>
</html>