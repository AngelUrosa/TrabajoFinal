function inicializarGraficoPedidosPorMes(elemento) {
    // Inicializo los datos
	var dataPoints = [];
	var chart = new CanvasJS.Chart(elemento, {
		animationEnabled: true,
		title:{
			text:"Gráfico de pedidos por mes (AJAX y JSON)"
		},
		data: [{
			type: "column",
			dataPoints: dataPoints,
		}]
	});
	$.getJSON("ajax.php?script=pedidosMes3", function(data) {  
		data.forEach((e) => dataPoints.push({
			label: e.label,
			y: Number(e.y)
			}
		));

		$.each(data, function(key, value) {
			// Adaptar
			// dataPoints.push({x: value[0], y: parseInt(value[1])});
		});	
		chart.render();
    });
}

function inicializarGraficoPedidosPorMes2(elemento) {
    // Inicializo los datos
	var dataPoints = [];
	var chart = new CanvasJS.Chart(elemento, {
		animationEnabled: true,
		data: [{
			type: "pie",
			dataPoints: dataPoints,
		}]
	});
	$.getJSON("ajax.php?script=pedidosMes3", function(data) {  
		data.forEach((e) => dataPoints.push({
			label: e.label,
			y: Number(e.y)
			}
		));

		$.each(data, function(key, value) {
			// Adaptar
			// dataPoints.push({x: value[0], y: parseInt(value[1])});
		});	
		chart.render();
    });
}

function inicializarGraficoPedidosPorMes3(elemento) {
    // Inicializo los datos
	var dataPoints = [];
	var chart = new CanvasJS.Chart(elemento, {
		animationEnabled: true,
		data: [{
			type: "line",
			dataPoints: dataPoints,
		}]
	});
	$.getJSON("ajax.php?script=pedidosMes3", function(data) {  
		data.forEach((e) => dataPoints.push({
			label: e.label,
			y: Number(e.y)
			}
		));

		$.each(data, function(key, value) {
			// Adaptar
			// dataPoints.push({x: value[0], y: parseInt(value[1])});
		});	
		chart.render();
    });
}