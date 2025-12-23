<?php

include 'config.php';

$userId = $_POST['userId'];
$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = md5($_POST['password']);
$gender = $_POST['gender'];
$city = $_POST['city'];

$selectQuery = "SELECT * FROM users WHERE userId='$userId'";
$result = $db_connect->query($selectQuery);
$rowcount = mysqli_num_rows($result);

if($rowcount > 0){
    $updateQuery = "UPDATE users SET 
    username='$username',
    name='$name',
    email='$email', 
    contact='$contact', 
    password='$password', 
    gender='$gender', 
    city='$city' WHERE userId='$userId'";
    $resultUpdate = $db_connect->query($updateQuery);

    if($resultUpdate === TRUE){
        $data = array("status"=>"Update successful");
        echo json_encode($data);
    }else{
        $data = array("status"=>"Update error");
        echo json_encode($data);
    }
}else{
    $data = array("status"=>"User not found");
    echo json_encode($data);
}

?>