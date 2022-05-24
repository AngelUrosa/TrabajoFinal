
<form id="configuracionTabla" name="configuracionTabla">
	<input name="filtro" />
</form>
<table id='resultado'>
</table>

<script src="js/tablas_ajax.js" defer></script> 
<script src="js/crud_ajax.js" defer></script> 

<script>
	window.addEventListener('load', function () {
		
		inicializarTabla(
			document.getElementById('configuracionTabla'),
			document.getElementById('resultado'),
			'ajax/getTablaClientes.php'
		);

		caInicializarBotonesEliminar('resultado', 'clientes');
	});

</script>

