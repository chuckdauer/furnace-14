<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap bundle (w/ popper.js) -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Page css -->
	<link rel="stylesheet" href="css/styles.css">
    <!-- Bootstrap + jQuery -->
	<script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
	<!-- Highcharts library -->
	<script src="js/highcharts.js"></script>
	<script src="js/highcharts-more.js"></script>
	<script src="js/solid-gauge.js"></script>
	<script src="js/data.js"></script>

    <title>Test</title>
  </head>
  <body>
	  <div class="container-fluid header">
		  <div class="row">
  		  <div class="col">
  			  <img src="img/jzhc-logo.svg" class="logo">
  		  </div>
		  </div>
	  </div>
	  
	  <div class="container-fluid furnace">
	  	<div class="row">
		  	<div class="col">
		  		<div class="chart-containers">
					<div id="container-temp" class="chart"></div><div id="container-co" class="chart"></div>
					<div id="container-h2o" class="chart"></div><div id="container-o2" class="chart"></div>					
					<script>
						var gaugeOptions = {
						  chart: {
						    type: 'solidgauge'
						  },
						  title: null,
						  pane: {
						    center: ['50%', '85%'],
						    size: '60%',
						    startAngle: -90,
						    endAngle: 90,
						    background: {
						      backgroundColor: '#EEE',
						      innerRadius: '60%',
						      outerRadius: '100%',
						      shape: 'arc'
						    }
						  },
						  tooltip: {
						    enabled: false
						  },
						  // the value axis
						  yAxis: {
						    stops: [
							  [0.1, '#55BF3B'], // green
							  [0.5, '#DDDF0D'], // yellow
							  [0.9, '#DF5353'] // red
						    ],
						    lineWidth: 0,
						    minorTickInterval: null,
						    tickAmount: 1,
						    title: {
						      y: -70
						    },
						    labels: {
								y: 16
						    }
						  },
						  plotOptions: {
						    solidgauge: {
						      dataLabels: {
						        y: -10,
						        borderWidth: 0,
						        useHTML: true
						      }
						    }
						  }
						};
						// temp gauge
						var chartTemp = Highcharts.chart('container-temp', Highcharts.merge(gaugeOptions, {
						  yAxis: {
						    min: 0,
						    max: 2500,
						    title: {
						      text: ''
						    }
						  },
						  credits: {
						    enabled: false
						  },
						  series: [{
						    name: 'Temp',
						    data: [1532],
						    dataLabels: {
							  align: 'center',
							  verticalAlign: 'top',
							  floating: 'true',
						      format: '<div class="gauge-label" style="text-align: center; font-size: 9px; color: #555;">' + '{y}' + 
								'</div>' + '<br>' + '<div class="gauge-value" style="text-align: center; font-size: 13px; color: #333;">' + 'Temp (f)' + '</div>'
						    }
						  }]
						}));
						// temp gauge
						// co gauge
						var chartTemp = Highcharts.chart('container-co', Highcharts.merge(gaugeOptions, {
						  yAxis: {
						    min: 0,
						    max: 10000,
						    title: {
						      text: ''
						    }
						  },
						  credits: {
						    enabled: false
						  },
						  series: [{
						    name: 'CO',
						    data: [218],
						    dataLabels: {
						      format: '<div class="gauge-value" style="text-align: center; font-size: 9px; color: #555;">' + '{y}' + '</div>' + '<br>' 
								+ '<div class="gauge-label" style="text-align: center; font-size: 13px; color: #333;">' + 'CO (ppm)' + '</div>'
						    }
						  }]
						}));
						// co gauge
						// h2o gauge
						var chartTemp = Highcharts.chart('container-h2o', Highcharts.merge(gaugeOptions, {
						  yAxis: {
						    min: 0,
						    max: 99.9,
						    title: {
						      text: ''
						    }
						  },
						  credits: {
						    enabled: false
						  },
						  series: [{
						    name: 'H2O',
						    data: [6],
						    dataLabels: {
						      format: '<div class="gauge-value" style="text-align: center; font-size: 9px; color: #555;">' + '{y}' + '</div>' + '<br>' 
								+ '<div class="gauge-label" style="text-align: center; font-size: 13px; color: #333;">' + 'H2O (%)' + '</div>'
						    }
						  }]
						}));
						// h2o gauge
						// o2 gauge
						var chartTemp = Highcharts.chart('container-o2', Highcharts.merge(gaugeOptions, {
						  yAxis: {
						    min: 0,
						    max: 99.9,
						    title: {
						      text: ''
						    }
						  },
						  credits: {
						    enabled: false
						  },
						  series: [{
						    name: 'O2',
						    data: [6],
						    dataLabels: {
						      format: '<div class="gauge-value" style="text-align: center; font-size: 9px; color: #555;">' + '{y}' + '</div>' + '<br>' 
								+ '<div class="gauge-label" style="text-align: center; font-size: 13px; color: #333;">' + 'O2 (%)' + '</div>'
						    }
						  }]
						}));
						// o2 gauge
					</script>
		  		</div>
		  	</div>
	  	</div>
	  </div>
	  
	  <div class="container-fluid footer">
		  <div class="row">
		  	<div class="col">
		  		<p class="text-muted"><img src="img/jzhc-logo.svg" class="logo"></p>
		  	</div>
		  </div>
	  </div>
  </body>
</html>