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

// sql to create table
$sql = "CREATE TABLE dsetgo_products (
itemid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
itemname VARCHAR(30) NOT NULL,
itemcost VARCHAR(10) NOT NULL,
itemcategory VARCHAR(20)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table customer created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
