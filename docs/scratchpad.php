<?php
echo "Path 01 (of 20)";
echo "<table style='border: solid 1px black;'>";
echo "<tr><th> CO </th><th> H2O </th><th> O2 </th><th> Path Temp </th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "localhost";
$username = "chuck";
$password = "root";
$dbname = "furnace-14";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT Path01_14CO_Concentration, Path01_14H2O_Concentration, Path01_14O2_Concentration, Path01_14TempF FROM OPENQUERY ORDER BY DateTimeStamp LIMIT 1"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

----------------------------------------------------------------------------------------------------------------------------

// used for example purposes
function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

// create initial empty chart
var ctx_live = document.getElementById("mycanvas");
var myChart = new Chart(ctx_live, {
  type: 'bar',
  data: {
    labels: [],
    datasets: [{
      data: [],
      borderWidth: 1,
      borderColor:'#00c0ef',
      label: 'liveCount',
    }]
  },
  options: {
    responsive: true,
    title: {
      display: true,
      text: "Chart.js - Dynamically Update Chart Via Ajax Requests",
    },
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
        }
      }]
    }
  }
});

// this post id drives the example data
var postId = 1;

// logic to get new data
var getData = function() {
  $.ajax({
    url: 'https://jsonplaceholder.typicode.com/posts/' + postId + '/comments',
    success: function(data) {
      // process your data to pull out what you plan to use to update the chart
      // e.g. new label and a new data point
      
      // add new label and data point to chart's underlying data structures
      myChart.data.labels.push("Post " + postId++);
      myChart.data.datasets[0].data.push(getRandomIntInclusive(1, 25));
      
      // re-render the chart
      myChart.update();
    }
  });
};

// get new data every 3 seconds
setInterval(getData, 3000);

----------------------------------------------------------------------------------------------------------------------------

						// The temp gauge
						var chartTemp = Highcharts.chart('container-temp', Highcharts.merge(gaugeOptions, {
						  yAxis: {
						    min: 0,
						    max: 2500,
						    title: {
						      text: 'Temp (F)'
						    }
						  },

						  credits: {
						    enabled: false
						  },

						  series: [{
						    name: 'Temp',
						    data: [1532],
						    dataLabels: {
						      format: '{y}' + '<br>' + 'Temp (F)'
						    }
						  }]

						}));