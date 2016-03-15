<?php
session_start();
if($_SESSION["username"]=="")
{
  header("Location: login.php");
}
?>
<?php
         if($_POST["Logout"])
                   {
                     header("Location: logout.php");
                  }
                  else if($_POST["MainMenu"])
                  {
                    header("Location: homepageadmin.php");
                  }
         ?>
<form action="newuser.php" method="POST">
<table>
<tr>
<td>
Welcome <?php echo $_SESSION["username"];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
<div class="lable">
 <div class="col_1_of_2 span_1_of_3">  <input type="Submit" name="logout" value="Logout">
</div>
</td>
<td>
<div class="lable">
 <div class="col_1_of_2 span_1_of_3">  <input type="Submit" name="MainMenu" value="MainMenu">
</div>
</td>
</tr>
</table>
</form>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="main">

      <h2>ADMIN LOGIN</h2>
		<form action="newuser.php" method="post">
		   <div class="lable">
		    <div class="col_1_of_1 span_1_of_3"><input type="text" name="cfirstname" placeholder="FirstName"></div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text" name="clastname" placeholder="LastName">
</div>
		   </div>
       <div class="lable">
		    <div class="col_1_of_1 span_1_of_3">	<input type="text" name="caddress" placeholder="Customer Address">
</div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text" name="cphonenumber" placeholder="Phone Number"></td>
</div>
		   </div>
       <div class="lable">
		    <div class="col_1_of_1 span_1_of_3">	<input type="text" name="cemailid" placeholder="Email ID"></td>
</div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text" name="creferralcode"  placeholder="Referral code"></td>
</div>
		   </div>
       <div class="lable">
		    <div class="col_1_of_1 span_1_of_3">	<input type="text" name="creferredby" placeholder="Referred By"></td>
        </div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text" name="cstatus" placeholder="Status" value="ACTIVE"></td>
         </div>
		   </div>
		   <input type="submit" name="Register" value="Register" >
		</form>
		</div>

</body>
</html>
<?php
         if($_POST["Register"])
         {

$cfirstname=$_POST["cfirstname"];
 $clastname=$_POST["clastname"];
 $caddress=$_POST["caddress"];
 $cphonenumber=$_POST["cphonenumber"];
 $cemailid=$_POST["cemailid"];
 $creferralcode=$_POST["creferralcode"];
 $creferredby=$_POST["creferredby"];
 $cstatus=$_POST["cstatus"];



           $servername = "localhost";
           $dbusername = "root";
           $dbpassword = "root";
           $dbname = "dsetgo";
           $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
           if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
           }
           $sql1 = "INSERT INTO dsetgo_customer (cfirstname, clastname,caddress,cphonenumber,cemailid,creferralcode,creferredby,cstatus)
           VALUES ('$cfirstname', '$clastname', '$caddress','$cphonenumber','$cemailid','$creferralcode','$creferredby','$cstatus')";
echo "Customer Added successfully!";
           if ($conn->query($sql1) === TRUE) {
           } else {
               echo "Error: " . $sql1 . "<br>" . $conn->error;
           }
}
         ?>
