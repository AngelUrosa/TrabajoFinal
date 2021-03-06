<h1>Listado de Personas</hh1>

<form id="configuracionTabla" name="configuracionTabla">
  <div class="input-group mb-3">
    <select class="form-select bg-white" aria-label="Filtro">
      <option value="1">Usuario</option>
    </select>
    <input name="filtro" type="text" class="form-control w-75 bg-darkgrey text-lightgrey" placeholder="Filtro">
  </div>
</form>
<div id="holahola">
<button class="botonHola btn btn-succes bi bi-x-circle-fill">hola</button>
</div>



<table  class="table table-bordered table-striped text-center table-light table-hover align-items-center">
  <thead class="table text-dark bg-lightgreen">
  
    <tr>
      <th scope="col" class="h5">ID Persona</th>
      <th scope="col" class="h5">NIF</th>
      <th scope="col" class="h5">ID Comunidad</th>
      <th scope="col" class="h5">Usuario</th>
      <th scope="col" class="h5">Contraseña</th>
      <th scope="col" class="h5">Email</th>
      <th scope="col" class="h5">Trabajador</th>
    </tr>
  </thead>
  <tbody id='resultado'>
  </tbody>
</table>

<script src="js/tablas_ajax.js" defer></script>
<script src="js/crud_ajax.js" defer></script>
<script src="js/modal.js" defer></script>
<!-- <script src="js/formulario-bootstrap.js" defer></script> -->
<script>
  window.addEventListener('load', function () {

    inicializarTabla(
      //Filtro de entrada
      document.getElementById('configuracionTabla'),

      //Tabla con el resultado
      document.getElementById('resultado'),

      //URL para descargar los datos
      'ajax.php?script=getTablaPersonas',
      
      //Plantilla
      {'<>': 'tr','html': [
        {'<>': 'td class="h5"','html': '${id_persona}'},
        {'<>': 'td class="h5"','html': '${nif}'},
        {'<>': 'td class="h5"','html': '${id_comunidad}'},
        {'<>': 'td class="h5"','html': '${usuario}'},
        {'<>': 'td class="h5"','html': '${contraseña}'},
        {'<>': 'td class="h5"','html': '${email}'},
        {'<>': 'td class="h5"','html': '${trabajador}'},
        {'<>':'td','html':'<button class="botonEliminar btn btn-danger bi bi-x-circle-fill" value="${id_persona}:${usuario}">Borrar</button>'},
		    {'<>':'td','html':'<button class="botonAdd btn btn-succes bi bi-x-circle-fill">Añadir</button>'},
        {'<>':'td','html':'<button class="botonEditar btn btn-primary bi bi-x-circle-fill" value="${id_persona}:${nif}:${id_comunidad}:${usuario}:${contraseña}:${email}:${trabajador}">Editar</button>'},
        {'<>':'td','html':'<button class="botonHola btn btn-succes bi bi-x-circle-fill">hola</button>'}
        
	    ]}
    );
    //caInicializarBotonesEliminar('resultado', 'ajax.php?script=crudDeleteCliente');

    $('#resultado').on('click', '.botonHola', (evento) => {

      alert("Hola mundo");

  });


  $('#holahola').on('click', '.botonHola', (evento) => {

alert("Hola mundo");

});

    $('#resultado').on('click', '.botonEliminar', (evento) => {
      // Obtengo el valor en el botón
      const value = evento.target.value

      // Si no está definido, busco el botón padre donde sí está
      if (!value) {
        value = $(evento.target).parent('.botonEliminar').val();
      }


      alert("Hola mundo");
      const valores = value.split(':');
      const idPersona = valores[0];
      console.log("a"+ idPersona);
      const usuario = valores[1];
      const mensaje = `
      <p>¿Está seguro de que quiere eliminar la Persona ` + usuario + `?</p> (ID: ` + idPersona + `)`;

      mostrarModalEliminar(mensaje, () => {
        caEliminarRegistroAjax('ajax.php?script=crudDeletePersona', idPersona, () => {
          $(evento.target).parents('#resultado tr').remove();
          mostrarAlert('Se ha eliminado el registro satisfactoriamente');
        },

        () => {
          mostrarAlert('Ha habido un error al eliminar el registro');
        });
      });
    });

    $('#resultado').on('click','.botonAdd', () => {
            mostrarModalAdd(() => {
                //  const idPersona = $("#id_persona").val().trim();
                 const nif = $("#nif").val().trim();
                 const idComunidad = $("#idComunidad").val().trim();
                 const usuario = $("#usuario").val().trim();
                 const contraseña = $("#contraseña").val().trim();
                 const email = $("#email").val().trim();
                 const trabajador = $("#trabajador").val().trim();
                caAñadirRegistroAjax('ajax.php?script=crudAddPersona', nif, idComunidad, usuario, contraseña, email, trabajador, () => {
                    enviarFormulario2($(".configuracionTabla")[0], $("#resultado")[0]);
                    mostrarAlert('Ha habido un error al añadir el registro');
                }, () => {
                    mostrarAlert('Se ha añadido el registro satisfactoriamente');
                });
            });
        });
        
        $('#resultado').on('click', '.botonEditar', (evento) => {
            let value = evento.target.value
            
            if (!value) {
              value = $(evento.target).parent('.botonEditar').val();
             } 

            const valores = value.split(':');
            const idPersona = valores[0];
            console.log("ID persona"+ idPersona);
            const nif = valores[1];
            console.log("ID persona"+ nif);
            const idComunidad = valores[2];
            const usuario = valores[3];
            const contraseña = valores[4];
            const email = valores[5];
            const trabajador = valores[6];
            mostrarModalEdit(idPersona, nif, idComunidad, usuario, contraseña, email, trabajador, () => {


                // const nuevaContraseña = $("#contraseña3").val().trim();
                // const nuevasNotas = $("#notas2").val().trim();
                
                 const idPersona = $("#idPersona2").val().trim();
                 const nif = $("#nif2").val().trim();
                 const idComunidad = $("#idComunidad2").val().trim();
                 const usuario = $("#usuario2").val().trim();
                 const contraseña = $("#contraseña2").val().trim();
                 const email = $("#email2").val().trim();
                 const trabajador = $("#trabajador2").val().trim();



                caEditarRegistroAjax('ajax.php?script=crudEditPersona',idPersona ,nif, idComunidad, usuario, contraseña, email, trabajador, () => {
                    enviarFormulario2($("#configuracionTabla")[0], $("#resultado")[0]);
                    mostrarAlert('Se ha editado el registro satisfactoriamente');
                }, () => {
                    mostrarAlert('Ha habido un error al editar el registro');
                });
            });
        });

  });
</script>






