<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/Database.php';
include_once '../class/User.php';
include_once '../class/Bond.php';
 
$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$bond = new Bond($db);

 
$data = json_decode(file_get_contents("php://input"));



	if($user->alter_user()){    
		http_response_code(200); 
		echo json_encode(array("message" => "User table altered."));
	} else {    
		http_response_code(503);   
		echo json_encode(array("message" => "Unable to alter user."));
	}

		
		if($bond->alter_bond()){    
		http_response_code(200); 
		echo json_encode(array("message" => "Bond table altered."));
	} else {    
		http_response_code(503);   
		echo json_encode(array("message" => "Unable to alter Bond."));
	}


