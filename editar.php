
<?php
require('./controlador/editar1.php');


?>

<!DOCTYPE html>
<html lang="es">
<?php require_once "head.php"
?>
<body>
    
  <section>
       <div class="titulo">
           <h1>Editar</h1>
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
        <input type="text" name="usuario" value="<?php echo $usuario['usuario'] ?>">
        <label>Nueva contraseña</label>
        <input type="password" name="contraseña" >
       
        <label>Antiguo cargo</label>
        <input type="text"  value="<?php echo $usuario['rol'] ?>" disabled >
        <label>rol</label>
        <select name="select" class="select" ><!--ajax-->
            <option>Administrador</option>
            <option>Jefe de Personal</option>
            <option>Usuario</option>
        </select>
    
        <input type="hidden" name="id" value="<?php echo $usuario['id']?>">
        <button type="submit" name="ingresar">Editar</button>
    </form>
    </section>
 
</body>
</html>