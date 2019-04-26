

----------------------------------------------------------------------------------------------------------------------------

Image preloader:

// Pre-load images
window.onload = function() {
	setTimeout(function() {
		new Image().src = "img/furnace-14-01.png";
		new Image().src = "img/furnace-14-02.png";
		new Image().src = "img/furnace-14-03.png";
		new Image().src = "img/furnace-14-04.png";
		new Image().src = "img/furnace-14-05.png";
		new Image().src = "img/furnace-14-06.png";
		new Image().src = "img/furnace-14-07.png";
		new Image().src = "img/furnace-14-08.png";
		new Image().src = "img/furnace-14-09.png";
		new Image().src = "img/furnace-14-10.png";
		new Image().src = "img/furnace-14-11.png";
		new Image().src = "img/furnace-14-12.png";
		new Image().src = "img/furnace-14-13.png";
		new Image().src = "img/furnace-14-14.png";
		new Image().src = "img/furnace-14-15.png";
		new Image().src = "img/furnace-14-16.png";
		new Image().src = "img/furnace-14-17.png";
		new Image().src = "img/furnace-14-18.png";
		new Image().src = "img/furnace-14-19.png";
		new Image().src = "img/furnace-14-20.png";
	}, 1000);
};

----------------------------------------------------------------------------------------------------------------------------

PDO PHP DB:

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

JZHC Mac Name:

KII-220216

----------------------------------------------------------------------------------------------------------------------------

AWS EC2 Instance:

http://10.225.117.25/f14/furnace-14/furnace.php

----------------------------------------------------------------------------------------------------------------------------

MySQL Scratchpad:

SELECT id, DTS, Path01_14CO_Concentration, Path01_14H2O_Concentration, Path01_14O2_Concentration, Path01_14TempF FROM OPENQUERY ORDER BY DTS DESC LIMIT 1

SET GLOBAL event_scheduler = ON

SHOW EVENTS

DROP EVENT update_openquery

CREATE EVENT update_openquery
ON SCHEDULE EVERY 50 SECOND 
ON COMPLETION PRESERVE ENABLE
DO INSERT INTO furnace14.OPENQUERY (DTS, Path01_14CO_Concentration, Path01_14H2O_Concentration, Path01_14O2_Concentration, Path01_14TempF, Path02_14CO_Concentration, Path02_14H2O_Concentration, Path02_14O2_Concentration, Path02_14TempF, Path03_14CO_Concentration, Path03_14H2O_Concentration, Path03_14O2_Concentration, Path03_14TempF, Path04_14CO_Concentration, Path04_14H2O_Concentration, Path04_14O2_Concentration, Path04_14TempF, Path05_14CO_Concentration, Path05_14H2O_Concentration, Path05_14O2_Concentration, Path05_14TempF, Path06_14CO_Concentration, Path06_14H2O_Concentration, Path06_14O2_Concentration, Path06_14TempF, Path07_14CO_Concentration, Path07_14H2O_Concentration, Path07_14O2_Concentration, Path07_14TempF, Path08_14CO_Concentration, Path08_14H2O_Concentration, Path08_14O2_Concentration, Path08_14TempF, Path09_14CO_Concentration, Path09_14H2O_Concentration, Path09_14O2_Concentration, Path09_14TempF, Path10_14CO_Concentration, Path10_14H2O_Concentration, Path10_14O2_Concentration, Path10_14TempF, Path11_14CO_Concentration, Path11_14H2O_Concentration, Path11_14O2_Concentration, Path11_14TempF, Path12_14CO_Concentration, Path12_14H2O_Concentration, Path12_14O2_Concentration, Path12_14TempF, Path13_14CO_Concentration, Path13_14H2O_Concentration, Path13_14O2_Concentration, Path13_14TempF, Path14_14CO_Concentration, Path14_14H2O_Concentration, Path14_14O2_Concentration, Path14_14TempF, Path15_14CO_Concentration, Path15_14H2O_Concentration, Path15_14O2_Concentration, Path15_14TempF, Path16_14CO_Concentration, Path16_14H2O_Concentration, Path16_14O2_Concentration, Path16_14TempF, Path17_14CO_Concentration, Path17_14H2O_Concentration, Path17_14O2_Concentration, Path17_14TempF, Path18_14CO_Concentration, Path18_14H2O_Concentration, Path18_14O2_Concentration, Path18_14TempF, Path19_14CO_Concentration, Path19_14H2O_Concentration, Path19_14O2_Concentration, Path19_14TempF, Path20_14CO_Concentration, Path20_14H2O_Concentration, Path20_14O2_Concentration, Path20_14TempF)
VALUES (DATE_FORMAT(NOW(), '%c'"/"'%m'"/"'%y'" "'%T'), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1), ROUND((RAND() * (5000-100))+100), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (99.9-1))+1), ROUND((RAND() * (2500-1))+1))


SELECT DATE_FORMAT(NOW(), '%c'"/"'%m'"/"'%y'" "'%T')
