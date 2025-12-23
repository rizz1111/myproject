<?php

include 'config.php';
$email = $_POST['email'] OR $username = $_POST['username'];
$password = md5($_POST['password']);
$selectQuery = "SELECT username FROM users WHERE (username='$username' OR email='$email') AND password='$password'";

$result = $db_connect->query($selectQuery);
$rowCount = mysqli_num_rows($result);

if($rowCount > 0){
    while($row = mysqli_fetch_assoc($result)){
        $userData[] = $row;
    }
    $data = array("status"=>"Login successful", "userData"=>$userData);
    print(json_encode($data));
}else{
    $data = array("status"=>"Login error");
    print(json_encode($data));
}

?>