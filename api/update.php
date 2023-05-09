<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../classes/database.php';
    include_once '../classes/clients.php';
	
    $database 	= new Database();
    $db 		= $database->getInstance();
    $client 	= new Client($db);
    $data 		= json_decode(file_get_contents("php://input")); //Incoming request data
	$result		= null;
	$response	= array();
    
	foreach($data as $data_item) {
		$client->id 			= $data_item->id;
		$client->name 			= $data_item->name;
		$client->address 		= $data_item->address;
		$client->code 			= $data_item->code;
		$client->contract_date 	= date('Y-m-d H:i:s');
		if($client->updateClients()){
			$result = true;
		} else{
			$result = false;
		}
		$response[] = array(
			"data" => $data_item,
			"result" => $result
		);
	}
	print(json_encode($response));
?>