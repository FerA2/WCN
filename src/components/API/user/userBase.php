<?php
//*********CAMBIADO */
class User2{

    private $conn;
    private $table='Usuarios';

    public $nombre;
    public $apellido;
    public $email;
    public $pass;

    //Constructor
    public function __construct($conn){
        $this->conn=$conn;
    }
    
    function create(){

        $query="INSERT INTO ". $this->table.
                    " (Nombre,Apellido,Email,Password) VALUES (
                    :nombre,
                    :apellido,
                    :email,
                    :pass);";

    
         $result=$this->conn->prepare($query);

         // Seguridad inyeccion SQL 
         $this->nombre=htmlspecialchars(strip_tags($this->nombre));
         $this->apellido=htmlspecialchars(strip_tags($this->apellido));
         $this->email=htmlspecialchars(strip_tags($this->email));
         $this->pass=htmlspecialchars(strip_tags($this->pass));

         //Bind variables
        $result->bindParam(':nombre',$this->nombre);
        $result->bindParam(':apellido',$this->apellido);
        $result->bindParam(':email',$this->email);
        $result->bindParam(':pass',$this->pass);

        if($result->execute()) return true;
        else return false;

    }
        
}
?>