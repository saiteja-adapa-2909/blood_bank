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
// echo "yees";
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
// echo "haa";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$bloodgroup = $_POST['bloodgroup'];
$address = $_POST['address'];
$country = $_POST['country'];
$city = $_POST['city'];
$region = $_POST['region'];
$postal_code = $_POST['postal_code'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$insertQuery = "INSERT INTO users (user_name, email, password, phone_number, age, gender, bloodgroup, address, country, city, region, postal_code) 
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// echo "query";               

// Use prepared statement to prevent SQL injection
$stmt = $mysqli->prepare($insertQuery);
// echo "query2";               


if ($stmt) {
    // Bind parameters and execute the statement
    $stmt->bind_param("ssssssssssss", $username, $email, $hashed_password, $phone_number, $birthdate, $gender, $bloodgroup, $address, $country, $city, $region, $postal_code);

    if ($stmt->execute()) {
        // Record inserted successfully
        echo "User registration successful!";
    } else {
        // Error occurred during execution
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Error occurred while preparing the statement
    echo "Error: " . $mysqli->error;
}
// echo "query3";               


// Close the database connection
$mysqli->close();
?>

<html>
    <body>
        <a href="login_customer.html">Click here to login now! </a>
    </body>
</html>