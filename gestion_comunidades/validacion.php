<script type="text/javascript">

const inputs = document.querySelectorAll(".confi");

const usuario = document.getElementById("usuario");

const constraseña = document.getElementById("constrasena");

const perfil = document.getElementById("perfil");


let formulario = document.getElementById("formulario");

let numeros = [0,1,2,3,4,5,6,7,8,9];

let mayusculas =["A", "B", "C", "D", "E", "F", "G", "H","I","J", "K", "L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];

Let minusculas = ["a", "b", "c", "d", "e", "f","g", "h", "i", "j", "k", "l", "m","n","o","p","q","r","s","t","u","v","w","x","y","z"];

let final = [".es", ".com", ".inf", ".org", ".edu", ".pro", ".soy", ".me"];

let simbolos =["$", "%", "&" ,"#"];


let errorUsuario = false;
let errorContraseña = false;
let errorPerfil = false;

inputs.forEach(input => {
    console.log(input);

    input.addEventListener('change', cambio);
    input.addEventListener('focus',ayuda);
    input.addEventListener('keyup',enter);
});


function cambio(event) {
    if (event.currentTarget.value.trim()=="") {
        
        window.alert("Los campos no pueden estar vacios");

    } else{
        event.currentTarget.style.borderColor="black";
        errorNombre=false;
    }

    if (event.currentTarget.id=="usuario") { 
        
            if(event.currentTarget.value.includes("@")){
               
                errorApellidos=false;
            }
            else{
                window.alert("Debe tener un @ en el usuario");
            }

            if(event.currentTarget.value.includes(final)){
               

           }
           else{
               window.alert("Debe tener un .com , .es ...etc al final del usuario");
           }

            
        
    }
    if (event.currentTarget.id=="contraseña1") { //rojo si numero

        if(event.currentTarget.value.includes(mayusculas && minusculas && numeros && event.currentTarget.value.length > 4 && simbolos)){
               
               
           }
           else{
               window.alert("La contraseña es erronea");
           }



    }
    





}



</script>

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

