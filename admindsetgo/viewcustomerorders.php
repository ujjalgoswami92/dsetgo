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

          $cid=$_POST["cid"];
           $sql2 = "SELECT do.cid, do.orderid, do.oamount FROM dsetgo_customer dc, dsetgo_orders do where dc.cid=do.cid and do.cid='$cid' ";
           $result = $conn->query($sql2);

           $dynamicList1="<table ><tr ><td>OrderID</td><td>OrderAmount</td></tr>";

           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
    //           echo "Customerid: " . $row["cid"]. " - Name: " . $row["cfirstname"]. " " . $row["clastname"]. " " . $row["caddress"]. " " . $row["cphonenumber"]. " " . $row["cemailid"]. " " . $row["creferralcode"]." ". $row["creferredby"]." ".$row["cstatus"].  " " . $row["reg_date"]."<br>";
          //  <a href="customerprofile.php?id='.$row["cid"].'

  $dynamicList .='<tr><td >'.'<a href="viewcustomerordersitems.php?oid='.$row["orderid"].'"  title="orderid">'. $row["orderid"].'</td><td >'. $row["oamount"].'</td></tr>';
//'<a href="viewcustomerordersitems.php?id='.$row["orderid"].'"  title="orderid">' .

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
         <?php
         $content2='<input type="Submit" name="MainMenu" value="MainMenu">';
         $content="<h2>All Orders</h2>
         <div  style='width:800px;margin-left:-60px;' >
           <div class='table4'>
             $dynamicList 
             </div>
         </div>";
         require 'header.php';
         ?>
