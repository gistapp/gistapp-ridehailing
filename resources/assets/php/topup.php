<?php
$servername = "127.0.0.1";
$username = "taxibeiz";
$password = "P@ssw0rd";
$dbname = "taxibeiz";


$conn = new mysqli($servername, $username, $password, $dbname); // Create connection
if ($conn->connect_error) {     // Check connection
    die("Connection failed: " . $conn->connect_error);
} 

$name = mysqli_real_escape_string($conn, $_POST['name']);
$amount = mysqli_real_escape_string($conn, $_POST['amount']);
$times = mysqli_real_escape_string($conn, $_POST['times']);

if (strlen($times) > 200000) {  $times = "";    }

$sql = "INSERT INTO user (wallet_balance)
VALUES ('$name', CURDATE(), '$amount', '$times') ON DUPLICATE KEY UPDATE    
date=CURDATE(), amount='$amount', times='$times'";

if ($conn->query($sql) === TRUE) {
    echo "Page saved!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>