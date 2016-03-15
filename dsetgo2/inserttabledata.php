<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dsetgo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$password2=md5("");
$sql = "INSERT INTO dsetgo_admin (firstname, lastname, username,password,type)
VALUES ('t', 't', 't','$password2','su')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
