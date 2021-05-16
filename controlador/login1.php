<?php 
require_once './modelo/user.php';
session_start();
$error=array();/*array para los errores */

if(isset($_SESSION['id'])){/**aca errorrrrr! por que no se que como traer de la base de datos */
    header ("location: ./panel.php");
}

if(isset($_POST['ingresar'])){/*compruebo si esta definida */
    if (empty($_POST['usuario'])){
        $error['username']="Requerimos el usuario";
    }
    if(empty($_POST['contraseña'])){ 
        $error['password']="La contraseña es contraseña";
    }
    
    if(count($error)==0){
        $usuarioL=new Usuario;
        $usuarioL->user=$_POST['usuario'];
        $usuarioL->password=$_POST['contraseña'];
        $a=$usuarioL->getdata1();
            if(isset($a['pass']) && password_verify($usuarioL->password,$a['pass'])){/*if de coroto circuito para comprobar que no sea null y exista la varible */
                $_SESSION['id']=$a['id'];
                $_SESSION['usuario']=$a['usuario'];
                $_SESSION['rol']=$a['rol'];
                header('location: panel.php'); 
                exit();    
  
            }else{
                $error['login_fail']="No existen los credenciales";
            }
    
      
       
    }
}
?>