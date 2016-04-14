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
          $customerid=$_GET["id"];
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
                  <?php
                  $content2='<input type="Submit" name="MainMenu" value="MainMenu">';
                  $content3='<input type="Submit" name="NewOrder" value="New Order">';

                  $content="<h2>CUSTOMER PROFILE</h2>
                  <form action='viewcustomerorders.php' method='post'>
                   <div class='lable'>
                    <div class='col_1_of_1 span_1_of_3'><input type='text' readonly name='cfirstname' placeholder='FirstName' value=$cfirstname></div>
                   </div>
                   <div class='lable'>
                     <div class='col_1_of_1 span_1_of_3'>	<input type='text' readonly name='clastname' placeholder='LastName' value=$clastname>
                  </div>
                   </div>
                   <div class='lable'>
                    <div class='col_1_of_1 span_1_of_3'>	<textarea rows='3' cols='89' readonly name='comment' form='usrform'>$caddress</textarea>
                  </div>
                   </div>
                   <div class='lable'>
                     <div class='col_1_of_1 span_1_of_3'>	<input type='text' readonly name='cphonenumber' placeholder='Phone Number' value=$cphonenumber></td>
                  </div>
                   </div>
                   <div class='lable'>
                    <div class='col_1_of_1 span_1_of_3'>	<input type='text' readonly name='cemailid' placeholder='Email ID' value=$cemailid></td>
                  </div>
                   </div>
                   <div class='lable'>
                     <div class='col_1_of_1 span_1_of_3'>	<input type='text' readonly name='creferralcode'  placeholder='Referral code' value= $creferralcode></td>
                  </div>
                   </div>
                   <div class='lable'>
                    <div class='col_1_of_1 span_1_of_3'>	<input type='text' readonly name='creferredby' placeholder='Referred By' value=$creferredby></td>
                    </div>
                   </div>
                   <div class='lable'>
                     <div class='col_1_of_1 span_1_of_3'>	<input type='text' readonly name='cstatus' placeholder='Status' value='ACTIVE' value=$cstatus></td>
                     </div>
                   </div>
                   <td>
                   <div class='lable'>
                    <div class='col_1_of_2 span_1_of_3'>  <input type='Submit' name='ViewOrders' value='View Orders'>
                   </div>
                   </td>
                   <input type='text' readonly name='cid' style='display:none;' value=$customerid >
                  </form>";
                  require 'header.php';
                  ?>
