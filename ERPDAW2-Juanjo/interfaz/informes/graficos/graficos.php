<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="interfaz/informes/graficos/pedidosPorMes.js" defer></script>
    <script>
	window.addEventListener('load', () => {
		inicializarGraficoPedidosPorMes('chartContainer1');
		inicializarGraficoPedidosPorMes2('chartContainer2');
		inicializarGraficoPedidosPorMes3('chartContainer3');
	})
</script>
	<title>Gráficos</title>
</head>
<body>
    <h1>
        <u>Gráficos</u>
        <small class="text-muted">(Pedidos por mes)</small>
    </h1>
    <div class="container">
        <div class="row" style="height: 300px;">
            <div id="chartContainer1" class="col-sm-12"></div>
        </div>
        <div class="row" style="height: 300px;">
            <div id="chartContainer2" class="col-sm-6" ></div>
            <div id="chartContainer3" class="col-sm-6"></div>
        </div>
    </div>
    
    
</body>
</html>