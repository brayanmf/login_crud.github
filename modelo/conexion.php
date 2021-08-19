<?php
class conectar{
    public static function Conexiones(){
        try{
            $conexion=new PDO('mysql:host=localhost;dbname=db','root','');
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET UTF8");
        }catch(PDOException $b){
            die("Error".$b->getMessage());
            echo "Linea del error". $b->getLine();
        }
        return $conexion;
    }
 

}


?>