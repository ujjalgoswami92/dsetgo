<?php
require 'connect.inc.php';
// sql to create table

//echo md5("qawsed");
$sql = "CREATE TABLE dsetgo_customer (
cid BIGINT(15) UNSIGNED PRIMARY KEY AUTO_INCREMENT ,
cfirstname VARCHAR(30) NOT NULL,
clastname VARCHAR(30),
cpassword VARCHAR(30),
ccity VARCHAR(20) ,
cname VARCHAR(20) ,
carea VARCHAR(20) ,
cFlatno_Society VARCHAR(20),
caddress VARCHAR(100) NOT NULL,
cphonenumber VARCHAR(50) UNIQUE NOT NULL,
cemailid VARCHAR(50) NOT NULL,
creferralcode VARCHAR(50) NOT NULL,
creferredby VARCHAR(50),
cstatus VARCHAR(50) NOT NULL,
chash VARCHAR( 32 ) NOT NULL ,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table customer created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

//sql to create table
$sql = "CREATE TABLE dsetgo_products (
itemid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
itemname VARCHAR(30) NOT NULL,
itemcost VARCHAR(10) NOT NULL,
itemcategory VARCHAR(20) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


// CONSTRAINT fk_PerOrders FOREIGN KEY (P_Id)
// REFERENCES Persons(P_Id)
// FOREIGN KEY (cid) REFERENCES dsetgo_customer(cid),
// FOREIGN KEY (oitemid) REFERENCES dsetgo_products(itemid)

// sql to create table
$sql = "CREATE TABLE dsetgo_orders (
orderid BIGINT(15) UNSIGNED PRIMARY KEY,
oamount DECIMAL(30) ,
cid BIGINT(15) UNSIGNED,
ocfirstname VARCHAR(30),
oclastname VARCHAR(30),
ocname VARCHAR(30),
ocemailid VARCHAR(50) ,
ocaddress VARCHAR(50),
reg_date TIMESTAMP,
orderstatus VARCHAR(50) NOT NULL,
regpickdate DATE,
regdropdate DATE,
regpicktime VARCHAR(20),
regdroptime VARCHAR(20),
notes VARCHAR(50),
FOREIGN KEY (cid) REFERENCES dsetgo_customer(cid),
CHECK (orderstatus in ('pending','received','processing','delivered'))

)";

if ($conn->query($sql) === TRUE) {
    echo "Table orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


// sql to create table
$sql = "CREATE TABLE dsetgo_products_orders (
itemid INT(6) UNSIGNED,
orderid BIGINT(15) UNSIGNED,
quantity INT(6) UNSIGNED,
orderprice VARCHAR(10),
FOREIGN KEY(itemid) REFERENCES dsetgo_products(itemid),
FOREIGN KEY (orderid) REFERENCES dsetgo_orders(orderid),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table products_orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


// sql to create table
$sql = "CREATE TABLE dsetgo_admin (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30),
username VARCHAR(50),
password VARCHAR(50),
phonenumber VARCHAR(50) UNIQUE NOT NULL,
emailid VARCHAR(50) NOT NULL UNIQUE,
address VARCHAR(100) NOT NULL ,
type VARCHAR(6) NOT NULL,
status VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table admin created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


//FOREIGN KEY (cid) REFERENCES dsetgo_customer(cid)

$sql = "CREATE TABLE dsetgo_wallet (
  itemid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  cid BIGINT(15) NOT NULL,
  wallet_amount VARCHAR(10) NOT NULL

)";


if ($conn->query($sql) === TRUE) {
    echo "Table customer wallet created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
 ?>
