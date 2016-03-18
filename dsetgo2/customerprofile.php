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
         <?php
          $customerid=$_GET["id"];


                    $servername = "localhost";
                    $dbusername = "dsetgo321";
                    $dbpassword = "dsetgo321";

                    $dbname = "dsetgo";
                    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql2 = "SELECT * FROM dsetgo_customer where cid=$customerid";
                    $result = $conn->query($sql2);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $cfirstname=$row["cfirstname"];
                          $clastname=$row["clastname"];
                          $caddress=$row["caddress"];
                          $cphonenumber=$row["cphonenumber"];
                          $cemailid=$row["cemailid"];
                          $creferralcode=$row["creferralcode"];
                          $creferredby=$row["creferredby"];
                          $cstatus=$row["cstatus"];

             //               echo "Customerid: " . . " - Name: " . . " " . $row["clastname"]. " " . $row["caddress"]. " " . $row["cphonenumber"]. " " . $row["cemailid"]. " " . $row["creferralcode"]." ". $row["creferredby"]." ".$row["cstatus"].  " " . $row["reg_date"]."<br>";
                        }
                    } else {
                        echo "Invalid data";
                    }
                    $conn->close();
                  ?>
<form action="customerprofile.php" method="POST">
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

      <h2>CUSTOMER PROFILE</h2>
		<form action="customerprofile.php" method="post">
		   <div class="lable">
		    <div class="col_1_of_1 span_1_of_3"><input type="text" readonly name="cfirstname" placeholder="FirstName" value=<?php echo $cfirstname ?>></div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text" readonly name="clastname" placeholder="LastName" value=<?php echo $clastname ?>>
</div>
		   </div>
       <div class="lable">
		    <div class="col_1_of_1 span_1_of_3">	<input type="text" readonly name="caddress" placeholder="Customer Address" value=<?php echo $caddress ?>>
</div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text" readonly name="cphonenumber" placeholder="Phone Number" value=<?php echo $cphonenumber ?>></td>
</div>
		   </div>
       <div class="lable">
		    <div class="col_1_of_1 span_1_of_3">	<input type="text" readonly name="cemailid" placeholder="Email ID" value=<?php echo $cemailid ?>></td>
</div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text" readonly name="creferralcode"  placeholder="Referral code" value=<?php echo $creferralcode ?>></td>
</div>
		   </div>
       <div class="lable">
		    <div class="col_1_of_1 span_1_of_3">	<input type="text" readonly name="creferredby" placeholder="Referred By" value=<?php echo $creferredby ?>></td>
        </div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text" readonly name="cstatus" placeholder="Status" value="ACTIVE" value=<?php echo $cstatus ?>></td>
         </div>
		   </div>
		</form>
		</div>

</body>
</html>