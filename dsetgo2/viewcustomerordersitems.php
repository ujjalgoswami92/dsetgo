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

$orderid=$_GET["oid"];
//echo $orderid.'    ';

$sql2 = "SELECT do.cid, do.orderid, do.oamount FROM dsetgo_customer dc, dsetgo_orders do where dc.cid=do.cid and do.cid='$cid' ";

           $sql2 = "SELECT  dop.quantity, dp.itemname, dop.orderprice FROM dsetgo_products_orders dop, dsetgo_products dp, dsetgo_orders do where do.orderid=dop.orderid and dop.itemid=dp.itemid and do.orderid='$orderid'";
           $result = $conn->query($sql2);
           $dynamicList1="<table ><tr ><td>Quantity</td><td>ItemName</td><td>OrderCost</td></tr>";
           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
    //           echo "Customerid: " . $row["cid"]. " - Name: " . $row["cfirstname"]. " " . $row["clastname"]. " " . $row["caddress"]. " " . $row["cphonenumber"]. " " . $row["cemailid"]. " " . $row["creferralcode"]." ". $row["creferredby"]." ".$row["cstatus"].  " " . $row["reg_date"]."<br>";
          //  <a href="customerprofile.php?id='.$row["cid"].'

  $dynamicList .='<tr><td >'.$row["quantity"].'</td><td >'. $row["itemname"].'</td><td >'. $row["orderprice"].'</td></tr>';
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
         $content3='<input type="Submit" name="ViewCustomers" value="All Customers">';
         $content="<h2>Order Details</h2>
         <div  style='width:800px;margin-left:-60px;' >
           <div class='table4'>
             $dynamicList
             </div>
         </div>";
         require 'header.php';
         ?>
