
<?php

class Usuario {
    private $db;

    public function __construct(){
        require_once 'conexion.php';
        $this->db=conectar::Conexiones();
		$this->user="";
		$this->password="";
        $this->name="";
        $this->id="";
        $this->select="";
  
        
    }
    public function getdata1(){/**/
            $f=$this->db->prepare("SELECT * FROM usuarios WHERE usuario=:user LIMIT 1" );
            $f->bindParam(':user',$this->user);      
            $f->execute();
		    $a=$f->fetch(PDO::FETCH_ASSOC);
            
   
            return $a;

        }
        public function edituser(){/**/
            $f=$this->db->prepare("SELECT id,usuario,nombre,rol FROM usuarios WHERE id=:a");
            $f->bindParam(':a',$this->id);
            $f->execute();
            $a=$f->fetch(PDO::FETCH_ASSOC);
            return $a;
        }




        public function update(){
            $this->password=password_hash($this->password,PASSWORD_DEFAULT);//encriptando
            $f=$this->db->prepare("UPDATE usuarios SET usuario=:usuario, nombre=:nombre,pass=:pass, rol=:rol WHERE id=:a");
            $f->bindParam(':nombre',$this->name);
            $f->bindParam(':usuario',$this->user);
            $f->bindParam(':pass',$this->password);
            $f->bindParam(':rol',$this->select);
            $f->bindParam(':a',$this->id);
            $a=$f->execute();
            return $a;

        }
        public function createuser(){
            $this->password=password_hash($this->password,PASSWORD_DEFAULT);//encriptando
            
            $f=$this->db->prepare("INSERT INTO usuarios (usuario,nombre,pass,rol)VALUES(:user,:nombre,:pass,:rol)");
    
            $f->bindParam(':user',$this->user);
            $f->bindParam(':nombre',$this->name);
            $f->bindParam(':rol',$this->select);
            $f->bindParam(':pass',$this->password);
            $a=$f->execute();
            return $a;
        }
        public function delete(){
            $f=$this->db->prepare("DELETE FROM usuarios WHERE id=:a");
            $f->bindParam(':a',$this->id);
            $f->execute();
            return $f;

        }


        public function getdataU(){

            $f=$this->db->prepare("SELECT id,usuario,nombre,rol FROM usuarios");
            $f->execute();
            $a=$f->fetchAll(PDO::FETCH_ASSOC);/*para foreach trae los datos de golpe,ideal para pequeñas tablas poo lo usan comun mente */
            return $a;
    
        }
      
    
}
?>
