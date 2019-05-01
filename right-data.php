			<?php
				//Database to JSON
				$servername = "localhost";
				$database = "furnace14";
				$username = "chuck";
				$password = "root";

				try {
					$pdo = new PDO("mysql:dbname=$database;host=$servername", $username, $password);
					$statement = $pdo->prepare("SELECT Path07_14CO_Concentration, Path07_14O2_Concentration, Path07_14TempF, Path08_14CO_Concentration, Path08_14O2_Concentration, Path08_14TempF, Path09_14CO_Concentration, Path09_14O2_Concentration, Path09_14TempF, Path17_14CO_Concentration, Path17_14O2_Concentration, Path17_14TempF, Path18_14CO_Concentration, Path18_14O2_Concentration, Path18_14TempF, Path10_14CO_Concentration, Path10_14O2_Concentration, Path10_14TempF, Path11_14CO_Concentration, Path11_14O2_Concentration, Path11_14TempF, Path12_14CO_Concentration, Path12_14O2_Concentration, Path12_14TempF, Path19_14CO_Concentration, Path19_14O2_Concentration, Path19_14TempF, Path20_14CO_Concentration, Path20_14O2_Concentration, Path20_14TempF FROM OPENQUERY ORDER BY id DESC LIMIT 1");
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
							backgroundColor: 'transparent'
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
					//path07
					// temp gauge
					var chartTemp = Highcharts.chart('path07-temp', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 2450,
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
							max: 0,
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
					// o2 gauge
					var chartTemp = Highcharts.chart('path07-o2', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 2.9,
							max: 3.1,
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
							min: 2300,
							max: 2350,
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
							max: 0,
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
					// o2 gauge
					var chartTemp = Highcharts.chart('path08-o2', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 2.4,
							max: 2.6,
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
							min: 2300,
							max: 2350,
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
							max: 0,
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
					// o2 gauge
					var chartTemp = Highcharts.chart('path09-o2', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 1.9,
							max: 2.1,
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
					//path17
					// temp gauge
					var chartTemp = Highcharts.chart('path17-temp', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 2300,
							max: 2350,
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
							data: [<?php echo $data[0][Path17_14TempF]; ?>],
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
					var chartTemp = Highcharts.chart('path17-co', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 0,
							max: 0,
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
							data: [<?php echo $data[0][Path17_14CO_Concentration]; ?>],
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
					// o2 gauge
					var chartTemp = Highcharts.chart('path17-o2', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 1.9,
							max: 2.1,
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
							data: [<?php echo $data[0][Path17_14O2_Concentration]; ?>],
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
					//path17
					//path18
					// temp gauge
					var chartTemp = Highcharts.chart('path18-temp', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 2300,
							max: 2350,
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
							data: [<?php echo $data[0][Path18_14TempF]; ?>],
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
					var chartTemp = Highcharts.chart('path18-co', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 0,
							max: 0,
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
							data: [<?php echo $data[0][Path18_14CO_Concentration]; ?>],
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
					// o2 gauge
					var chartTemp = Highcharts.chart('path18-o2', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 1.9,
							max: 2.1,
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
							data: [<?php echo $data[0][Path18_14O2_Concentration]; ?>],
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
					//path18
					//path10
					// temp gauge
					var chartTemp = Highcharts.chart('path10-temp', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 2350,
							max: 2400,
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
							min: 2500,
							max: 3500,
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
					// o2 gauge
					var chartTemp = Highcharts.chart('path10-o2', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 6.9,
							max: 7.1,
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
					//path11
					// temp gauge
					var chartTemp = Highcharts.chart('path11-temp', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 2000,
							max: 2050,
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
							data: [<?php echo $data[0][Path11_14TempF]; ?>],
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
					var chartTemp = Highcharts.chart('path11-co', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 0,
							max: 0,
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
							data: [<?php echo $data[0][Path11_14CO_Concentration]; ?>],
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
					// o2 gauge
					var chartTemp = Highcharts.chart('path11-o2', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 2.9,
							max: 3.1,
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
							data: [<?php echo $data[0][Path11_14O2_Concentration]; ?>],
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
					//path11
					//path12
					// temp gauge
					var chartTemp = Highcharts.chart('path12-temp', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 2000,
							max: 2050,
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
							data: [<?php echo $data[0][Path12_14TempF]; ?>],
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
					var chartTemp = Highcharts.chart('path12-co', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 0,
							max: 0,
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
							data: [<?php echo $data[0][Path12_14CO_Concentration]; ?>],
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
					// o2 gauge
					var chartTemp = Highcharts.chart('path12-o2', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 1.9,
							max: 2.1,
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
							data: [<?php echo $data[0][Path12_14O2_Concentration]; ?>],
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
					//path12
					//path19
					// temp gauge
					var chartTemp = Highcharts.chart('path19-temp', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 2000,
							max: 2050,
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
							data: [<?php echo $data[0][Path19_14TempF]; ?>],
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
					var chartTemp = Highcharts.chart('path19-co', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 0,
							max: 0,
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
							data: [<?php echo $data[0][Path19_14CO_Concentration]; ?>],
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
					// o2 gauge
					var chartTemp = Highcharts.chart('path19-o2', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 3.4,
							max: 3.6,
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
							data: [<?php echo $data[0][Path19_14O2_Concentration]; ?>],
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
					//path19
					//path20
					// temp gauge
					var chartTemp = Highcharts.chart('path20-temp', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 2000,
							max: 2050,
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
							data: [<?php echo $data[0][Path20_14TempF]; ?>],
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
					var chartTemp = Highcharts.chart('path20-co', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 0,
							max: 0,
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
							data: [<?php echo $data[0][Path20_14CO_Concentration]; ?>],
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
					// o2 gauge
					var chartTemp = Highcharts.chart('path20-o2', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 3.4,
							max: 3.6,
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
							data: [<?php echo $data[0][Path20_14O2_Concentration]; ?>],
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
					//path20