<?php 


function cargarClasesPojos($nombreClases) {

if (file_exists("pojos/".$nombreClases.'.php')) {
  require_once("pojos/".$nombreClases.'.php');
}

}

function cargarClasesPersistencia($nombreClases) {

  if (file_exists("persistencia/".$nombreClases.'.php')) {
    require_once("persistencia/".$nombreClases.'.php');
  }

}

spl_autoload_register("cargarClasesPojos");
spl_autoload_register("cargarClasesPersistencia");



?>