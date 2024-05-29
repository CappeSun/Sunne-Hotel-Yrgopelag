<?php

declare(strict_types=1);

function getRoomCount(){
	$database = new PDO('sqlite:'.__DIR__.'/database.db');

	$statement = $database->prepare("
	    SELECT COUNT(*) as count
	    FROM roomsInfo
	");
	
	$statement->execute();
	
	$fetchData = $statement->fetchAll(PDO::FETCH_ASSOC);

	return $fetchData[0]['count'];
}