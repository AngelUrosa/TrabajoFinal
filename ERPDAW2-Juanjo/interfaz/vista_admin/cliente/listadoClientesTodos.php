<h1>Listado de Clientes</h1>

<form id="configuracionTabla" name="configuracionTabla">
  <div class="input-group mb-3">
    <select class="form-select bg-white" aria-label="Filtro">
      <option value="1">Nombre</option>
      <option value="2">Apellido</option>
      <option value="3">NIF</option>
      <option value="4">ID</option>
    </select>
    <input name="filtro" type="text" class="form-control w-75 bg-darkgrey text-lightgrey" placeholder="Filtro">
  </div>
</form>
<table  class="table table-bordered table-striped text-center table-light table-hover align-items-center">
  <thead class="table text-white bg-lightgreen">
    <tr>
      <th scope="col">ID cliente</th>
      <th scope="col">ID usuario</th>
      <th scope="col">Nombre</th>
      <th scope="col">Primer apellido</th>
      <th scope="col">Segundo apellido</th>
      <th scope="col">NIF</th>
      <th scope="col">Código postal</th>
      <th scope="col">Nº cuenta</th>
      <th scope="col">¿Cómo nos conoció?</th>
      <th scope="col">Activo</th>
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
      'ajax.php?script=getTablaClientes',
      
      //Plantilla
      {'<>': 'tr','html': [
        {'<>': 'td','html': '${id_cliente}'},
        {'<>': 'td','html': '${id_usuario}'},
        {'<>': 'td','html': '${nombre}'},
        {'<>': 'td','html': '${apellido1}'},
        {'<>': 'td','html': '${apellido2}'},
        {'<>': 'td','html': '${nif}'},
        {'<>': 'td','html': '${cod_postal}'},
        {'<>': 'td','html': '${numcta}'},
        {'<>': 'td','html': '${como_nos_conocio}'},
        {'<>': 'td','html': '${activo}'},
        {'<>':'td','html':'<button class="botonEliminar btn btn-danger bi bi-x-circle-fill" value="${id}:${nombre}"></button>'}
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
      <p>¿Está seguro de que quiere eliminar el cliente ` + nombre + `?</p> (ID: ` + id + `)`;

      mostrarModalEliminar(mensaje, () => {
        caEliminarRegistroAjax('ajax.php?script=crudDeleteCliente', id, () => {
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