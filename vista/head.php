
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="shortcut icon" href="./../asset/descarga.ico" type="image/x-icon">
    <meta name="description" content="un crud realizado con poo,mvc"/>

    <link rel="stylesheet" href="./../css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<?php 
if(isset($_GET['cerrar'])&& $_GET['cerrar']=="cerrar"){
  
    session_destroy();
    header ("location: ./../index.php");
}
?>