<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/connectdb.php';
include_once '../objects/users.php';
 
// khởi tạo  database , và kết nối 
$database = new Database();
$db = $database->getConnection();
 
// Khởi tạo object user
$user = new User($db);
 
// query user
$stmt = $user->read();
$num = $stmt->rowCount();
 
// kiểm tra nếu nhiều hơn 1 bản ghi được tìm thấy
if($num>0){
 
    // users array
    $users_arr=array();
    $users_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['username'] to
        // just $username only
        extract($row);
 
        $user_item=array(
            "user_id" => $user_id,
            "username" => $username,
            "address" => html_entity_decode($address),
            "phone" => $phone,
            "password" => $password,
            "email" => $email,
            "modified" => $modified,
            "createdate" => $createdate,
            "is_block" => $is_block,
            "permision" => $permision
        );
 
        array_push($users_arr["records"], $user_item);
    }
 
    echo json_encode($users_arr);
}
 
else{
    echo json_encode(
        array("message" => "Không tìm thấy user nào.")
    );
}
?>