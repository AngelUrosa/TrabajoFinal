<?php
    $json = file_get_contents('php://input');
    $objeto = json_decode($json, TRUE);

    $nombre = $objeto['nombre'];

    $tRegistros = Registros::singletonRegistros();
    $respuesta = [];
    $respuesta['resultado'] = $tRegistros->addUnRegistro($nombre);

    $respuesta_json = json_encode($respuesta);
    header('Content-Type:application/json');  
    echo($respuesta_json);
?>
