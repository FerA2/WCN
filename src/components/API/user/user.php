<?php
//*******CAMBIADO */
// Objeto usuario con sus atributos y metodos
class User {

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $pass;

    public function __construct($data){
        // Seguridad inyeccion SQL 
        if(isset($data->id))$this->id=htmlspecialchars(strip_tags($data->id));
        if(isset($data->nombre))$this->nombre=htmlspecialchars(strip_tags($data->nombre));
        if(isset($data->apellido))$this->apellido=htmlspecialchars(strip_tags($data->apellido));
        if(isset($data->email))$this->email=htmlspecialchars(strip_tags($data->email));
        if(isset($data->pass))$this->pass=htmlspecialchars(strip_tags($data->pass));
    }
   
}
?>