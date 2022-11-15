<?php
require_once "db-connect.php";
if(!isset($_POST['field']) || !isset($_POST['value'])){
    echo json_encode(['status' => 'failed', 'error' => 'Invalid Field Value or Name']);
    exit;
}

$field = $_POST['field'];
$value = $_POST['value'];

switch($field){
    case 'first_name':
        if(empty($value))
            $error = "First Name is a required field";
        break;
    case 'last_name':
        if(empty($value))
            $error = "Last Name is a required field";
        break;
    case 'email':
        if(empty($value))
            $error = "Email is a required field";
        elseif(!(preg_match('/^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/', $value)))
            $error = "Invalid Email";
        else{
            $check = $conn->query("SELECT id FROM `members` where `email` = '{$value}'")->num_rows;
            if($check > 0){
                $error = "The email given is already existed on the database.";
            }
        }
        break;
    case 'contact':
        if(empty($value))
            $error = "Contact # is a required field";
        elseif(!(preg_match('/^09([0-9]{9})/', $value)))
            $error = "Invalid Format. Must start with 09 and must be 11 digit.";
        break;
}

if(isset($error)){
    echo json_encode(['status' => 'failed', 'error' => $error]);
}else{
    echo json_encode(['status' => 'success']);
}
exit;