<?php
require_once "./../modelo/user.php";
$error=array();/*array para los errores */
$user=new Usuario;
if(isset($_GET['id'])){
    $user->id=$_GET['id'];
    $usuario=$user->edituser();
    }
    
if (isset($_POST['editar'])){
    if(empty($_POST['name'])){
        $error['name']="requerimos el nombre";
    }
    if(empty($_POST['usuario'])){
        $error['email']="requerimos el usuario";
    }
    if(empty($_POST['contraseña'])){
        $error['pas']="requerimos la contraseña";
    }
   
    
    if(count($error)==0){
        $user->name=$_POST['name'];
        $user->user=$_POST['usuario'];/* */
        $user->password=$_POST['contraseña'];
        $user->select=$_POST['select'];
        $user->id=$_POST['id'];
       $b=$user->update();
       if($b){
        header('location: panel.php'); 
      }else{
        $error['db_error']="Error al registrar";
        }
    }

}




?>