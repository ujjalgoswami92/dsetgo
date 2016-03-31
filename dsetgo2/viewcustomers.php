<?php
require 'connect.inc.php';
require 'core.inc.php';
$content2='<input type="Submit" name="MainMenu" value="MainMenu">';

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

           $conn->close();


         ?>
<?php
$content='<h2>All Customers</h2>
<div  style="width:800px;margin-left:-60px;" >
  <div class="table4">
    '.$dynamicList.'
    </div>
</div>';
require 'header.php';

?>
      
