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
$sql = "CREATE TABLE dsetgo_orders (
cid INT(6) NOT NULL,
orderid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
oamount VARCHAR(30) NOT NULL,
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
    echo "Table orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>


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
    echo "Table products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

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
$sql = "CREATE TABLE dsetgo_admin (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
username VARCHAR(50),
password VARCHAR(50),
type VARCHAR(5) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table admin created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>


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
$sql = "CREATE TABLE dsetgo_superuser (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
username VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table superuser created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dsetgo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE dsetgo_wallet (
  itemid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  cid INT(6) NOT NULL,
  wallet_amount VARCHAR(10) NOT NULL

)";


if ($conn->query($sql) === TRUE) {
    echo "Table customer wallet created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


?>
