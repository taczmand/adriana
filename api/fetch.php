<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../classes/database.php';
    include_once '../classes/clients.php';
	
    $database 	= new Database();
    $db 		= $database->getInstance();
    $client 	= new Client($db);
    $stmt 		= $client->getAllClients();
    $client_count 	= $stmt->rowCount();

    if($stmt->rowCount() > 0){
        
		$clients = $stmt->fetchAll();
        echo json_encode(
			array(
				"data" => $clients,
				"row_count" => $stmt->rowCount()
			)
		);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>