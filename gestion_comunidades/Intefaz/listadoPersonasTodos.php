<h1>Listado de Usuarios</h1>

<form id="configuracionTabla" name="configuracionTabla">
  <div class="input-group mb-3">
    <select class="form-select bg-white" aria-label="Filtro">
      <option value="1">Usuario</option>
      <option value="2">NIF</option>
    </select>
    <input name="filtro" type="text" class="form-control w-75 bg-darkgrey text-lightgrey" placeholder="Filtro">
  </div>
</form>
<table  class="table table-bordered table-striped text-center table-light table-hover align-items-center">
  <thead class="table text-white bg-lightgreen">
    <tr>
      <th scope="col">ID Persona</th>
      <th scope="col">NIF</th>
      <th scope="col">ID Comunidad</th>
      <th scope="col">Usuario</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Email</th>
      <th scope="col">Trabajador</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody id='resultado'>
  </tbody>
</table>

<script src="js/tablas_ajax.js" defer></script>
<script src="js/crud_ajax.js" defer></script>
<script src="js/modal.js" defer></script>
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
        {'<>':'td','html':'<button class="botonEliminar btn btn-danger bi bi-x-circle-fill" value="${id}:${usuario}"></button>'}
	    ]}
    );
    //caInicializarBotonesEliminar('resultado', 'ajax.php?script=crudDeleteCliente');

    $('#resultado').on('click', '.botonEliminar', (evento) => {
      // Obtengo el valor en el botón
      const value = evento.target.value

      // Si no está definido, busco el botón padre donde sí está
      if (!value) {
        value = $(evento.target).parent('.botonEliminar').val();
      }

      const valores = value.split(':');
      const id = valores[0];
      const nombre = valores[1];
      const mensaje = `
      <p>¿Está seguro de que quiere eliminar la persona ` + usuario + `?</p> (ID: ` + id + `)`;

      mostrarModalEliminar(mensaje, () => {
        caEliminarRegistroAjax('ajax.php?script=crudDeletePersona', id, () => {
          $(evento.target).parents('#resultado tr').remove();
          mostrarAlert('Se ha eliminado el registro satisfactoriamente');
        },

        () => {
          mostrarAlert('Ha habido un error al eliminar el registro');
        });
      });
    });
  });
</script>