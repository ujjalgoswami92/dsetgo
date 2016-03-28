<?php
require 'connect.inc.php';
require 'core.inc.php';
$content2='<input type="Submit" name="MainMenu" value="MainMenu">';
$content='<h2>All Customers</h2>
<div  style="width:800px;margin-left:-60px;" >
  <div class="table4">
    <?php echo $dynamicList ?>
    </div>
</div>';
require 'header.php';

?>
<?php
           $sql2 = "SELECT * FROM dsetgo_customer";
           $result = $conn->query($sql2);
           $dynamicList1="<table ><tr ><td>CusID</td><td>FirstName</td><td>LastName</td><td>PhoneNumber</td><td>Email ID</td><td>Status</td></tr>";
           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
    //           echo "Customerid: " . $row["cid"]. " - Name: " . $row["cfirstname"]. " " . $row["clastname"]. " " . $row["caddress"]. " " . $row["cphonenumber"]. " " . $row["cemailid"]. " " . $row["creferralcode"]." ". $row["creferredby"]." ".$row["cstatus"].  " " . $row["reg_date"]."<br>";

  $dynamicList .='<tr><td >'.'<a href="customerprofile.php?id='.$row["cid"].'"  title="customerid">'. $row["cid"].'</td><td >'. $row["cfirstname"].'</td><td >'. $row["clastname"].'</td><td >'. $row["cphonenumber"].'</td><td >'. $row["cemailid"].'</td><td >'. $row["cstatus"].'</td></tr>';
  //<tr><td><a href="bookprofile.php?id='.$row["cid"].'"  title="An image"></td></tr>';
  //"<tr><td >". $row["cid"]."</td><td >". $row["cfirstname"]."</td><td >". $row["clastname"]."</td><td >". $row["cphonenumber"]."</td><td >". $row["cemailid"]."</td><td >". $row["cstatus"]."</td></tr>";
//<a href="bookprofile.php?id='.$row["cid"].'"  title="An image">
               }
           } else {
               echo "Invalid data";
           }
           $dynamicList=$dynamicList1.$dynamicList."</table>";

          //echo $dynamicList;
           $conn->close();


         ?>

         <html>
         <head>
         
         <meta charset="utf-8">
         <link href="css/style.css" rel='stylesheet' type='text/css' />
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>

         </head>
