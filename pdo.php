<?php
	
//shows available drivers/database
//print_r(PDO::getAvailableDrivers());



//connect to database
try{
	$connection = new PDO('mysql:host=localhost;dbname=samplecrud','root','');	
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
	//get system message for debuging
	//echo $e->getMessage();
	die('Sorry, connection to database failed');
}

$query = $connection->query('SELECT * FROM users');

while($row = $query->fetch(PDO::FETCH_OBJ)){
	echo '<p>' . $row->name . '</p>';
}


?>