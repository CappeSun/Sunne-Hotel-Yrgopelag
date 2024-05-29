<?php

declare(strict_types=1);

require '../../loadEnv.php';
require 'getRoomCount.php';

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");

if (!isset($_GET['key']) || $_GET['key'] !== getenv('API_KEY'))
	echo json_encode('invalid key');
else{
	for ($i=0; $i < getRoomCount(); $i++){ 
		if (isset($_GET['room'.$i.'Rent']) && $_GET['room'.$i.'Rent'] != '')
			updateDb($_GET['room0Rent'], 1);
	}
	echo json_encode('update complete');
}

function updateDb($rent, $id){
	$database = new PDO('sqlite:database.db');

	$statement = $database->prepare("
	    UPDATE roomsInfo
	    SET rent = :rent
	    WHERE id == :id
	");
	
	$statement->bindParam(':rent', $rent);
	$statement->bindParam(':id', $id);
	
	$statement->execute();
}