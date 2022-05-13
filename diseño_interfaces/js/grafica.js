window.onload = function () {


//GRAFICA 1
var chart1 = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Incidencias Registradas vs Resueltas",
        fontColor: "#22577A"
	},
	axisX: {
		valueFormatString: "DD MMM,YY",
        intervalType: "month",
        interval:1,
        title:"Ultimos 12 meses",
        
	},
	axisY: {
		title: "Nº de incidencias",
	},
	legend:{
		cursor: "pointer",
		fontSize: 16,
		itemclick: toggleDataSeries1,
        horizontalAlign: "right", // left, center ,right 
        verticalAlign: "top"  // top, center, bottom
	},
	toolTip:{
		shared: true
	},
	data: [{
		name: "Incidencias Registradas",
		type: "spline",
		yValueFormatString: "#0.## Nº",
		showInLegend: true,
		dataPoints: [
			{ x: new Date(2021,6,24), y: 20 },
			{ x: new Date(2021,7,25), y: 14 },
			{ x: new Date(2021,8,26), y: 23 },
			{ x: new Date(2021,9,27), y: 12 },
			{ x: new Date(2021,10,28), y: 22 },
			{ x: new Date(2021,11,29), y: 23 },
			{ x: new Date(2021,12,30), y: 10 },
            { x: new Date(2022,1,24), y: 20 },
			{ x: new Date(2022,2,25), y: 14 },
			{ x: new Date(2022,3,26), y: 23 },
			{ x: new Date(2022,4,27), y: 12 },
			{ x: new Date(2022,5,28), y: 22 },
			{ x: new Date(2022,6,29), y: 23 },
			{ x: new Date(2022,7,30), y: 10 }
		]
	},
	{
		name: "Incidencias Resueltas",
		type: "spline",
		yValueFormatString: "#0.## Nº",
		showInLegend: true,
		dataPoints: [
			{ x: new Date(2021,6,24), y: 19 },
			{ x: new Date(2021,7,25), y: 12 },
			{ x: new Date(2021,8,26), y: 21 },
			{ x: new Date(2021,9,27), y: 10 },
			{ x: new Date(2021,10,28), y: 21 },
			{ x: new Date(2021,11,29), y: 20 },
			{ x: new Date(2021,12,30), y: 8 },
            { x: new Date(2022,1,24), y: 19 },
			{ x: new Date(2022,2,25), y: 12 },
			{ x: new Date(2022,3,26), y: 21 },
			{ x: new Date(2022,4,27), y: 10 },
			{ x: new Date(2022,5,28), y: 21 },
			{ x: new Date(2022,6,29), y: 20 },
			{ x: new Date(2022,7,30), y: 8 }
		]
	},
]
});
chart1.render();

function toggleDataSeries1(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart1.render();
}

//NUEVAS GRAFICA 2

var chart2 = new CanvasJS.Chart("graficoCircular", {
	animationEnabled: true,
	title: {
		text: "Gastos de la comunidad"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: 54.25, label: "Electricidad"},
			{y: 17.31, label: "Agua"},
			{y: 15.20, label: "Gas"},
			{y: 7.06, label: "Servicios"},
			{y: 6.17, label: "Reuniones"},
		]
	}]
});
chart2.render();


//NUEVA GRAFICA 3
var chart3 = new CanvasJS.Chart("graficasCantidad", {
	animationEnabled: true,
	title:{
		text: "Comparacion Año Pasado",
        fontColor: "#22577A"
	},	
	axisY: {
		title: "Año Actual / 22",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	axisY2: {
		title: "Año Pasado / 21",
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E"
	},	
	toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries2
	},
	data: [{
		type: "column",
		name: "Año Actual / 22",
		legendText: "2022",
		showInLegend: true, 
		dataPoints:[
			{ label: "Personas", y: 320 },
			{ label: "Incidencias", y: 123 },
			{ label: "Ubicaciones", y: 82},
			{ label: "Comunidades", y: 21 },
		]
	},
	{
		type: "column",	
		name: "Año Pasado / 21",
		legendText: "2021",
		axisYType: "secondary",
		showInLegend: true,
		dataPoints:[
			{ label: "Personas", y: 312 },
			{ label: "Incidencias", y: 135 },
			{ label: "Ubicaciones", y: 79},
			{ label: "Comunidades", y: 17 },
		]
	}]
});
chart3.render();

function toggleDataSeries2(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart3.render();
}

//GRAFICA 4
var chart4 = new CanvasJS.Chart("graficaArea", {
	animationEnabled: true,
	title: {
		text: "Number of iPhones Sold in Different Quarters"
	},
	axisX: {
		minimum: new Date(2015, 01, 25),
		maximum: new Date(2017, 02, 15),
		valueFormatString: "MMM YY"
	},
	axisY: {
		title: "Number of Sales",
		titleFontColor: "#4F81BC",
		includeZero: true,
		suffix: "mn"
	},
	data: [{
		indexLabelFontColor: "darkSlateGray",
		name: "views",
		type: "area",
		yValueFormatString: "#,##0.0mn",
		dataPoints: [
			{ x: new Date(2015, 02, 1), y: 74.4, label: "Q1-2015" },
			{ x: new Date(2015, 05, 1), y: 61.1, label: "Q2-2015" },
			{ x: new Date(2015, 08, 1), y: 47.0, label: "Q3-2015" },
			{ x: new Date(2015, 11, 1), y: 48.0, label: "Q4-2015" },
			{ x: new Date(2016, 02, 1), y: 74.8, label: "Q1-2016" },
			{ x: new Date(2016, 05, 1), y: 51.1, label: "Q2-2016" },
			{ x: new Date(2016, 08, 1), y: 40.4, label: "Q3-2016" },
			{ x: new Date(2016, 11, 1), y: 45.5, label: "Q4-2016" },
			{ x: new Date(2017, 02, 1), y: 78.3, label: "Q1-2017", indexLabel: "Highest", markerColor: "red" }
		]
	}]
});
chart4.render();


}









