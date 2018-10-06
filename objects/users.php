<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $user_id;
    public $username;
    public $password;
    public $email;
    public $modified;
    public $createdate;
    public $is_block;
    public $permision;
    public $address;
    public $phone;

 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read users
    function read(){
 
        // select all query
        $query = "SELECT * FROM users";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        return $stmt;
    }

    // create user
    function create(){
     
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET
                    username=:username, phone=:phone, password=:password,email=:email,permision:=permision,address=:address, createdate=:createdate,is_block:=is_block";
     
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->permision=htmlspecialchars(strip_tags($this->permision));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->is_block=htmlspecialchars(strip_tags($this->is_block));
        $this->createdate=htmlspecialchars(strip_tags($this->createdate));
     
        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":permision", $this->permision);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":is_block", $this->is_block);
        $stmt->bindParam(":createdate", $this->createdate);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }


    // used when filling up the update user form
    function readOne(){
     
        // query to read single record
        $query = "SELECT
                   *
                FROM
                    users u
                WHERE
                    u.user_id = ?
                LIMIT
                    0,1";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind user_id of user to be updated
        $stmt->bindParam(1, $this->user_id);
     
        // execute query
        $stmt->execute();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->username=$row['username'];
        $this->phone=$row['phone'];
        $this->password=$row['password'];
        $this->email=$row['email'];
        $this->permision=$row['permision'];
        $this->address=$row['address'];
        $this->is_block=$row['is_block'];
        $this->createdate=$row['createdate'];
    }



    // update the user
    function update(){
     
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    username=:username, phone=:phone, password=:password,email=:email,detail_image=:detail_image,permision:=permision,address=:address, modified=:modified,is_block:=is_block
                WHERE
                    user_id = :user_id";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->permision=htmlspecialchars(strip_tags($this->permision));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->is_block=htmlspecialchars(strip_tags($this->is_block));
        $this->modified=htmlspecialchars(strip_tags($this->modified));
     
        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":permision", $this->permision);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":is_block", $this->is_block);
        $stmt->bindParam(":modified", $this->modified);
     
        // execute the query
        if($stmt->execute()){
            return true;
        }
     
        return false;
    }


    // delete the user
    function delete(){
     
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE user_id = ?";
     
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
     
        // bind user_id of record to delete
        $stmt->bindParam(1, $this->user_id);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }


    // search users
    function search($keywords){
     
        // select all query
        $query = "SELECT
                   *
                FROM
                    " . $this->table_name . " u
                WHERE
                    u.username LIKE ? ";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
     
        // bind
        $stmt->bindParam(1, $keywords);

        // execute query
        $stmt->execute();
     
        return $stmt;
    }


        // read users with pagination
    public function readPaging($from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT
                   *
                FROM  $this->table_name LIMIT ?, ?";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    // used for paging users
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }
}