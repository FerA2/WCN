<?php

function getParametros($data){
    $parametroFiltro=[];

    foreach($data as $param=>$value){
        $parametroFiltro[]="$param=:$param";
    }
    return implode(", ", $parametroFiltro);
}

// Recupera el nombre de los datos enviados y los almacena como string
function extraerParametros($data){
    $parametros='';

    foreach($data as $param=>$value){
        $parametros =$parametros." $param=:$param,";
    }
    return trim($parametros,',');
}

// Vincula el parametro con el valor
function bindValor($result,$parametros){

    foreach($parametros as $param=>$value){
        $result->bindValue(':'.$param,$value);
       // echo ":".$param." ".$value."|";
    }
    return $result;
}

// Comprobamos que se envien datos con la peticion usando operador ternario
function getDatos($data){
   return ($data==null) ?  false :  $data;
}


?>