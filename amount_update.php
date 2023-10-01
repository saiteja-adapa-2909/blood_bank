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

if (isset($_POST['submit'])) {
    // print "Hello, you clicked submit, Plese wait!";
    $bloodgroup = $_POST['bloodgroup'];
    $amount = $_POST['amount'];
    $hid2 = $_SESSION['hospital_id'];
    
    global $mysqli;
    

    $query = "SELECT * FROM bloodamount WHERE hid = ? AND bloodgroup = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $hid2,$bloodgroup);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows != 0) {
        $query1 = "UPDATE `bloodamount` SET `bloodgroup`=?,`amount`=? WHERE hid = ?";
        $stmt1 = $mysqli->prepare($query1);
        $stmt1->bind_param("sss", $bloodgroup,$amount,$hid2);
        // $stmt->execute();
        // $result = $stmt->get_result();
        
        if ($stmt1->execute()) {
            // Record inserted successfully
            echo "Selected Blood group details updated successfully!";
        } else {
            // Error occurred during execution
            echo "Error: " . $stmt1->error;
        }
    }else{
        $query2 = "INSERT INTO `bloodamount`(`hid`, `bloodgroup`, `amount`) VALUES (?,?,?)";
        $stmt2 = $mysqli->prepare($query2);
        $stmt2->bind_param("sss", $hid2,$bloodgroup,$amount);
        if ($stmt2->execute()) {
            // Record inserted successfully
            echo "Selected Blood group details inserted successfully!";
        } else {
            // Error occurred during execution
            echo "Error: " . $stmt1->error;
        }
    }
}
?>

<html>
    <head></head>
    <body>
    </body>
</html>    