<?php

$database = new PDO('sqlite:-stuff/database.db');

$fetchData = $database->query("
	SELECT *
	FROM roomsInfo
	")->fetchAll(PDO::FETCH_ASSOC);

?>