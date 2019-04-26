			<!-- <hr>
			<div class="row justify-content-center path" id="path-01" data-src="img/furnace-14-01.png">
				<p>PATH01</p><div id="path01-temp" class="chart"></div><div id="path01-co" class="chart"></div><div id="path01-h2o" class="chart"></div><div id="path01-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-02" data-src="img/furnace-14-02.png">
				<p>PATH02</p><div id="path02-temp" class="chart"></div><div id="path02-co" class="chart"></div><div id="path02-h2o" class="chart"></div><div id="path02-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-03" data-src="img/furnace-14-03.png">
				<p>PATH03</p><div id="path03-temp" class="chart"></div><div id="path03-co" class="chart"></div><div id="path03-h2o" class="chart"></div><div id="path03-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-04" data-src="img/furnace-14-04.png">
				<p>PATH04</p><div id="path04-temp" class="chart"></div><div id="path04-co" class="chart"></div><div id="path04-h2o" class="chart"></div><div id="path04-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-05" data-src="img/furnace-14-05.png">
				<p>PATH05</p><div id="path05-temp" class="chart"></div><div id="path05-co" class="chart"></div><div id="path05-h2o" class="chart"></div><div id="path05-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-06" data-src="img/furnace-14-06.png">
				<p>PATH06</p><div id="path06-temp" class="chart"></div><div id="path06-co" class="chart"></div><div id="path06-h2o" class="chart"></div><div id="path06-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-07" data-src="img/furnace-14-07.png">
				<p>PATH07</p><div id="path07-temp" class="chart"></div><div id="path07-co" class="chart"></div><div id="path07-h2o" class="chart"></div><div id="path07-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-08" data-src="img/furnace-14-08.png">
				<p>PATH08</p><div id="path08-temp" class="chart"></div><div id="path08-co" class="chart"></div><div id="path08-h2o" class="chart"></div><div id="path08-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-09" data-src="img/furnace-14-09.png">
				<p>PATH09</p><div id="path09-temp" class="chart"></div><div id="path09-co" class="chart"></div><div id="path09-h2o" class="chart"></div><div id="path09-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-10" data-src="img/furnace-14-10.png">
				<p>PATH10</p><div id="path10-temp" class="chart"></div><div id="path10-co" class="chart"></div><div id="path10-h2o" class="chart"></div><div id="path10-o2" class="chart"></div>
			</div>
			<hr> -->
			<?php
				//Database to JSON
				$servername = "localhost";
				$database = "furnace14";
				$username = "chuck";
				$password = "root";

				try {
					$pdo = new PDO("mysql:dbname=$database;host=$servername", $username, $password);
					$statement = $pdo->prepare("SELECT Path01_14CO_Concentration, Path01_14H2O_Concentration, Path01_14O2_Concentration, Path01_14TempF, Path02_14CO_Concentration, Path02_14H2O_Concentration, Path02_14O2_Concentration, Path02_14TempF, Path03_14CO_Concentration, Path03_14H2O_Concentration, Path03_14O2_Concentration, Path03_14TempF, Path04_14CO_Concentration, Path04_14H2O_Concentration, Path04_14O2_Concentration, Path04_14TempF, Path05_14CO_Concentration, Path05_14H2O_Concentration, Path05_14O2_Concentration, Path05_14TempF, Path06_14CO_Concentration, Path06_14H2O_Concentration, Path06_14O2_Concentration, Path06_14TempF, Path07_14CO_Concentration, Path07_14H2O_Concentration, Path07_14O2_Concentration, Path07_14TempF, Path08_14CO_Concentration, Path08_14H2O_Concentration, Path08_14O2_Concentration, Path08_14TempF, Path09_14CO_Concentration, Path09_14H2O_Concentration, Path09_14O2_Concentration, Path09_14TempF, Path10_14CO_Concentration, Path10_14H2O_Concentration, Path10_14O2_Concentration, Path10_14TempF FROM OPENQUERY ORDER BY id DESC LIMIT 1");
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
			?>
			<script>
				var gaugeOptions = {
					chart: {
						type: 'solidgauge',
						className: 'chart',
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
						  [0.1, '#55BF3B'], // green
						  [0.5, '#DDDF0D'], // yellow
						  [0.9, '#DF5353'] // red
						],
						lineWidth: 0,
						minorTickInterval: null,
						tickAmount: 1,
					},
					plotOptions: {
						solidgauge: {
							dataLabels: {
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
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'Temp',
						data: [<?php echo $data[0][Path01_14TempF]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' +
								'</div>' + '<br>' + '<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'Temp (f)' + '</div>'
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
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'CO',
						data: [<?php echo $data[0][Path01_14CO_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'CO (ppm)' + '</div>'
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
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'H2O',
						data: [<?php echo $data[0][Path01_14H2O_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'H2O (%)' + '</div>'
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
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'O2',
						data: [<?php echo $data[0][Path01_14O2_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'O2 (%)' + '</div>'
						}
					}]
				}));
				// o2 gauge
				//path01
				//path02
				// temp gauge
				var chartTemp = Highcharts.chart('path02-temp', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 2500,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'Temp',
						data: [<?php echo $data[0][Path02_14TempF]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' +
								'</div>' + '<br>' + '<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'Temp (f)' + '</div>'
						}
					}]
				}));
				// temp gauge
				// co gauge
				var chartTemp = Highcharts.chart('path02-co', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 5000,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'CO',
						data: [<?php echo $data[0][Path02_14CO_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'CO (ppm)' + '</div>'
						}
					}]
				}));
				// co gauge
				// h2o gauge
				var chartTemp = Highcharts.chart('path02-h2o', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'H2O',
						data: [<?php echo $data[0][Path02_14H2O_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'H2O (%)' + '</div>'
						}
					}]
				}));
				// h2o gauge
				// o2 gauge
				var chartTemp = Highcharts.chart('path02-o2', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'O2',
						data: [<?php echo $data[0][Path02_14O2_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'O2 (%)' + '</div>'
						}
					}]
				}));
				// o2 gauge
				//path02
				//path03
				// temp gauge
				var chartTemp = Highcharts.chart('path03-temp', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 2500,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'Temp',
						data: [<?php echo $data[0][Path03_14TempF]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' +
								'</div>' + '<br>' + '<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'Temp (f)' + '</div>'
						}
					}]
				}));
				// temp gauge
				// co gauge
				var chartTemp = Highcharts.chart('path03-co', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 5000,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'CO',
						data: [<?php echo $data[0][Path03_14CO_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'CO (ppm)' + '</div>'
						}
					}]
				}));
				// co gauge
				// h2o gauge
				var chartTemp = Highcharts.chart('path03-h2o', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'H2O',
						data: [<?php echo $data[0][Path03_14H2O_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'H2O (%)' + '</div>'
						}
					}]
				}));
				// h2o gauge
				// o2 gauge
				var chartTemp = Highcharts.chart('path03-o2', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'O2',
						data: [<?php echo $data[0][Path03_14O2_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'O2 (%)' + '</div>'
						}
					}]
				}));
				// o2 gauge
				//path03
				//path04
				// temp gauge
				var chartTemp = Highcharts.chart('path04-temp', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 2500,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'Temp',
						data: [<?php echo $data[0][Path04_14TempF]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' +
								'</div>' + '<br>' + '<div class="gauge-label" style="text-align: center; font-size: color: #333;">' + 'Temp (f)' + '</div>'
						}
					}]
				}));
				// temp gauge
				// co gauge
				var chartTemp = Highcharts.chart('path04-co', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 5000,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'CO',
						data: [<?php echo $data[0][Path04_14CO_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'CO (ppm)' + '</div>'
						}
					}]
				}));
				// co gauge
				// h2o gauge
				var chartTemp = Highcharts.chart('path04-h2o', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'H2O',
						data: [<?php echo $data[0][Path04_14H2O_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'H2O (%)' + '</div>'
						}
					}]
				}));
				// h2o gauge
				// o2 gauge
				var chartTemp = Highcharts.chart('path04-o2', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'O2',
						data: [<?php echo $data[0][Path04_14O2_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'O2 (%)' + '</div>'
						}
					}]
				}));
				// o2 gauge
				//path04
				//path05
				// temp gauge
				var chartTemp = Highcharts.chart('path05-temp', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 2500,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'Temp',
						data: [<?php echo $data[0][Path05_14TempF]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' +
								'</div>' + '<br>' + '<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'Temp (f)' + '</div>'
						}
					}]
				}));
				// temp gauge
				// co gauge
				var chartTemp = Highcharts.chart('path05-co', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 5000,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'CO',
						data: [<?php echo $data[0][Path05_14CO_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'CO (ppm)' + '</div>'
						}
					}]
				}));
				// co gauge
				// h2o gauge
				var chartTemp = Highcharts.chart('path05-h2o', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'H2O',
						data: [<?php echo $data[0][Path05_14H2O_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'H2O (%)' + '</div>'
						}
					}]
				}));
				// h2o gauge
				// o2 gauge
				var chartTemp = Highcharts.chart('path05-o2', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'O2',
						data: [<?php echo $data[0][Path05_14O2_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'O2 (%)' + '</div>'
						}
					}]
				}));
				// o2 gauge
				//path05
				//path06
				// temp gauge
				var chartTemp = Highcharts.chart('path06-temp', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 2500,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'Temp',
						data: [<?php echo $data[0][Path06_14TempF]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' +
								'</div>' + '<br>' + '<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'Temp (f)' + '</div>'
						}
					}]
				}));
				// temp gauge
				// co gauge
				var chartTemp = Highcharts.chart('path06-co', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 5000,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'CO',
						data: [<?php echo $data[0][Path06_14CO_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'CO (ppm)' + '</div>'
						}
					}]
				}));
				// co gauge
				// h2o gauge
				var chartTemp = Highcharts.chart('path06-h2o', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'H2O',
						data: [<?php echo $data[0][Path06_14H2O_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'H2O (%)' + '</div>'
						}
					}]
				}));
				// h2o gauge
				// o2 gauge
				var chartTemp = Highcharts.chart('path06-o2', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'O2',
						data: [<?php echo $data[0][Path06_14O2_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'O2 (%)' + '</div>'
						}
					}]
				}));
				// o2 gauge
				//path06
				//path07
				// temp gauge
				var chartTemp = Highcharts.chart('path07-temp', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 2500,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'Temp',
						data: [<?php echo $data[0][Path07_14TempF]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' +
								'</div>' + '<br>' + '<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'Temp (f)' + '</div>'
						}
					}]
				}));
				// temp gauge
				// co gauge
				var chartTemp = Highcharts.chart('path07-co', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 5000,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'CO',
						data: [<?php echo $data[0][Path07_14CO_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'CO (ppm)' + '</div>'
						}
					}]
				}));
				// co gauge
				// h2o gauge
				var chartTemp = Highcharts.chart('path07-h2o', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'H2O',
						data: [<?php echo $data[0][Path07_14H2O_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'H2O (%)' + '</div>'
						}
					}]
				}));
				// h2o gauge
				// o2 gauge
				var chartTemp = Highcharts.chart('path07-o2', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'O2',
						data: [<?php echo $data[0][Path07_14O2_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'O2 (%)' + '</div>'
						}
					}]
				}));
				// o2 gauge
				//path07
				//path08
				// temp gauge
				var chartTemp = Highcharts.chart('path08-temp', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 2500,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'Temp',
						data: [<?php echo $data[0][Path08_14TempF]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' +
								'</div>' + '<br>' + '<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'Temp (f)' + '</div>'
						}
					}]
				}));
				// temp gauge
				// co gauge
				var chartTemp = Highcharts.chart('path08-co', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 5000,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'CO',
						data: [<?php echo $data[0][Path08_14CO_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'CO (ppm)' + '</div>'
						}
					}]
				}));
				// co gauge
				// h2o gauge
				var chartTemp = Highcharts.chart('path08-h2o', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'H2O',
						data: [<?php echo $data[0][Path08_14H2O_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'H2O (%)' + '</div>'
						}
					}]
				}));
				// h2o gauge
				// o2 gauge
				var chartTemp = Highcharts.chart('path08-o2', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'O2',
						data: [<?php echo $data[0][Path08_14O2_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'O2 (%)' + '</div>'
						}
					}]
				}));
				// o2 gauge
				//path08
				//path09
				// temp gauge
				var chartTemp = Highcharts.chart('path09-temp', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 2500,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'Temp',
						data: [<?php echo $data[0][Path09_14TempF]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' +
								'</div>' + '<br>' + '<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'Temp (f)' + '</div>'
						}
					}]
				}));
				// temp gauge
				// co gauge
				var chartTemp = Highcharts.chart('path09-co', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 5000,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'CO',
						data: [<?php echo $data[0][Path09_14CO_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'CO (ppm)' + '</div>'
						}
					}]
				}));
				// co gauge
				// h2o gauge
				var chartTemp = Highcharts.chart('path09-h2o', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'H2O',
						data: [<?php echo $data[0][Path09_14H2O_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'H2O (%)' + '</div>'
						}
					}]
				}));
				// h2o gauge
				// o2 gauge
				var chartTemp = Highcharts.chart('path09-o2', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'O2',
						data: [<?php echo $data[0][Path09_14O2_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'O2 (%)' + '</div>'
						}
					}]
				}));
				// o2 gauge
				//path09
				//path10
				// temp gauge
				var chartTemp = Highcharts.chart('path10-temp', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 2500,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'Temp',
						data: [<?php echo $data[0][Path10_14TempF]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' +
								'</div>' + '<br>' + '<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'Temp (f)' + '</div>'
						}
					}]
				}));
				// temp gauge
				// co gauge
				var chartTemp = Highcharts.chart('path10-co', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 5000,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'CO',
						data: [<?php echo $data[0][Path10_14CO_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'CO (ppm)' + '</div>'
						}
					}]
				}));
				// co gauge
				// h2o gauge
				var chartTemp = Highcharts.chart('path10-h2o', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'H2O',
						data: [<?php echo $data[0][Path10_14H2O_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'H2O (%)' + '</div>'
						}
					}]
				}));
				// h2o gauge
				// o2 gauge
				var chartTemp = Highcharts.chart('path10-o2', Highcharts.merge(gaugeOptions, {
					yAxis: {
						min: 0,
						max: 99.9,
						title: {
							text: ''
						},
						labels: {
							enabled: false
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'O2',
						data: [<?php echo $data[0][Path10_14O2_Concentration]; ?>],
						dataLabels: {
							align: 'center',
							verticalAlign: 'bottom',
							floating: 'true',
							y: 10,
							format: '<div class="gauge-value" style="text-align: center; font-size: 1em; line-height: 3.5em; color: #555;">' + '{y}' + '</div>' + '<br>' +
								'<div class="gauge-label" style="text-align: center; font-size: 1em; color: #333;">' + 'O2 (%)' + '</div>'
						}
					}]
				}));
				// o2 gauge
				//path10
				</script>