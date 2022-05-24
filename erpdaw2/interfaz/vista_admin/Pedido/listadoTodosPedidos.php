<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset= "utf-8" > 
    <meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" > 
    
    
 
    <!-- Bootstrap CSS en la web--> 

    <link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin= "anonymous" > 

<?php

  $tPedido = Pedidos::singletonPedidos();
    $tablaPedidos = $tPedido->listTodosPedidos();
    $tProducto  = Productos::singletonProductos();
    $tlp = LineasPedidos::singletonLineasPedidos();

    ?>
    
    <link rel="stylesheet" href="estilos.css">
    <title>Listado un Pedido</title>
</head>
<body>
    <h1>Listado un Pedido</h1>

    <br>
<?php
if ($tablaPedidos != null) {
    echo "<div class= 'accordion' id= 'accordionExample' >";

    $i = 1;
    foreach ($tablaPedidos as $p) {
      $tablaLineasPedidos = $tlp->getLineasUnPedido($p->getIdPedido());
    
        echo
        "<div class= 'card w-100'>";
            echo               
            "<div class= 'card-header' id= 'heading$i'> 
                <div class= 'col-sm-5 float-left'>
                    <h5 class= 'mb-0' > 
                        <button class= 'btn btn-link' type= 'button' data-toggle= 'collapse' data-target= '#collapse$i' aria-expanded= 'false'      aria-controls= 'collapse$i'" . " >" .
                        
                        "Número: " . $p->getIdPedido() .
                        " | Fecha: " . $p->getFechaPedido() .
                        " | Cliente: " . $p->getIdCliente() .
                        " | Fecha Pago: " . $p->getFechaPago() .
                        "
                        </button> 
                    </h5>".
                        " 
                    

                </div>";


                ?>

               
            </div> 
    <?php

                    



        echo "<div id= 'collapse$i'    class= 'collapse toggle' aria-labelledby= 'heading$i' data-parent= '#accordionExample' > 
                <div class= 'card-body' >";
            //pintamos la cabecera de la tabla
        echo "<table class='table table-hover'>
                <thead>
                <tr class='table-success'>
                    <td>Referencia</td>
                    <td>Unidades</td>
                    <td>Descripcion</td>
                    <td>PVP</td>
                    <td>IVA</td>
                    <td>Subtotal</td>
                    <td>Foto</td>
                </tr>
                </thead>";
            
            //y ahora, montamos un bucle para pintar cada línea de la tabla. En cada línea va un producto.
            foreach ($tablaLineasPedidos as $lp) {
              
                $tablaFotoProducto=$tProducto->getUnIdProducto($lp->getIdProducto()); //IDPEDIDO
              
                            pintarTablaLineasPedido($lp);
                           
                             foreach ($tablaFotoProducto as $tfp){
                            
                            pintarTablaProducto($tfp);
                     
                        }
                        
                     
                        };
                  echo "</table>";
                  echo "</div>";
            echo "</div> 
        </div>";
        $i++;

    }
    echo "</div> ";

}




function pintarTablaLineasPedido($lp){

          
            echo "<tr>";
            echo "<td class='bg-success'>".$lp->getIdProducto()."</td>";
            echo "<td>".$lp->getUnidades()."</td>";
            echo "<td>".$lp->getDescripcion()."</td>";
            echo "<td>".$lp->getPvp()."</td>";
            echo "<td>".$lp->getTipoIva()."</td>";
            $subtotal=$lp->getUnidades()*$lp->getPvp();
            echo "<td style='text-align:right'>" . number_format($subtotal,2)." €" . "</td>";
                   
}

function pintarTablaProducto($tfp){

            echo "<td>". "<img width='30%' src='interfaz/". $tfp->getRutaFoto(). "' class='img-thumbnail'></td>";
            echo " </tr>";
}



                    
        
?>
    
    
</body>


</html>