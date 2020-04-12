<?php

    include 'crudUsuarios.php';

    Header('Content-Type: text/html; charset=ISO-8859-1');

    //$data=['dolar'=>100,'euro'=>200];
    
    echo getData();
   
    
    function getData(){
        $data=array();
        $data['users']=array();
        $result=getDatos();
      
        if($result->rowCount()){
            
            while($row=$result->fetch(PDO::FETCH_ASSOC)){
                
                $user=array(
                    'nombre'=>$row['Nombre'],
                    'email'=>$row['Email']
                ); 
              
                array_push($data['users'],$user);
                
            };
          
            echo json_encode($data);
        }
        else {
            echo json_encode((array('msg'=>'No hay resultados')));
        }
    }
?>
