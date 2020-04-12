<?php   

    
    include 'conexion.php';

    function getDatos(){
        $db=new Conexion();
        $conn=$db->Conectar();
        $result=$conn->query('SELECT * FROM Usuarios');
        return $result;
    };
    /*
    // Al declararlo como clase usamos un objeto para instanciar
    $conn=new Conexion();

    //LLamamos al metodo conectar
    $conexion=$conn->Conectar();

    // necesario Axios
    $_POST= json_decode(file_get_contents('php://input'),true);

    /*
     datos enviados por POST desde es el main.js
    Se enviara una opcion que se correspondera con un metodo de el crud
    */
    /*
    $opcion= (isset($_POST['opcion'])) ? $_POST['opcion']:'';

    $id= (isset($_POST['id'])) ? $_POST['id']:'';
    $marca= (isset($_POST['marca'])) ? $_POST['marca']:'';
    $modelo= (isset($_POST['modelo'])) ? $_POST['modelo']:'';
    $stock= (isset($_POST['stock'])) ? $_POST['stock']:'';

    $data='';

    switch($opcion){
        case 1: // Create
            $query="INSERT INTO moviles (marca,modelo,stock) VALUES('$marca','$modelo','$stock')";
            $result=$conexion->prepare($query);
            $result->execute();
        break;
        case 2: // Edit
            $query="UPDATE moviles SET marca='$marca' modelo='$modelo' stock='$stock' WHERE id='$id'";
            $result=$conexion->prepare($query);
            $result->execute();
            $datos=$result->fetchAll(PDO::FETCH_ASSOC);
        break;
        case 3: // Delete
            $query="DELETE FROM moviles WHERE id='$id'";
            $result=$conexion->prepare($query);
            $result->execute();
        break;
        case 4: // Select
            $query="SELECT id,marca,modelo,stock FROM moviles";
            $result=$conexion->prepare($query);
            $result->execute();
            $data=$result->fetchAll(PDO::FETCH_ASSOC);
        break;
    }

    print json_encode($data,JSON_UNESCAPED_UNICODE);//envia en formato JSON
    -*/
   
    
?>