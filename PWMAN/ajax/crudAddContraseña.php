<?php
    $json = file_get_contents('php://input');
    $objeto = json_decode($json, TRUE);

    $nombre = $objeto['nombre'];
    $usuario = $objeto['usuario'];
    $url = $objeto['url'];
    $contraseña = $objeto['contraseña'];
    $notas = $objeto['notas'];

    $tContraseñas = Contraseñas::singletonContraseñas();
    $respuesta = [];
    $respuesta['resultado'] = $tContraseñas->addUnaContraseña($nombre, $usuario, $url, $contraseña, $notas);

    $respuesta_json = json_encode($respuesta);
    header('Content-Type:application/json');  
    echo($respuesta_json);
?>
