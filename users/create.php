<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/connectdb.php';
 
// instantiate user object
include_once '../objects/users.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

// set user property values
$user->username = $data->username;
$user->phone = $data->phone;
$user->address = $data->address;
$user->email = $data->email;
$user->password = $data->password;
$user->is_block = $data->is_block;
$user->createdate = date('Y-m-d H:i:s');
$user->permision = $data->permision;
// create the user
if($user->create()){
    echo '{';
        echo '"message": "Tạo mới một user thành công"';
    echo '}';
}
 
// if unable to create the user, tell the user
else{
    echo '{';
        echo '"message": "Tạo mới thất bại"';
    echo '}';
}
?>