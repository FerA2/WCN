<?php

    //include 'crudUsuarios.php';
    require 'conexion.php';
    require 'metodosApi.php';

    // Cabeceras para permitir CORS, arreglar origen externos
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
    //header('Content-Type:application/json');

    // Capturamos la variable añadida en la url
    $url=$_GET['url'];
    
    if(isset($url)){
    
        header('Content-Type:application/json');
        switch($url){
            case 'logins':
                require './login/loginApi.php';
                break;
            case 'usuarios': 
                 require './user/userApi.php';
                 //echo "usuarios";
                 break;
            case 'tareas': 
                require './tarea/tareasApi.php';
                //echo "tareas";
                break;
            case 'contactos': 
                //require './user/contactosApi.php';
                echo "contactos";
                break;
            default:
                 echo json_encode('URL desconocida');
                 break;
        }
    }
    else echo "URL desconocida";
    /* PETICION GET
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $url=$_GET['url'];
        echo $url;
    }
    else if($_SERVER['REQUEST_METHOD']=='POST'){

        $url=$_GET['url'];
        
    
    // Extraemos y decodificamos los datos recibidos en la peticion Http

    //******** RECIVIMOS EL TOKEN Y LO DESCOMPONEMOS REDIRECCIONANDO ******/
    /*
    $data = json_decode(file_get_contents('php://input'));
    
    if(isset($data)){
    
       header('Content-Type:application/json');
       switch($url){
           case 'usuarios':
                
                require './user/userApi.php';
                echo "usuarios";
                break;
           default:
                break;
       }
       */
       /*
        if($data->tipo==='usuario') {
            $result=login($data->email,$data->pass);
           
            if($result) echo json_encode($result);
            else echo json_encode(false);
            
        }
    }
    else echo json_encode('error');
    
    }
    */
