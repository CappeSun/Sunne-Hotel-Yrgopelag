<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents('php://input'), true);

$data = ['id' => 1, 'start' => 10, 'end' => 12, 'extras' => '100', 'name' => 'Kiawe', 'tCode' => 'test', 'redeem' => 'Nebby'];

if ($data['start'] > $data['end'] || $data['start'] > 31 || $data['start'] < 1 || $data['end'] > 31 || $data['end'] < 1){
	echo json_encode(['msg' => 'Invalid range']);
	return;
}

if ($data['redeem'] === 'Nebby')
	$data['extras'] = '000';

$database = new PDO('sqlite:database.db');

$statement = $database->prepare("
    SELECT rent
    FROM roomsInfo
    WHERE id == :id
");
	
$statement->bindParam(':id', $data['id']);
	
$statement->execute();

$cost = $statement->fetchAll(PDO::FETCH_ASSOC)[0]['rent']*($data['end']-$data['start']+1)/100 + $data['extras'][0]*2 + $data['extras'][1]*3 + $data['extras'][2]*6;

if ($data['redeem'] === 'Nebby')
	$data['extras'] = '111';

// echo json_encode($cost);

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query(['transferCode' => $data['tCode'], 'totalcost' => $cost]),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents('https://www.yrgopelag.se/centralbank/transferCode', false, $context);

echo $result;

function bookingDb(){
	$database = new PDO('sqlite:database.db');

	$statement = $database->prepare("
	    INSERT INTO roomsBookings (roomId, start, end, extras, customerName)
	    VALUES (:id, :start, :end, :extras, :name)
	");
	
	$statement->bindParam(':id', $data['id']);
	$statement->bindParam(':start', $data['start']);
	$statement->bindParam(':end', $data['end']);
	$statement->bindParam(':extras', $data['extras']);
	$statement->bindParam(':name', $data['name']);
	
	$statement->execute();
}