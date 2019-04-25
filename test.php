<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
    <!-- Bootstrap + jQuery -->
	<script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
	<!-- Highcharts library -->
	<script src="js/highcharts.js"></script>
	<script src="js/highcharts-more.js"></script>
	<script src="js/solid-gauge.js"></script>
	<script src="js/data.js"></script>
	<script src="js/exporting.js"></script>

    <!-- Bootstrap bundle (w/ popper.js) -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Page css -->
	<link rel="stylesheet" href="css/styles.css">
	
    <title>Test</title>
  </head>
  <body>
	  <div class="container-fluid header">
		  <div class="row">
	  		  <div class="col">
	  			  <img src="img/jzhc-zolo-logo.png" class="logo">
	  		  </div>
		  </div>
	  </div>
	  <script>
		  $(function() {
		      function callAjax(){
		          $('#ajax-div').load("test-data.php");
		      }
		      setInterval(callAjax, 5000 );
		  });
	  </script>
	  <div class="container-fluid furnace" id="ajax-div">
		<!-- test-data.php -->
	  	<div class="row">
		  	<div class="col">
		  		<div class="chart-containers">
				  <!-- Database -->
			  	  <div id="database-code">
			  		<?php
			  		//Database to JSON
			  		$servername = "localhost";
			  		$database = "furnace14";
			  		$username = "chuck";
			  		$password = "root";

			  		try {
			  			$pdo = new PDO("mysql:dbname=$database;host=$servername", $username, $password);
			  			$statement = $pdo->prepare("SELECT Path01_14CO_Concentration, Path01_14H2O_Concentration, Path01_14O2_Concentration, Path01_14TempF FROM OPENQUERY ORDER BY id DESC LIMIT 1");
			  			$statement->execute();
			  			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
			  			$json = json_encode($results, JSON_NUMERIC_CHECK);
			  		  }
			  		catch(PDOException $e)
			  		  {
			  		  	echo "Connection failed: " . $e->getMessage();
			  		  }

			  		$conn = null;
			  		$data = json_decode($json, true);
					
			  		//echo JSON object as array for testing below (remove before going live)
			  		//echo $json;
			  		//echo '<br>';
			  		//$data = json_decode($json, true);
			  		//echo $data[0][Path01_14TempF];
			  		//echo '<br>';
			  		//echo $data[0][Path01_14CO_Concentration];
			  		//echo '<br>';
			  		//echo $data[0][Path01_14H2O_Concentration];
			  		//echo '<br>';
			  		//echo $data[0][Path01_14O2_Concentration];
			  		?>
			  	  </div>
				  <!-- Database -->
				  <!-- Path 01 -->
					<div id="path01-charts">
						<div id="path01-temp" class="chart"></div><div id="path01-co" class="chart"></div>
						<div id="path01-h2o" class="chart"></div><div id="path01-o2" class="chart"></div>	
					</div>				
					<script>
						var gaugeOptions = {
						  chart: {
						    type: 'solidgauge'
						  },
						  title: null,
						  pane: {
						    center: ['50%', '85%'],
						    size: '85%',
						    startAngle: -49,
						    endAngle: 49,
						    background: {
								backgroundColor: '#CDD2E1',
								borderWidth: '0',
								innerRadius: '60%',
								outerRadius: '100%',
								shape: 'arc'
						    }
						  },
						  tooltip: {
						    enabled: false
						  },
					      navigation: {
					          buttonOptions: {
					              enabled: false
					          }
					      },
						  // the value axis
						  yAxis: {
						    stops: [
							  //[0.1, '#55BF3B'], // green
							  //[0.5, '#DDDF0D'], // yellow
							  //[0.9, '#DF5353'] // red
							  [0.1, '#34C334'], // green
							  [0.5, '#34C334'], // green
							  [0.9, '#9D3434'], // red	
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
						//path01
						// temp gauge
						var chartTemp = Highcharts.chart('path01-temp', Highcharts.merge(gaugeOptions, {
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
						    data: [],
							  dataLabels: {
							  align: 'center',
							  verticalAlign: 'bottom',
							  floating: 'true',
							  y: 10,
						      format: '<div class="gauge-value" style="text-align: center; font-size: 13px; color: #555;">' + '{y}' + 
								'</div>' + '<br>' + '<div class="gauge-label" style="text-align: center; font-size: 13px; color: #333;">' + 'Temp (f)' + '</div>'
						    }
						  }]
						}));
						// temp gauge
						// co gauge
						var chartTemp = Highcharts.chart('path01-co', Highcharts.merge(gaugeOptions, {
						  yAxis: {
						    min: 0,
						    max: 5000,
						    title: {
						      text: ''
						    }
						  },
						  credits: {
						    enabled: false
						  },
						  series: [{
						    name: 'CO',
						    data: [],
						    dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
						    y: 10,
						    format: '<div class="gauge-value" style="text-align: center; font-size: 13px; color: #555;">' + '{y}' + '</div>' + '<br>' 
								+ '<div class="gauge-label" style="text-align: center; font-size: 13px; color: #333;">' + 'CO (ppm)' + '</div>'
						    }
						  }]
						}));
						// co gauge
						// h2o gauge
						var chartTemp = Highcharts.chart('path01-h2o', Highcharts.merge(gaugeOptions, {
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
						    data: [],
						    dataLabels: {
							  align: 'center',
							  verticalAlign: 'bottom',
							  floating: 'true',
								y: 10,
						      format: '<div class="gauge-value" style="text-align: center; font-size: 13px; color: #555;">' + '{y}' + '</div>' + '<br>' 
								+ '<div class="gauge-label" style="text-align: center; font-size: 13px; color: #333;">' + 'H2O (%)' + '</div>'
						    }
						  }]
						}));
						// h2o gauge
						// o2 gauge
						var chartTemp = Highcharts.chart('path01-o2', Highcharts.merge(gaugeOptions, {
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
						    data: [],
						    dataLabels: {
							  align: 'center',
							  verticalAlign: 'bottom',
							  floating: 'true',
								y: 10,
						      format: '<div class="gauge-value" style="text-align: center; font-size: 13px; color: #555;">' + '{y}' + '</div>' + '<br>' 
								+ '<div class="gauge-label" style="text-align: center; font-size: 13px; color: #333;">' + 'O2 (%)' + '</div>'
						    }
						  }]
						}));
						// o2 gauge
						//path01
					</script>
		  		</div>
		  	</div>
			<!-- test-data.php -->
	  	</div>
	  </div>
	  <div class="container-fluid footer">
		  <div class="row">
		  	<div class="col">
		  		<!-- <p class="text-muted"><img src="img/jzhc-logo.svg" class="logo"></p> -->
		  	</div>
		  </div>
	  </div>
  </body>
</html>