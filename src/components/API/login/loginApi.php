<?php

//Crea conexion
$db=new Conexion();
$conn=$db->Conectar();

// capturmos el metodo de la peticion
$method=$_SERVER['REQUEST_METHOD'];
// capturamos datos enviados en la peticion
$data = json_decode(file_get_contents('php://input'));

switch($method){
    case 'POST':
        if($data){
            $result=login($conn,$data);
            if($result) echo json_encode($result);
            else echo json_encode(array("msj"=>'Usuario no encontrado'));
        }
        else{
            header("HTTP/1.1 400 Bad Request");
            echo json_encode(array("msj"=>'Error al enviar datos'));
        }
        break;
    default:
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(array("msj"=>'Error con metodo peticion'));
        break;
}


function login($conn,$data){
   
    $query="SELECT * FROM Usuarios WHERE Email=:Email and Password=:Password;";
    $result=$conn->prepare($query);
    bindValor($result,$data);
    $result->execute();
    if($user=$result->fetchAll(PDO::FETCH_OBJ)){
        header("HTTP/1.1 200 OK");
        return $user;
        //echo json_encode(array("msj"=>'Error al modificar usuario'));
    }
    else{
        header("HTTP/1.1 400 Bad Request");
        return false;
    }
}

?>