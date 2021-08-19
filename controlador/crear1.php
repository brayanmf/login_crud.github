<?php
require_once "./../modelo/user.php";
$error=array();/*array para los errores */
$user=new Usuario;
if (isset($_POST['ingresar'])){
    if(empty($_POST['usuario'])){
        $error['email']="requerimos el usuario";
    }
    if(empty($_POST['contraseña'])){
        $error['contra']="requerimos la contraseña";
    }
    if(empty($_POST['name'])){
        $error['name']="requerimos el nombre";
    }

   
    if(!isset($_POST['select'])){
        $error['select']="requerimos un cargo";
    }
  
    if(count($error)==0){
     
      /*-----------------*/  
        $user==new Usuario;
        $user->user=$_POST['usuario'];/*le paso como parametro los pos (solo esto esta modificado si sale mal es por esto) */
        $user->password=$_POST['contraseña'];
        $user->name=$_POST['name'];
        $user->select=$_POST['select'];
        $b=$user->createuser();
        if($b){
            header('location: panel.php'); 
        }else{
        $error['db_error']="Error al registrar";
        }
    }

}
?>