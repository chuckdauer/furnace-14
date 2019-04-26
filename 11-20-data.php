			<!-- <hr>
			<div class="row justify-content-center path" id="path-11" data-src="img/furnace-14-11.png">
				<p>PATH11</p><div id="path11-temp" class="chart"></div><div id="path11-co" class="chart"></div><div id="path11-h2o" class="chart"></div><div id="path11-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-12" data-src="img/furnace-14-12.png">
				<p>PATH12</p><div id="path12-temp" class="chart"></div><div id="path12-co" class="chart"></div><div id="path12-h2o" class="chart"></div><div id="path12-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-13" data-src="img/furnace-14-13.png">
				<p>PATH13</p><div id="path13-temp" class="chart"></div><div id="path13-co" class="chart"></div><div id="path13-h2o" class="chart"></div><div id="path13-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-14" data-src="img/furnace-14-14.png">
				<p>PATH14</p><div id="path14-temp" class="chart"></div><div id="path14-co" class="chart"></div><div id="path14-h2o" class="chart"></div><div id="path14-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-15" data-src="img/furnace-14-15.png">
				<p>PATH15</p><div id="path15-temp" class="chart"></div><div id="path15-co" class="chart"></div><div id="path15-h2o" class="chart"></div><div id="path15-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-16" data-src="img/furnace-14-16.png">
				<p>PATH16</p><div id="path16-temp" class="chart"></div><div id="path16-co" class="chart"></div><div id="path16-h2o" class="chart"></div><div id="path16-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-17" data-src="img/furnace-14-17.png">
				<p>PATH17</p><div id="path17-temp" class="chart"></div><div id="path17-co" class="chart"></div><div id="path17-h2o" class="chart"></div><div id="path17-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-18" data-src="img/furnace-14-18.png">
				<p>PATH18</p><div id="path18-temp" class="chart"></div><div id="path18-co" class="chart"></div><div id="path18-h2o" class="chart"></div><div id="path18-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-19" data-src="img/furnace-14-19.png">
				<p>PATH19</p><div id="path19-temp" class="chart"></div><div id="path19-co" class="chart"></div><div id="path19-h2o" class="chart"></div><div id="path19-o2" class="chart"></div>
			</div>
			<hr>
			<div class="row justify-content-center path" id="path-20" data-src="img/furnace-14-20.png">
				<p>PATH20</p><div id="path20-temp" class="chart"></div><div id="path20-co" class="chart"></div><div id="path20-h2o" class="chart"></div><div id="path20-o2" class="chart"></div>
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
					$statement = $pdo->prepare("SELECT Path11_14CO_Concentration, Path11_14H2O_Concentration, Path11_14O2_Concentration, Path11_14TempF, Path12_14CO_Concentration, Path12_14H2O_Concentration, Path12_14O2_Concentration, Path12_14TempF, Path13_14CO_Concentration, Path13_14H2O_Concentration, Path13_14O2_Concentration, Path13_14TempF, Path14_14CO_Concentration, Path14_14H2O_Concentration, Path14_14O2_Concentration, Path14_14TempF, Path15_14CO_Concentration, Path15_14H2O_Concentration, Path15_14O2_Concentration, Path15_14TempF, Path16_14CO_Concentration, Path16_14H2O_Concentration, Path16_14O2_Concentration, Path16_14TempF, Path17_14CO_Concentration, Path17_14H2O_Concentration, Path17_14O2_Concentration, Path17_14TempF, Path18_14CO_Concentration, Path18_14H2O_Concentration, Path18_14O2_Concentration, Path18_14TempF, Path19_14CO_Concentration, Path19_14H2O_Concentration, Path19_14O2_Concentration, Path19_14TempF, Path20_14CO_Concentration, Path20_14H2O_Concentration, Path20_14O2_Concentration, Path20_14TempF FROM OPENQUERY ORDER BY id DESC LIMIT 1");
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
					// h2o gauge
					var chartTemp = Highcharts.chart('path11-h2o', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path11_14H2O_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path11-o2', Highcharts.merge(gaugeOptions, {
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
					// h2o gauge
					var chartTemp = Highcharts.chart('path12-h2o', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path12_14H2O_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path12-o2', Highcharts.merge(gaugeOptions, {
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
					// h2o gauge
					var chartTemp = Highcharts.chart('path13-h2o', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path13_14H2O_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path13-o2', Highcharts.merge(gaugeOptions, {
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
					// h2o gauge
					var chartTemp = Highcharts.chart('path14-h2o', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path14_14H2O_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path14-o2', Highcharts.merge(gaugeOptions, {
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
					// h2o gauge
					var chartTemp = Highcharts.chart('path15-h2o', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path15_14H2O_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path15-o2', Highcharts.merge(gaugeOptions, {
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
					// h2o gauge
					var chartTemp = Highcharts.chart('path16-h2o', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path16_14H2O_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path16-o2', Highcharts.merge(gaugeOptions, {
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
					// h2o gauge
					var chartTemp = Highcharts.chart('path17-h2o', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path17_14H2O_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path17-o2', Highcharts.merge(gaugeOptions, {
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
					// h2o gauge
					var chartTemp = Highcharts.chart('path18-h2o', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path18_14H2O_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path18-o2', Highcharts.merge(gaugeOptions, {
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
					// h2o gauge
					var chartTemp = Highcharts.chart('path19-h2o', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path19_14H2O_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path19-o2', Highcharts.merge(gaugeOptions, {
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
					// h2o gauge
					var chartTemp = Highcharts.chart('path20-h2o', Highcharts.merge(gaugeOptions, {
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
							data: [<?php echo $data[0][Path20_14H2O_Concentration]; ?>],
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
					var chartTemp = Highcharts.chart('path20-o2', Highcharts.merge(gaugeOptions, {
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