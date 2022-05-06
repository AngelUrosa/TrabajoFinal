const inputs = document.querySelectorAll(".confi");

const usuario = document.getElementById("usuario");

const error = document.getElementById("error");

const constraseña = document.getElementById("constraseña");

const perfil = document.getElementById("perfil");


let formulario = document.getElementById("formulario");

let numeros = [0,1,2,3,4,5,6,7,8,9];

let mayusculas =["A", "B", "C", "D", "E", "F", "G", "H","I","J", "K", "L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];

let minusculas = ["a", "b", "c", "d", "e", "f","g", "h", "i", "j", "k", "l", "m","n","o","p","q","r","s","t","u","v","w","x","y","z"];

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
    if (event.currentTarget.id=="contraseña") { //rojo si numero

        if(event.currentTarget.value.includes(mayusculas && minusculas && numeros && event.currentTarget.value.length > 4 && simbolos)){
               
               
           }
           else{
               window.alert("La contraseña es erronea");
           }



    }
    





}