<?php
    // Devuelve el contenido para un hipotético combo de poblaciones por provincia
    $html = "";
    
    // Saca una lista de ciudades en función de la provincia elegida
    if ($_REQUEST["provincia"]==1) {

        $html = '
        <option value="1">Cáceres</option>
        <option value="2">Cória</option>
        ';	
    } else if ($_REQUEST["provincia"]==2) {

        $html = '
        <option value="3">Badajoz</option>
        <option value="4">Olivenza</option>
        ';	
    }

    echo $html;	
?>
