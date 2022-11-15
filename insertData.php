<?php 
require_once("db-connect.php");
// Data
$data = (array) json_decode(file_get_contents("php://input"));

// sanitizing data
$first_name = trim(addslashes($conn->real_escape_string($data['first_name'] ?? "")));
$middle_name = trim(addslashes($conn->real_escape_string($data['middle_name'] ?? "")));
$last_name = trim(addslashes($conn->real_escape_string($data['last_name'] ?? "")));
$email = trim(addslashes($conn->real_escape_string($data['email'] ?? "")));
$contact = trim(addslashes($conn->real_escape_string($data['contact'] ?? "")));

/**
 * Save Data After the successfull validation
 */
$sql = "INSERT INTO `members` (`first_name`, `middle_name`, `last_name`, `email`, `contact`) VALUES ('{$first_name}', '{$middle_name}', '{$last_name}', '{$email}', '{$contact}')";
$insert = $conn->query($sql);
if($insert){
    $response = ["status" => 'success'];
}else{
$response = ['status' => 'error', 'errors' => ["error_msg" => "There's an error occurred while saving the data. Error: ".$conn->error]];

}

// Return Response
echo json_encode($response);