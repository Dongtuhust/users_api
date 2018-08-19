<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/connectdb.php';
include_once '../objects/users.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);
 
// get id of user to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of user to be edited
$user->user_id = $data->id;
 
// set user property values
$user->username = $data->username;
$user->phone = $data->phone;
$user->address = $data->address;
$user->email = $data->email;
$user->password = $data->password;
$user->is_block = $data->is_block;
$user->modified = date('Y-m-d H:i:s');
$user->permision = $data->permision;
 
// update the user
if($user->update()){
    echo '{';
        echo '"message": "Cập nhật thành công user"';
    echo '}';
}
 
// if unable to update the user, tell the user
else{
    echo '{';
        echo '"message": "Cập nhật thất bại"';
    echo '}';
}
?>