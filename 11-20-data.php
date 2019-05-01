			<?php
				//Database to JSON
				$servername = "localhost";
				$database = "furnace14";
				$username = "chuck";
				$password = "root";

				try {
					$pdo = new PDO("mysql:dbname=$database;host=$servername", $username, $password);
					$statement = $pdo->prepare("SELECT Path11_14CO_Concentration, Path11_14O2_Concentration, Path11_14TempF, Path12_14CO_Concentration, Path12_14O2_Concentration, Path12_14TempF, Path13_14CO_Concentration, Path13_14O2_Concentration, Path13_14TempF, Path14_14CO_Concentration, Path14_14O2_Concentration, Path14_14TempF, Path15_14CO_Concentration, Path15_14O2_Concentration, Path15_14TempF, Path16_14CO_Concentration, Path16_14O2_Concentration, Path16_14TempF, Path17_14CO_Concentration, Path17_14O2_Concentration, Path17_14TempF, Path18_14CO_Concentration, Path18_14O2_Concentration, Path18_14TempF, Path19_14CO_Concentration, Path19_14O2_Concentration, Path19_14TempF, Path20_14CO_Concentration, Path20_14O2_Concentration, Path20_14TempF FROM OPENQUERY ORDER BY id DESC LIMIT 1");
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
					//path13
					// temp gauge
					var chartTemp = Highcharts.chart('path13-temp', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path13_14TempF]; ?>],
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
					var chartTemp = Highcharts.chart('path13-co', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path13_14CO_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path13-o2', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path13_14O2_Concentration]; ?>],
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
					//path13
					//path14
					// temp gauge
					var chartTemp = Highcharts.chart('path14-temp', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path14_14TempF]; ?>],
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
					var chartTemp = Highcharts.chart('path14-co', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path14_14CO_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path14-o2', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path14_14O2_Concentration]; ?>],
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
					//path14
					//path15
					// temp gauge
					var chartTemp = Highcharts.chart('path15-temp', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 2200,
							max: 2250,
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
							data: [<?php echo $data[0][Path15_14TempF]; ?>],
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
					var chartTemp = Highcharts.chart('path15-co', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path15_14CO_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path15-o2', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path15_14O2_Concentration]; ?>],
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
					//path15
					//path16
					// temp gauge
					var chartTemp = Highcharts.chart('path16-temp', Highcharts.merge(gaugeOptions, {
						yAxis: {
							min: 2200,
							max: 2250,
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
							data: [<?php echo $data[0][Path16_14TempF]; ?>],
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
					var chartTemp = Highcharts.chart('path16-co', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path16_14CO_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path16-o2', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path16_14O2_Concentration]; ?>],
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
					//path16
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
				</script>
				</div>
			</div>	
		  </div>
	  </div>
	  <!-- Footer -->
	  <div class="container-fluid footer">
		  <div class="row">
		  	<div class="col">
				<p class="text-muted">&copy; <?php echo date("Y"); ?> John Zink Hamworthy Combustion & Zolo Technologies</p>
		  	</div>
		  </div>
	  </div>
	  <!-- Footer -->
	<script>
		// $('#path-01, #path-02, #path-03, #path-04, #path-05, #path-06, #path-07, #path-08, #path-09, #path-10, #path-11, #path-12, #path-13, #path-14, #path-15, #path-16, #path-17, #path-18, #path-19, #path-20').on('mouseenter', function() {
			$('.path').on('mouseenter', function() {
		    	var newSrc = $(this).attr('data-src');
		    	var img = $('#furnace-empty');
		    	img.attr('data-orSrc', img.attr('src'));
		    	img.attr('src',newSrc);
			}).on('mouseleave', function() {
		    	var img = $('#furnace-empty');
		    	img.attr('src',img.attr('data-orSrc'));
			});
		
	  	  // Reload guages
	  	  $(document).ready(function() 
			{function callAjax(){
			  	$('#gauges-1-10').load("1-10-data.php"), $('#gauges-11-20').load("11-20-data.php");				
			  };
		  setInterval(callAjax, 60000 );
	  });
	</script>