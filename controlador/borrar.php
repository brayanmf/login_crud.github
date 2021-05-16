<?php 
require_once "./modelo/user.php";

if(isset($_GET['id'])){
    $a=new Usuario;
$a->id=$_GET['id'];

$b=$a->delete();
if($b){
    header('location: panel.php'); 
}
}
?>