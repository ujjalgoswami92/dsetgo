<?php
// Start the session
session_start();
?>
<?php
 //header("Location: login.php");
 $username= $_POST["username"];
 $password=md5($_POST["password"]);
 $servername = "localhost";
 $dbusername = "root";
 $dbpassword = "root";
 $dbname = "dsetgo";

 // Create connection
 $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 $sql = "SELECT * FROM dsetgo_admin where username='$username' AND password='$password'";
 //echo $password;
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
   //      echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
   $_SESSION["username"] = $username;
   header("Location: homepageadmin.php");

     }
 } else {
//     echo "Invalid Username or Password";
 //session_unset();
 //session_destroy();
 header("Location: login.php");

 }
 $conn->close();


?>
