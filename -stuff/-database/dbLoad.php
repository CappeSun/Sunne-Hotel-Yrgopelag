<?php

declare(strict_types=1);

$database = new PDO('sqlite:-stuff/-database/database.db');

$fetchData = $database->query("
	SELECT *
	FROM roomsInfo
	")->fetchAll(PDO::FETCH_ASSOC);

?>