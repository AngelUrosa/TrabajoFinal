$(document).ready(function(){
    $("tabla").dynamicTable({

        columns: [{
            text: "ID Persona",
            key: "id_persona"
        }, {
            text: "NIF",
            key: "nif" 
        },
        {
            text: "ID COMUNIDAD",
            key: "id_comunidad" 
        },
        {
            text: "Usuario",
            key: "usuario" 
        },
        {
            text: "Contraseña",
            key: "contraseña" 
        },
        {
            text: "Email",
            key: "email" 
        },
        {
            text: "Trabajador",
            key: "trabajador" 
        },
        ],

        data:[{

        }],


        buttons:{
            addButton: '<input type="button" value="Nuevo" class="btn btn-success"/>',
            cancelButton: '<input type="button" value="Cancelar" class="btn btn-primary"/>',
            deleteButton: '<input type="button" value="Eliminar" class="btn btn-danger"/>',
            editButton: '<input type="button" value="Editar" class="btn btn-primary"/>',
            saveButton: '<input type="button" value="Guardar" class="btn btn-success"/>',
        },
        showActuionColumn:true,

        getControl: function(columnKey){

        }
    });
});