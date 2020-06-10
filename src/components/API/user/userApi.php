<?php

// Carga archivos
require 'userCrud.php';

//Crea conexion
$db=new Conexion();
$conn=$db->Conectar();

// capturmos el metodo de la peticion
$method=$_SERVER['REQUEST_METHOD'];
// capturamos datos enviados en la peticion
$data = json_decode(file_get_contents('php://input'));

userCrud($conn,$method,$data);

function userCrud($conn,$method,$data){
    // Vemos la funcion del CRUD que necesitamos
    switch($method){
        
        case 'GET':
         $result=readUser($conn,$data);
         if($result) echo json_encode($result);
         else echo json_encode(array("msj"=>'Usuario no encontrado'));
         $conn=null;
         break;
        
         case 'POST':
         if($data){
            $result=createUser($conn,$data);
            if($result) echo json_encode(array("msj"=>'Usuario creado'));
            else echo json_encode(array("msj"=>'Error al crear usuario'));
            $conn=null;
            break;
        }
         else echo json_encode(array("msj"=>'Error al enviar datos'));
         $conn=null;
         break;

         case 'DELETE':
            $result=deleteUser($conn,$data);
            if($result) echo json_encode(array("msj"=>'Usuario eliminado'));
            else echo json_encode(array("msj"=>'Usuario no encontrado'));
            $conn=null;
            break;
        
         case 'PUT':
             $result=updateUser($conn,$data);
             if($result) echo json_encode(array("msj"=>'Usuario modificado'));
             else echo json_encode(array("msj"=>'Error al modificar usuario'));
            break;

         default:
         $conn=null;
         echo json_encode(array("msj"=>'Metodo de peticion no reconocido'));
    }
}

?>