<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
 
// include database and object file
include_once '../config/connectdb.php';
include_once '../objects/users.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);
 
// get user id
$data = json_decode(file_get_contents("php://input"));
 
// set user id to be deleted
$user->user_id = $data->id;
 
// delete the user
if($user->delete()){
    echo '{';
        echo '"message": "Xóa thành công user"';
    echo '}';
}
 
// if unable to delete the user
else{
    echo '{';
        echo '"message": "Xóa thất bại"';
    echo '}';
}
?>