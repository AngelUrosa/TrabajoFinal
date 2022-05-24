<?php
    require_once "../persistencia/Conexion.php";

    // Pasa la entrada a json
    $json = file_get_contents('php://input');

    // Aquí tenemos un array con los parámetros de entrada
    $objeto = json_decode($json, TRUE);

    // Obtiene los valores que vienen en el array asociativo
    $tabla = $objeto['tabla'];
    $id = $objeto['id'];

    // Pasamos a obtener los clientes de la base de datos
    $conexion = Conexion::singleton_conexion();
    $consulta = "DELETE FROM ".$tabla." where id = ?";
    $query = $conexion->preparar($consulta);
    $query->bindParam(1, $id);
    $query->execute();
    
    // Obtiene todos los clientes
    $respuesta = [];
    $respuesta['resultado'] = $query->rowCount();

    // Tenemos que convertir el objeto en un json
    $respuesta_json = json_encode($respuesta);

    // Prepara la respuesta HTTP
    header('Content-Type:application/json');  
    echo($respuesta_json);
?>