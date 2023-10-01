<?php
// Connect to the database (use mysqli or PDO)
session_start();
$mysqli = new mysqli("sql106.infinityfree.com", "if0_35113994", "yhr9x3cd", "if0_35113994_bloodbank");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$searchValue = isset($_GET['search']) ? $_GET['search'] : '';

$data = [];

$email = $_SESSION['email'];

$query5 = "SELECT user_name from users WHERE email=? LIMIT 1";

$stmt5 = $mysqli->prepare($query5);
$stmt5->bind_param("s", $email);

if ($stmt5->execute()) {
    $result5 = $stmt5->get_result();
    
    // Fetch the user_name
    $userRow = $result5->fetch_assoc();
    $user_name = $userRow['user_name'];
} else {
    echo "Error: " . $stmt5->error;
}


$query2 = "SELECT bloodamount.id, hospital.hname, bloodamount.hid, bloodamount.bloodgroup, bloodamount.amount 
           FROM bloodamount 
           INNER JOIN hospital ON bloodamount.hid = hospital.hid 
           WHERE bloodamount.bloodgroup = ?";

$stmt3 = $mysqli->prepare($query2);
$stmt3->bind_param("s", $searchValue);

if ($stmt3->execute()) {
    $result = $stmt3->get_result();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "Error: " . $stmt3->error;
}

$mysqli->close();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
        crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="customer_portal.css">
</head>

<body>
    <div class="container-fluid overall-cont">
        <nav class="navbar navbar-expand-lg navbar-light nav-bar-style p-3">
            <a class="navbar-brand text-light nav-head-style" href="#">Blood Bank</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline my-2 my-lg-0 ml-auto" method="get" action="blood_details.php">
                    <input class="form-control mr-sm-2 bg-dark search-box-style text-light" type="search" name="search"
                        id="search" placeholder="Type any bloodgroup" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" id="search_button" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div>
            <h1 class="top-head">Welcome, <span class="cust-name"><?php echo $user_name ?></span></h1> 
        </div>
        <div id="detailsCont" class="row text-center m-4">
            
            <?php foreach ($data as $row) { ?>
                <div class="col-12 col-md-4 col-lg-3 p-3">
                    <div class="details-card">
                        <p><?php echo $row['hname']; ?></p>
                        <p>ID: <?php echo $row['hid']; ?></p>
                        <p>Blood Group: <span><?php echo $row['bloodgroup']; ?></span></p>
                        <p>Litres: <span><?php echo $row['amount']; ?></span>Ltrs.</p>
                        <button class="btn btn-success">Request</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script>
        // let codeExecuted = false;
        
        // document.addEventListener("DOMContentLoaded", function () {
        //     if (!codeExecuted) {
        //         console.log("start");
        //         let search_button = document.getElementById("search_button");
        //         let new_para = document.createElement("p");
        //         new_para.textContent = "Please search for your required blood group!";
        //         new_para.classList.add("nav-head-style", "text-light", "ml-5");

        //         // Append the message initially
        //         document.getElementById("detailsCont").appendChild(new_para);

        //         search_button.addEventListener("click", function () {
        //             new_para.style.display = "none"; // Hide the message
        //         });

        //         codeExecuted = true;
        //     }
        // });
    </script>
</body>

</html>
