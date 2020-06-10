<?php   

   // funcion Read que usa el id para devolver los datos de usuario
   /***** DESACTIVAR pasar por loguin */
    function readUser($conn,$data){
      
        $query="SELECT * FROM Usuarios WHERE idUsuario=:idUsuario" ;
        //$query="SELECT * FROM Usuarios WHERE Email=:email and Password=:pass;";
        $result=$conn->prepare($query);
        $result->bindValue(':idUsuario',$data->idUsuario);
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
    };

    function createUser($conn,$data){
        $query="INSERT INTO Usuarios (Nombre, Apellido, Email, Password) VALUES (:Nombre, :Apellido, :Email, :Password);";
        $result=$conn->prepare($query);
        bindValor($result,$data);
        //$result->execute();
        //echo $query;
        if($result->execute()){
            header("HTTP/1.1 200 OK");
            return true;
            //echo json_encode(array("msj"=>'Error al modificar usuario'));
        }
        else{
            header("HTTP/1.1 400 Bad Request");
            return false;
        }
    }
    
    function updateUser($conn,$data){
         // Comprobamos que exista el usuario
        if(readUser($conn,$data)){
            $campos=extraerParametros($data);
            $query="UPDATE Usuarios SET $campos WHERE IdUsuario=:idUsuario;";
            $result=$conn->prepare($query);
            bindValor($result,$data);
            if($result->execute()){
                header("HTTP/1.1 200 OK");
                return true;
            }
            else{
                header("HTTP/1.1 400 Bad Request");
                return false;
            }
        }
        else{
            header("HTTP/1.1 400 Bad Request");
            return false;
        }
    }
    
    function deleteUser($conn,$data){
       
        // Comprobamos que exista el usuario
        if(readUser($conn,$data)){
            $query="DELETE FROM Usuarios WHERE idUsuario=:idUsuario;";
            $result=$conn->prepare($query);
            $result->bindValue(':idUsuario',$data->idUsuario);
            if($result->execute()){
                header("HTTP/1.1 200 OK");
                return true;
            }
            else{
                header("HTTP/1.1 400 Bad Request");
                return false;
            }
        }
        else{
            header("HTTP/1.1 400 Bad Request");
            return false;
        }
    }
?>