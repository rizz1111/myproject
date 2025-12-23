<?php

error_reporting(0);

include 'config.php';

// $username = $_REQUEST['username'];
// $name = $_REQUEST['name'];
// $email = $_REQUEST['email'];
// $contact = $_REQUEST['contact'];
// $password = md5($_REQUEST['password']);
// $gender = $_REQUEST['gender'];
// $city = $_REQUEST['city'];

$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = md5($_POST['password']);
$gender = $_POST['gender'];
$city = $_POST['city'];

/*echo $username;
echo $name;
echo $email;
echo $contact;
echo $password;
echo $gender;   
echo $city;
*/

// $insert_query = "INSERT INTO users (username, name, email, contact, password, gender, city) 
// VALUES ('$username', '$name', '$email', '$contact', '$password', '$gender', '$city')";

// $result = $db_connect->query($insert_query);

// if ($result === TRUE) {
//     $data = array("status"=>"success");
//     echo json_encode($data);
//     //echo "New record created successfully";
// } else {
//     $data = array("status"=>"error");
//     echo json_encode($data);
//     //echo "Error: " . $insert_query . "<br>" . $db_connect->error;
// }

$selectQuery = "SELECT * FROM users WHERE username='$username' OR email='$email' OR contact='$contact'";
$resultSelect = $db_connect->query($selectQuery);
$rowCount = mysqli_num_rows($resultSelect);

if($rowCount > 0){
    $data = array("status"=>"User already exists");
    echo json_encode($data);
    exit();
}
else{
    $insert_query = "INSERT INTO users (username, name, email, contact, password, gender, city) 
    VALUES ('$username', '$name', '$email', '$contact', '$password', '$gender', '$city')";
    $result = $db_connect->query($insert_query);
    if ($result === TRUE) {
        $data = array("status"=>"success");
        echo json_encode($data);
        //echo "New record created successfully";
    } else {
        $data = array("status"=>"error");
        echo json_encode($data);
        //echo "Error: " . $insert_query . "<br>" . $db_connect->error;
    }
}    

//echo $rowCount;
?>