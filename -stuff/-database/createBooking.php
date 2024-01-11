<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents('php://input'), true);

$data = ['id' => 1, 'start' => 10, 'end' => 11, 'extras' => '000', 'name' => 'Kiawe', 'tCode' => 'f0cda91b-231c-46ab-bd8f-98a2d3f8b53c', 'redeem' => 'Nebby'];

if ($data['start'] > $data['end'] || $data['start'] > 31 || $data['start'] < 1 || $data['end'] > 31 || $data['end'] < 1){
	echo json_encode(['msg' => 'Invalid range']);
	return;
}

$database = new PDO('sqlite:database.db');

$statement = $database->prepare("
    SELECT start, end
    FROM roomsBooking
    WHERE id == :id
");

$statement->bindParam(':id', $data['id']);
	
$statement->execute();

$roomsBooked = $statement->fetchAll(PDO::FETCH_ASSOC);

// Check if range is vacant

if ($data['redeem'] === 'Nebby')
	$data['extras'] = '000';
else if (!($data['redeem'] === '')){
	echo json_encode(['msg' => 'Invalid redeem code']);
	return;
}

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

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query(['transferCode' => $data['tCode'], 'totalcost' => $cost]),
    ],
];

$context = stream_context_create($options);
$result = json_decode(file_get_contents('https://www.yrgopelag.se/centralbank/transferCode', false, $context));

if (!isset($result->amount)){
	echo json_encode(['msg' => 'Invalid transferCode']);
	return;
}

$statement = $database->prepare("
    INSERT INTO roomsBooking (roomId, start, end, extras, customerName)
    VALUES (:id, :start, :end, :extras, :name)
");

$statement->bindParam(':id', $data['id']);
$statement->bindParam(':start', $data['start']);
$statement->bindParam(':end', $data['end']);
$statement->bindParam(':extras', $data['extras']);
$statement->bindParam(':name', $data['name']);

$statement->execute();

echo json_encode([
	'island' => 'Melemele Island',
	'hotel' => 'Hotel Sunne',
	'arrival_date' => $data['start'].'-01-2024',
	'departure_date' => $data['end'].'-01-2024',
	'total_cost' => "$cost",
	'stars' => '5',
	'features' => [
		'Breakfast' => $data['extras'][0] === '1' ? 'yes' : 'no',
		'feature2' => $data['extras'][1] === '1' ? 'yes' : 'no',
		'feature3' => $data['extras'][2] === '1' ? 'yes' : 'no',
	],
	'additional_info' => 'Thank you for booking, we look forward to your visit',
]);