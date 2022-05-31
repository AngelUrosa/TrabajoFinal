<?php
    // Pasa la entrada a json
    $json = file_get_contents('php://input');

    // Aquí tenemos un array con los parámetros de entrada
    $objeto = json_decode($json, TRUE);

    // Obtiene los valores que vienen en el array asociativo
    $idPersona = $objeto['id'];

    // Pasamos a obtener los clientes de la base de datos
    $tPersonas = Personas::singletonPersonas();
     
    // Elimina el cliente y guarda el resutlado
    $respuesta = [];
    $respuesta['resultado'] = $tPersonas->borrarPersonaPorId($idPersona);

    // Tenemos que convertir el objeto en un json
    $respuesta_json = json_encode($respuesta);

    // Prepara la respuesta HTTP
    header('Content-Type:application/json');  
    echo($respuesta_json);
?>
