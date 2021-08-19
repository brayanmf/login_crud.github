
<?php
require('./controlador/login1.php');


if(isset($_SESSION['id'])){/*si el usuario esta logeado me direcciona al form principal */
    header('location: vista/panel.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="shortcut icon" href="./asset/descargar.ico" type="image/x-icon">
    <meta name="description" content="un crud realizado con poo,mvc"/>
    <link rel="stylesheet" href="./css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body>
    
  <section>
       <div class="titulo">
           <h1>Login</h1>
       </div>
    <form action="" class="formulario"   method="post"> 
        
    <?php if(count($error)>0):?>
                <div class="alert caja">
                <?php foreach($error as $e): ?>
                <li><?php  echo $e;?> </li>
                <?php endforeach;/*un foreach para recorrer los errores de del array*/?>
                  </div>
    <?php endif;?>
  
        <label for="a"><i class="fas fa-user-tie"></i> Usuario  </label>
        <input id="a" type="text" name="usuario" placeholder="ingrese el usuario">
       

        <label for="b"><i class="fas fa-lock"></i> Contraseña</label>
        <input id="b"type="password" name="contraseña" placeholder="ingrese la contraseña">
    
        <button class="btn-form" type="submit" name="ingresar" >Ingresar</button>
    </form>
    </section>
 
</body>
</html>