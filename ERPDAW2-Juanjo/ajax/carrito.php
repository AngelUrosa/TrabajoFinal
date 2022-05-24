<?php
    // Pasa la entrada a json
    $json = file_get_contents('php://input');

    // Aquí tenemos un array con los parámetros de entrada
    $objeto = json_decode($json, TRUE);

    // Obtiene los valores que vienen en el array asociativo
    $id_producto = $objeto['id_producto'];
    $unidades = $objeto['unidades'];

    $tProductos = Productos::singletonProductos();
    $lineaPedido = $tProductos -> getProductoPorIdProducto($id_producto);

    // Añade el producto a la cesta
    $cesta = $_SESSION['cesta'];
    array_push($_SESSION['cesta'], $lineaPedido)
     
    $respuesta = [];
    $respuesta['resultado'] = $tProductos->borrarClientePorId($id);

    // Tenemos que convertir el objeto en un json
    $respuesta_json = json_encode($respuesta);

    // Prepara la respuesta HTTP
    header('Content-Type:application/json');  
    echo($respuesta_json);
?>
