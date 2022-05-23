<?php
    function cargarClasesPojos($nombreClase) {
        if (file_exists("pojos/".$nombreClase . '.php')) {
            require_once "pojos/". $nombreClase . '.php';
        }
    }

    spl_autoload_register('cargarClasesPojos');

    function cargarClasesPersistencia($nombreClase) {
        if (file_exists("persistencia/".$nombreClase . '.php')) {
            require_once "persistencia/". $nombreClase . '.php';
        }
    }

    spl_autoload_register('cargarClasesPersistencia');

    if (isset($_GET['script'])) {
        require_once "ajax/".$_GET['script'].'.php';
    } else {
        print("ERROR");
    }   
?>