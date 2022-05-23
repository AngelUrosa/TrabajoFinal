<?php
    //Pasa la entrada a json
    $json = file_get_contents('php://input');

    //aqui tenemos un array con los parametros de entrada
    $objeto = json_decode($json,TRUE);

    //Obtiene los valores que vienen en el array asociativo
    $valor = $objeto['filtro'];
    $filtro = $objeto['filtroSelect'];

    //pasamos a obtener los clientes de la base de datos
    $tContraseñas = Contraseñas::singletonContraseñas();

    if ($filtro == 1) {
        $respuesta = $tContraseñas->getContraseñaPorNombre($valor);
    } else if ($filtro == 2) {
        $respuesta = $tContraseñas->getContraseñaPorWeb($valor);
    } else {
        $respuesta = $tContraseñas->getContraseñaPorNotas($valor);
    }
    
    //Tenemos que convertir el objeto en un json
    $respuesta_json = json_encode($respuesta);
    
    //prepara la respuesta HTTP
    header('Content-Type:application/json');
    echo($respuesta_json);
?>