<div>
    <h1 aria-label="Título"><strong>Listado de contraseñas</strong></h1>
    <div class="pt-3 border-top"></div>
    <form id="configuracionTabla" name="configuracionTabla">
        <div id="campoFiltro" class="input-group mb-3">
            <select id="filtroSelect" class="form-select" aria-labelledby="campoFiltro">
                <option value="1">Nombre del sitio</option>
                <option value="2">Web</option>
                <option value="3">Notas</option>
            </select>
            <input id="filtro" name="filtro" type="text" class="form-control w-50" placeholder="Introduce el texto a buscar">
        </div>
    </form>
    <button class="btn btn-primary bi bi-plus float-end mb-3" id="botonAdd" aria-label="Botón añadir">Añadir</button>
    <table class="table table-striped table-hover text-center align-items-center" id="tablaRegistros">
        <thead>
            <tr class="bg-tertiary text-white">
                <th scope="col">Nombre</th>
                <th scope="col">Cuenta</th>
                <th scope="col" class='d-none d-lg-table-cell'>URL</th>
                <th scope="col" class='d-none d-lg-table-cell'>Notas</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody id="resultado"></tbody>
    </table>
    <div class="box">
        <ul class="pagination">
            
        </ul>
    </div>
</div>
<script>
    window.addEventListener('load', function() {
        inicializarTabla(
            $("#configuracionTabla")[0],
            $("#resultado")[0],
            'ajax.php?script=getTablaContraseñas',
            
            {'<>': 'tr','html': [
            {'<>': 'th','html': '${nombre}'},
            {'<>': 'th','html': '${usuario}'},
            {'<>': 'th','html': '${url}','class': 'd-none d-lg-table-cell'},
            {'<>': 'th','html': '${notas}','class': 'd-none d-lg-table-cell'},
            {'<>':'th','html':'<button class="botonVer ms-2 btn btn-primary bi bi-eye-fill" value="${nombre}:${password}" aria-label="Botón ver contraseña"></button><button class="botonAcceder ms-2 btn btn-secondary bi bi-globe" value="${url}" aria-label="Botón acceder página"></button><button class="botonEditar ms-2 btn btn-lightgrey bi bi-pencil-fill" value="${id};${nombre};${usuario};${url};${password};${notas}" aria-label="Botón editar"></button><button class="botonEliminar ms-2 btn btn-danger bi bi-x-circle" value="${id}:${nombre}:${usuario}" aria-label="Botón eliminar"></button>'}
            ]},

            document.getElementById('filtroSelect'),
            document.getElementById('filtro')
        );

        // Botón añadir
        $('#botonAdd').on('click', () => {
            mostrarModalAdd(() => {
                const nombre = $("#nombre").val().trim();
                const usuario = $("#usuario").val().trim();
                const url = $("#url").val().trim();
                const contraseña = $("#contraseña").val().trim();
                const notas = $("#notas").val().trim();
                caAñadirRegistroAjax('ajax.php?script=crudAddContraseña', nombre, usuario, url, contraseña, notas, () => {
                    enviarFormulario2($("#configuracionTabla")[0], $("#resultado")[0]);
                    mostrarAlert('Se ha añadido el registro satisfactoriamente');
                }, () => {
                    mostrarAlert('Ha habido un error al añadir el registro');
                });
            });
        });

        // Botón mostrar contraseña
        $('#resultado').on('click', '.botonVer', (evento) => {
            const value = evento.target.value;
            const valores = value.split(':');
            const nombre = valores[0];
            const contraseña = valores[1];
            caAñadirRegistroAjax2('ajax.php?script=crudAddRegistro', nombre, () => {
                    enviarFormulario2($("#configuracionTabla2")[0], $("#resultado2")[0]);
                    console.log('Registro creado');
                }, () => {
                    console.log('Registro no creado');
                });
            mostrarModalContraseña(contraseña);
        });

        // Botón acceder a la url
        $('#resultado').on('click', '.botonAcceder', (evento) => {
            const url = evento.target.value;

            window.open(url);
        });

        // Botón editar
        $('#resultado').on('click', '.botonEditar', (evento) => {
            const value = evento.target.value
            
            if (!value) {
                value = $(evento.target).parent('.botonEditar').val();
            }

            const valores = value.split(';');
            const id = valores[0];
            const nombre = valores[1];
            const usuario = valores[2];
            const url = valores[3];
            const contraseña = valores[4];
            const notas = valores[5];
            mostrarModalEdit(nombre, usuario, url, contraseña, notas, () => {
                const nuevaContraseña = $("#contraseña3").val().trim();
                const nuevasNotas = $("#notas2").val().trim();
                caEditarRegistroAjax('ajax.php?script=crudEditContraseña', id, nuevaContraseña, nuevasNotas, () => {
                    enviarFormulario2($("#configuracionTabla")[0], $("#resultado")[0]);
                    mostrarAlert('Se ha editado el registro satisfactoriamente');
                }, () => {
                    mostrarAlert('Ha habido un error al editar el registro');
                });
            });
        });

        // Botón borrar entrada
        $('#resultado').on('click', '.botonEliminar', (evento) => {
            const value = evento.target.value
            
            if (!value) {
                value = $(evento.target).parent('.botonEliminar').val();
            }

            const valores = value.split(':');
            const id = valores[0];
            const nombre = valores[1];
            const usuario = valores[2];
            const mensaje = `
            <p>¿Está seguro de que quiere eliminar la entrada ` + id + `?</p> (Página: ` + nombre + `, usuario: `+ usuario + `)`;

            mostrarModalEliminar(mensaje, () => {
                caEliminarRegistroAjax('ajax.php?script=crudDeleteContraseña', id, () => {
                    $(evento.target).parents('#resultado tr').remove();
                    enviarFormulario2($("#configuracionTabla")[0], $("#resultado")[0]);
                    mostrarAlert('Se ha eliminado el registro satisfactoriamente');
                }, () => {
                    mostrarAlert('Ha habido un error al eliminar el registro');
                });
            });
        });
    });
</script>