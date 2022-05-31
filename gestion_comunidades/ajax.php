<?php
require_once "autoload.php";

    // Script a invocar
    if (isset($_GET['script'])) {
        require_once "ajax/".$_GET['script'].'.php';
    } else {
        print("ERROR");
    }   
?>