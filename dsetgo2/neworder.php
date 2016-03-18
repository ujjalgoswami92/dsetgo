<?php
require 'connect.inc.php';
require 'core.inc.php';
session_start();
if($_SESSION["username"]=="")
{
  header("Location: login.php");
}
?>
<?php
         if($_POST["logout"])
                   {
                     header("Location: logout.php");
                  }
                  else if($_POST["MainMenu"])
                  {
                    header("Location: homepageadmin.php");
                  }
                  else if($_POST["registercustomer"])
                  {
                     header("Location: newuser.php");
                  }
         ?>
         <?php


           $sql2 = "SELECT * FROM dsetgo_products";
           $result = $conn->query($sql2);

           $dynamicList1='<select name="products" id="products" class="products">';
           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
    //           echo "Customerid: " . $row["cid"]. " - Name: " . $row["cfirstname"]. " " . $row["clastname"]. " " . $row["caddress"]. " " . $row["cphonenumber"]. " " . $row["cemailid"]. " " . $row["creferralcode"]." ". $row["creferredby"]." ".$row["cstatus"].  " " . $row["reg_date"]."<br>";

  $dynamicList .='<option value="'.$row["itemname"].'">'.$row["itemname"].'</option>';
  //<tr><td><a href="bookprofile.php?id='.$row["cid"].'"  title="An image"></td></tr>';
  //"<tr><td >". $row["cid"]."</td><td >". $row["cfirstname"]."</td><td >". $row["clastname"]."</td><td >". $row["cphonenumber"]."</td><td >". $row["cemailid"]."</td><td >". $row["cstatus"]."</td></tr>";
//<a href="bookprofile.php?id='.$row["cid"].'"  title="An image">
               }
           } else {
               echo "Invalid data";
           }
           $dynamicList=$dynamicList1.$dynamicList."</select>";

          //echo $dynamicList;
         ?>
         <?php

if($_POST["searchcustomer"])
          {
            $PhoneNumber=$_POST["cphonenumber"];


            $sql2 = "SELECT * FROM dsetgo_customer where cphonenumber='$PhoneNumber'";
            $result = $conn->query($sql2);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            //   echo "Customerid: " . $row["cid"]. " - Name: " . $row["cfirstname"]. " " . $row["clastname"]. " " . $row["caddress"]. " " . $row["cphonenumber"]. " " . $row["cemailid"]. " " . $row["creferralcode"]." ". $row["creferredby"]." ".$row["cstatus"].  " " . $row["reg_date"]."<br>";
               $customerfound="true";
$cphonenumber=$PhoneNumber;
$cfirstname=$row["cfirstname"];
$clastname=$row["clastname"];
$caddress=$row["caddress"];
$cemailid=$row["cemailid"];
$creferralcode=$row["creferralcode"];
$creferredby=$row["creferredby"];
$cstatus=$row["cstatus"];
                }
            } else {
              $customerfound="false";

                echo "Customer not found!!";
            }

         }
        else if($_POST["createorder"])
        {
echo "asd";
$customerfound="true";
        }
        else if($_POST["additem"])
        {

        }
         if($customerfound=="true")
         {
           $showorhidediv='';
           $showorhideregister='style="display:none;"';
         }
         else {
           $showorhidediv='style="display:none;"';
           $showorhideregister='';

         }
          $conn->close();
          ?>

         <head>
<style>
           #products option {
    width: 50px;
}
#products{
 width:150px;
}
.products {
   font-size: 50px;
}​
</style>
         </head>
<form action="neworder.php" method="POST">
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

      <h2>NEW ORDER</h2>
		<form action="neworder.php" method="post">
      <div class="lable">
        <div class="col_1_of_1 span_1_of_3">	<input type="text"  name="cphonenumber" placeholder="Phone Number" value=<?php echo $cphonenumber ?>></td>
     </div>
      </div>
      <input type="Submit" name="searchcustomer" value="Search Customer">

<div <?php echo $showorhidediv;?>>
		   <div class="lable">
		    <div class="col_1_of_1 span_1_of_3"><input type="text"  name="cfirstname" placeholder="FirstName" readonly value=<?php echo $cfirstname ?>></div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text"  name="clastname" placeholder="LastName" readonly  value=<?php echo $clastname ?>>
</div>
		   </div>
       <div class="lable">
		    <div class="col_1_of_1 span_1_of_3">	<input type="text"  name="caddress" placeholder="Customer Address" readonly  value=<?php echo $caddress ?>>
</div>
		   </div>
		   <div class="lable">
		    <div class="col_1_of_1 span_1_of_3">	<input type="text"  name="cemailid" placeholder="Email ID"  readonly value=<?php echo $cemailid ?>></td>
</div>
		   </div>
       <input type="Submit" name="additem" value="Add Item">
       <input type="Submit" name="createorder" value="Create Order">
       <input type="Submit" name="sendreceipt" value="Send  Receipt">

  	</div>
    <div <?php echo $showorhideregister;?>>
      <input type="Submit" name="registercustomer" value="Register Customer">
    </div>

  </form>

</div>
</body>
</html>
