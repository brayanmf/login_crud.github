
<?php
require('./controlador/crear1.php');


?>

<!DOCTYPE html>
<html lang="es">
<?php require_once "head.php"
?>
<body>
    
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
        <label>Usuario</label>
        <input type="text" name="usuario" >
        <label>Contraseña</label>
        <input type="password" name="contraseña" >
        <label>rol</label>
        <select name="select" class="select" ><!--ajax-->
            <option>Administrador</option>
            <option>Jefe de Personal</option>
            <option>Usuario</option>
        </select>
     
        <button type="submit" name="ingresar">Crear</button>
    </form>
    </section>
 
</body>
</html>