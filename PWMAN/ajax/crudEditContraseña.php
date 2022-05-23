<?php
    $json = file_get_contents('php://input');
    $objeto = json_decode($json, TRUE);

    $id = $objeto['id'];
    $contraseña = $objeto['contraseña'];
    $notas = $objeto['notas'];

    $tContraseñas = Contraseñas::singletonContraseñas();
    $respuesta = [];
    $respuesta['resultado'] = $tContraseñas->editUnaContraseña($id, $contraseña, $notas);

    $respuesta_json = json_encode($respuesta);
    header('Content-Type:application/json');  
    echo($respuesta_json);
?>
