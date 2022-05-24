<?php
    $tPedido = Pedidos::singletonPedidos();
    $dataPoints = $tPedido->getPedidosPorMes();

    //Tenemos que convertir el objeto en un json
    $respuesta_json = json_encode($dataPoints);

    //prepara la respuesta HTTP
    header('Content-Type:application/json');
    echo($respuesta_json);
?>