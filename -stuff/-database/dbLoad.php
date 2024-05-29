<?php

declare(strict_types=1);

$database = new PDO('sqlite:'.__DIR__.'/database.db');

$fetchData = $database->query("
	SELECT *
	FROM roomsInfo
	")->fetchAll(PDO::FETCH_ASSOC);

?>