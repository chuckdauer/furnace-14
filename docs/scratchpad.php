

----------------------------------------------------------------------------------------------------------------------------

Working DB code:

<?php
	//Database to JSON
	$servername = "localhost";
	$database = "furnace-14";
	$username = "chuck";
	$password = "root";

	try {
		$pdo = new PDO("mysql:dbname=$database;host=$servername", $username, $password);
		$statement = $pdo->prepare("SELECT Path01_14CO_Concentration, Path01_14H2O_Concentration, Path01_14O2_Concentration, Path01_14TempF FROM OPENQUERY ORDER BY DateTimeStamp LIMIT 1");
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

----------------------------------------------------------------------------------------------------------------------------
PHP current year with error protection:

<?php 
	function auto_copyright($year = 'auto'){
	   if(intval($year) == 'auto'){ $year = date('Y'); }
	   if(intval($year) == date('Y')){ echo intval($year); }
	   if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); }
	   if(intval($year) > date('Y')){ echo date('Y'); }
    }
?>

Usage:

<?php auto_copyright(); // 2019?>

<?php auto_copyright("2010");  // 2010 - 2019 ?>

----------------------------------------------------------------------------------------------------------------------------

Basic copyright w/ symbol + year:

&copy; <?php echo date("Y"); ?>

----------------------------------------------------------------------------------------------------------------------------

SCSS:
.furnace {
	position: relative;
	display: grid;

	.chart-containers {
		position: relative;
		text-align: center;

		.chart {
			display: inline-block;
			width: 200px;
			height: 250px;
			margin: auto;
		}
}

----------------------------------------------------------------------------------------------------------------------------



----------------------------------------------------------------------------------------------------------------------------