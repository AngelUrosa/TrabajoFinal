<?php
     // Pasa la entrada a json
    $json = file_get_contents('php://input');

     // Aquí tenemos un array con los parámetros de entrada
    $objeto = json_decode($json, TRUE);

    // Obtiene los valores que vienen en el array asociativo
    $provincia = $objeto['parametro'];

    // Devuelve el contenido para un hipotético combo de poblaciones por provincia
    $json = "";
    
    // Saca una lista de ciudades en función de la provincia elegida
    if ($provincia == 1) {

        $json = '['.
            '{"id":"1","nombre":"Cáceres"},'. 
            '{"id":"2","nombre":"Coria"}'.
        ']';	

    } else if ($provincia == 2) {

        $json = '['.
            '{"id":"3","nombre":"Badajoz"},'. 
            '{"id":"4","nombre":"Olivenza"}'.
        ']';	    
    }

    header('Content-Type:application/json');  
    echo $json;	

?>
