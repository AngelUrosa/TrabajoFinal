<?php
    $json = file_get_contents('php://input');
    $objeto = json_decode($json, TRUE);

    $usuario = $objeto['usuario'];

    $tPersonas = Personas::singletonPersonas();
    $respuesta = [];
    $respuesta['resultado'] = $tPersonas->addUnaPersona($p);

    $respuesta_json = json_encode($respuesta);
    header('Content-Type:application/json');  
    echo($respuesta_json);
?>
