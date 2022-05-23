<div>
    <h1 aria-label="Título"><strong>Registros</strong></h1>
    <div class="pt-3 border-top"></div>
    <form id="configuracionTabla2" name="configuracionTabla2">
        <div id="campoFiltro2" class="input-group mb-3">
            <select id="filtroSelect2" class="form-select" aria-labelledby="campoFiltro2">
                <option value="1">Nombre del sitio</option>
            </select>
            <input id="filtro2" name="filtro2" type="text" class="form-control w-50 bg-white text-black" placeholder="Introduce la página a buscar">
        </div>
    </form>
</div>
<table class="table table-striped table-hover text-center align-items-center" id="tablaPaginacion">
    <thead>
        <tr class="bg-tertiary text-white">
            <th scope="col">¿Cuándo se ha hecho click?</th>
            <th scope="col">Nombre del sitio web</th>
        </tr>
    </thead>
    <tbody id="resultado2" class="page-data"></tbody>
</table>
<nav id="menuPaginacion" aria-label="Menú de paginación">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <button class="btn page-link" href="#" aria-label="Página anterior" id="botonRetrocederPagina">
                <<
            </button>
        </li>
        <li class="page-item active">
            <button class="btn page-link numeroPagina" href="#" aria-label="Página anterior" id="numeroPagina1" value=1>
                1
            </button>
        </li>
        <li class="page-item">
            <button class="btn page-link numeroPagina" href="#" aria-label="Página anterior" id="numeroPagina2" value=2>
                2
            </button>
        </li>
        <li class="page-item">
            <button class="btn page-link numeroPagina" href="#" aria-label="Página anterior" id="numeroPagina3" value=3>
                3
            </button>
        </li>
        <li class="page-item">
            <button class="btn page-link" href="#" aria-label="Página siguiente" id="botonAvanzarPagina">
                >>
            </button>
        </li>
    </ul>
</nav>
<script>
    window.addEventListener('load', function() {
        inicializarTabla(
            $('#configuracionTabla2')[0],
            $('#resultado2')[0],
            'ajax.php?script=getTablaRegistros',
            
            {'<>': 'tr','html': [
            {'<>': 'th','html': '${cuando}'},
            {'<>': 'th','html': '${nombre}'},
            ]},

            $('#filtroSelect2')[0],
            $('#filtro2')[0],
            '0'
        );

        $('#botonAvanzarPagina').on('click', () => {
            avanzarPagina();
        });

        $('#botonRetrocederPagina').on('click', () => {
            retrocederPagina();
        });

        $('.numeroPagina').on('click', (evento) => {
            mostrarPagina(evento);
        });
    });
</script>