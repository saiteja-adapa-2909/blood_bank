<?php
// session_start();

// // Database connection
// $mysqli = new mysqli("localhost", "username", "password", "bloodbankxampp");

// if ($mysqli->connect_error) {
//     die("Connection failed: " . $mysqli->connect_error);
// }

session_start();
$mysqli = new mysqli("sql106.infinityfree.com", "if0_35113994", "yhr9x3cd", "if0_35113994_bloodbank");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to authenticate a user
function login($hid, $password) {
    
    global $mysqli;
    $query = "SELECT * FROM hospital WHERE hid = ? LIMIT 1";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $hid);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['hospital_id'] = $user['hid'];
            // $_SESSION['user_role'] = $user['role'];
            return true;
        }
    }
    return false;
}

// Function to check if a user is logged in
function is_logged_in() {
    return isset($_SESSION['hospital_id']);
}

// // Function to check if a user has admin role
// function is_admin() {
//     return (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin');
// }

// Example usage:
if (isset($_POST['submit'])) {
    // print "Hello, you clicked submit, Plese wait!";
    $hid = $_POST['hid'];
    $password = $_POST['password'];

    if (login($hid, $password)) {
        // Redirect to a protected page or display a success message
        echo "successfull";
        header("Location: hospital_portal.html");
        exit();
    } else {
        // Display an error message
        $error_message = "Invalid hospital ID or password.";
        echo "$error_message";
    }
}
?>

  