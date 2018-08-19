<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/connectdb.php';
include_once '../objects/users.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);
 
// set ID property of user to be edited
$user->user_id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of user to be edited
$user->readOne();
 
// create array
$user_arr = array(
    "user_id" =>  $user->user_id,
    "username" => $user->username,
    "address" => $user->address,
    "phone" => $user->phone,
    "password" => $user->password,
    "email" => $user->email,
    "modified" => $user->modified,
    "createdate" => $user->createdate,
    "is_block" => $user->is_block,
    "permision" => $user->permision
);
 
// make it json format
print_r(json_encode($user_arr));