<?php
    // Pasa la entrada a json
    $json = file_get_contents('php://input');

    // Aquí tenemos un array con los parámetros de entrada
    $objeto = json_decode($json, TRUE);

    // Obtiene los valores que vienen en el array asociativo
    $id = $objeto['id'];

    // Pasamos a obtener los clientes de la base de datos
    $tClientes = Clientes::singletonClientes();
     
    // Elimina el cliente y guarda el resutlado
    $respuesta = [];
    $respuesta['resultado'] = $tClientes->borrarClientePorId($id);

    // Tenemos que convertir el objeto en un json
    $respuesta_json = json_encode($respuesta);

    // Prepara la respuesta HTTP
    header('Content-Type:application/json');  
    echo($respuesta_json);
?>
