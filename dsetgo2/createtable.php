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
$sql = "CREATE TABLE dsetgo_customer (
cid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
cfirstname VARCHAR(30) NOT NULL,
clastname VARCHAR(30) NOT NULL,
caddress VARCHAR(100),
cphonenumber VARCHAR(50),
cemailid VARCHAR(50),
creferralcode VARCHAR(50),
creferredby VARCHAR(50),
cstatus VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table customer created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
