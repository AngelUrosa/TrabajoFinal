<h1>Listado de Personas</hh1>

<form id="configuracionTabla" name="configuracionTabla">
  <div class="input-group mb-3">
    <select class="form-select bg-white" aria-label="Filtro">
      <option value="1">Usuario</option>
    </select>
    <input name="filtro" type="text" class="form-control w-75 bg-darkgrey text-lightgrey" placeholder="Filtro">
  </div>
</form>
<table  class="table table-bordered table-striped text-center table-light table-hover align-items-center">
  <thead class="table text-dark bg-lightgreen">
  
    <tr>
      <th scope="col">ID Persona</th>
      <th scope="col">NIF</th>
      <th scope="col">ID Comunidad</th>
      <th scope="col">Usuario</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Email</th>
      <th scope="col">Trabajador</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
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
        {'<>': 'td','html': '${id_persona}'},
        {'<>': 'td','html': '${nif}'},
        {'<>': 'td','html': '${id_comunidad}'},
        {'<>': 'td','html': '${usuario}'},
        {'<>': 'td','html': '${contraseña}'},
        {'<>': 'td','html': '${email}'},
        {'<>': 'td','html': '${trabajador}'},
        {'<>':'td','html':'<button class="botonEliminar btn btn-danger bi bi-x-circle-fill" value="${id_persona}:${usuario}">Borrar</button>'},
		    {'<>':'td','html':'<button class="botonAdd btn btn-succes bi bi-x-circle-fill">Añadir</button>'},
        {'<>':'td','html':'<button class="botonEditar btn btn-primary bi bi-x-circle-fill" value="${id_persona}:${nif}:${id_comunidad}:${usuario}:${contraseña}:${email}:${trabajador}">Editar</button>'}
        
	    ]}
    );
    //caInicializarBotonesEliminar('resultado', 'ajax.php?script=crudDeleteCliente');

    document.getElementById('resultado').addEventListener('click', (evento) => {
      
      // Comprobar si es el boton eliminar
      
      if(evento.target.className.startsWith('botonEliminar')){
        const value = evento.target.value

// Si no está definido, busco el botón padre donde sí está
if (!value) {
  value = document.getElementById(evento.target).parent('.botonEliminar').value();
}

        const valores = value.split(':');
        const idPersona = valores[0];
        console.log("a"+ idPersona);
        const usuario = valores[1];
        const mensaje = `
        <p>¿Está seguro de que quiere eliminar la Persona ` + usuario + `?</p> (ID: ` + idPersona + `)`;

        mostrarModalEliminar(mensaje, () => {
          caEliminarRegistroAjax('ajax.php?script=crudDeletePersona', idPersona, () => {
            document.getElementById(evento.target).parents('resultado tr').remove();
            mostrarAlert('Se ha eliminado el registro satisfactoriamente');
          },

          () => {
            mostrarAlert('Ha habido un error al eliminar el registro');
          });
        });
      }
        
      
      // Obtengo el valor en el botón
      if(evento.target.className.startsWith('botonAdd')){
        mostrarModalAdd(() => {
                //  const idPersona = $("#id_persona").val().trim();
                 const nif = document.getElementById("nif").value().trim();
                 const idComunidad = document.getElementById("idComunidad").value().trim();
                 const usuario = document.getElementById("usuario").value().trim();
                 const contraseña = document.getElementById("contraseña").value().trim();
                 const email = document.getElementById("email").value().trim();
                 const trabajador = document.getElementById("trabajador").value().trim();
                caAñadirRegistroAjax('ajax.php?script=crudAddPersona', nif, idComunidad, usuario, contraseña, email, trabajador, () => {
                    enviarFormulario2(document.getElementById(".configuracionTabla")[0], document.getElementById("resultado")[0]);
                    mostrarAlert('Ha habido un error al añadir el registro');
                }, () => {
                    mostrarAlert('Se ha añadido el registro satisfactoriamente');
                });
            });

    };

    if(evento.target.className.startsWith('botonEditar')){
      let value = evento.target.value
            
            if (!value) {
              value = document.getElementById(evento.target).parent('.botonEditar').val();
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
                
                 const idPersona = document.getElementById("idPersona2").value().trim();
                 const nif = document.getElementById("nif2").value().trim();
                 const idComunidad = document.getElementById("idComunidad2").value().trim();
                 const usuario = document.getElementById("usuario2").value().trim();
                 const contraseña = document.getElementById("contraseña2").value().trim();
                 const email = document.getElementById("email2").value().trim();
                 const trabajador = document.getElementById("trabajador2").value().trim();



                caEditarRegistroAjax('ajax.php?script=crudEditPersona',idPersona ,nif, idComunidad, usuario, contraseña, email, trabajador, () => {
                    enviarFormulario2(document.getElementById("configuracionTabla")[0], document.getElementById("resultado")[0]);
                    mostrarAlert('Se ha editado el registro satisfactoriamente');
                }, () => {
                    mostrarAlert('Ha habido un error al editar el registro');
                });
            });

    }

  });
});
</script>






<!-- <html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h2 style="text-align:center">Curso de PHP y MySQL</h2>
			</div>
			
			<div class="row">
				<a href="index.php?principal=Intefaz\nuevo.php" class="btn btn-primary">Nuevo Registro</a>			
			</div>
		</div>
	</body>
	
</html> -->