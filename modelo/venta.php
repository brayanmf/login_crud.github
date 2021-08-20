<?php
class venta {
    private $db;
    public function __construct(){
        require_once 'conexion.php';
        $this->db=conectar::Conexiones();
    }

    public function getdatav(){
        $f=$this->db->prepare("SELECT dia,monto,cantMesas FROM resumen_dia " );
      
        $f->execute();
        $a=$f->fetchAll(PDO::FETCH_ASSOC);
        

        return $a;

    }
}

?>