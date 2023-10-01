<?php
// echo "hi";
// $dbhost = "sql106.infinityfree.com";
// $dbuser = "	if0_35113994";
// $dbpass = "yhr9x3cd";
// $dbname = "if0_35113994_bloodbank";
// echo "hddi";
// if(!$con = mysql_connect("sql106.infinityfree.com","if0_35113994","yhr9x3cd","if0_35113994_bloodbank"))
// {
// 	echo "failed to connect!";
// }else{
//     echo "Connected successfully";
// }
// $conn=mysql_connect($dbhost,$dbuser,$dbpass);
// echo "ja";
// mysql_select_db($dbname,$conn);
// echo "done";
session_start();
// echo "yesss";
// echo $_POST['gender'];
// Database connection
$mysqli = new mysqli("sql106.infinityfree.com", "if0_35113994", "yhr9x3cd", "if0_35113994_bloodbank");
echo "yees";
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "haa";

$hname = $_POST['hname'];
$hid = $_POST['hid'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$street = $_POST['street'];
$street2 = $_POST['street2'];
$country = $_POST['country'];
$city = $_POST['city'];
$region = $_POST['region'];
$postal = $_POST['postal'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// echo "values";
$insertQuery = "INSERT INTO hospital (hname, hid, email, password, phone, street, street2, country, city, region, postal) 
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// echo "query";               

// Use prepared statement to prevent SQL injection
$stmt2 = $mysqli->prepare($insertQuery);
// echo "query2"; 
           
// echo $hname, $hid, $email, $password, $phone, $street, $street2, $country, $city, $region, $postal;


if ($stmt2) {
    // Bind parameters and execute the statement
    $stmt2->bind_param("sssssssssss", $hname, $hid, $email, $hashed_password, $phone, $street, $street2, $country, $city, $region, $postal);
    // echo "hi";
    if ($stmt2->execute()) {
        // Record inserted successfully
        echo "Hospital registration successful! Go back and Login now!";
    } else {
        // Error occurred during execution
        echo "Error: " . $stmt2->error;
    }

    // Close the statement
    $stmt2->close();
} else {
    // Error occurred while preparing the statement
    echo "Error: " . $mysqli->error;
}
// echo "query3";               


// Close the database connection
$mysqli->close();
?>
