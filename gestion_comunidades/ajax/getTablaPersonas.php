<?php
    //Pasa la entrada a json
    $json = file_get_contents('php://input');

    //aqui tenemos un array con los parametros de entrada
    $objeto = json_decode($json,TRUE);

    //Obtiene los valores que vienen en el array asociativo
    $nombre = $objeto['filtro'];

    //pasamos a obtener los clientes de la base de datos
    $tPersonas = Personas::singletonPersonas();
    $respuesta = $tPersonas->getPersonaPorUsuarioFA($usuario);

    //Tenemos que convertir el objeto en un json
    $respuesta_json = json_encode($respuesta);
    
    //prepara la respuesta HTTP
    header('Content-Type:application/json');
    echo($respuesta_json);
?>