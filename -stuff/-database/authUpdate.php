<?php

declare(strict_types=1);

require '../../loadEnv.php';

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");

if (!isset($_GET['key']) || $_GET['key'] !== getenv('API_KEY'))
	echo json_encode('invalid key');
else{
	if (isset($_GET['room0Rent']) && $_GET['room0Rent'] != '')
		updateDb($_GET['room0Rent'], 1);
	if (isset($_GET['room1Rent']) && $_GET['room1Rent'] != '')
		updateDb($_GET['room1Rent'], 2);
	if (isset($_GET['room2Rent']) && $_GET['room2Rent'] != '')
		updateDb($_GET['room2Rent'], 3);
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