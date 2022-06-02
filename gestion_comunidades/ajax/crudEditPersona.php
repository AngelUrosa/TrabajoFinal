<?php
    $json = file_get_contents('php://input');
    $objeto = json_decode($json, TRUE);

    $idPersona = $objeto['idPersona'];
    $nif = $objeto['nif'];
    $idComunidad = $objeto['idComunidad'];
    $usuario = $objeto['usuario'];
    $contraseña = $objeto['contraseña'];
    $email = $objeto['email'];
    $trabajador = $objeto['trabajador'];

    $p=new Persona($idPersona,$nif,$idComunidad,$usuario,$contraseña,$email,$trabajador);

    $tPersonas = Personas::singletonPersonas();
    $respuesta = [];
    $respuesta['resultado'] = $tPersonas->editUnaPersona($p);

    $respuesta_json = json_encode($respuesta);
    header('Content-Type:application/json');  
    echo($respuesta_json);
?>
