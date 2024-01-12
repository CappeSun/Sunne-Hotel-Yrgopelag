<?php

declare(strict_types=1);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$database = new PDO('sqlite:database.db');

$fetchData = $database->query("
	SELECT *
	FROM roomsInfo
")->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($fetchData);