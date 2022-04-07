<?php
session_start();

$nombre = $_POST['user'];
$password = $_POST['password'];


require_once ‘conexion.php’;

// se asume conexion en $conn incluido desde conexion.php, ejemlo:

// $conn= mysqli_connect("server", "mi_usuario", "mi_contraseña", "mi_bd");


// añadiría un limit 1 a la consulta pues solo esperamos un registro


$consulta = mysqli_query ($conn, "SELECT * FROM sesion WHERE user = '$nombre' AND pass = '$password'");


// esto válida si la consulta se ejecuto correctamente o no

// pero en ningún caso válida si devolvió algún registro


if(!$consulta){

// echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " .


echo mysqli_error($mysqli);

// si la consulta falla es bueno evitar que el código se siga ejecutando
exit;


}

// este else sobra


//else {


//print "Bienvenido";
//}


// validemos pues si se obtuvieron resultados


// Obtenemos los resultados con mysqli_fetch_assoc


// si no hay resultados devolverá NULL que al convertir a boleano para ser evaluado en el

if será FALSE

if($user = mysqli_fetch_assoc($consulta)) {


// el usuario y la pwd son correctas


} else {

// Usuario incorrecto o no existe

}

?>