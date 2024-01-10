<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

function fetchData($id){
	$database = new PDO('sqlite:database.db');

	$statement = $database->prepare("
	    SELECT start, end
	    FROM roomsBooking
	    WHERE roomId == :id
	");
	
	$statement->bindParam(':id', $id);
	
	$statement->execute();

	$fetchData = $statement->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($fetchData);
} fetchData($_GET['id']);