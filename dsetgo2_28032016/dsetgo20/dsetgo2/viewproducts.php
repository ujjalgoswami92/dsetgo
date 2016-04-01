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

           $sql2 = "SELECT * FROM dsetgo_products";
           $result = $conn->query($sql2);
           $dynamicList1="<table ><tr ><td>ID</td><td>Product Name</td><td>Product Category</td><td>Product Cost</td></tr>";
           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
//              echo "Customerid: " . $row["cid"]. " - Name: " . $row["cfirstname"]. " " . $row["clastname"]. " " . $row["caddress"]. " " . $row["cphonenumber"]. " " . $row["cemailid"]. " " . $row["creferralcode"]." ". $row["creferredby"]." ".$row["cstatus"].  " " . $row["reg_date"]."<br>";

  $dynamicList .='<tr><td >'. $row["itemid"].'</td><td >'. $row["itemname"].'</td><td >'. $row["itemcategory"].'</td><td >'. $row["itemcost"].'</td></tr>';
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
         <style>
         .table4 {
         margin:0px;padding:2px;
         width:100%;	box-shadow: 10px 10px 5px #888888;
         border:0px solid #000000;

         -moz-border-radius-bottomleft:0px;
         -webkit-border-bottom-left-radius:0px;
         border-bottom-left-radius:0px;

         -moz-border-radius-bottomright:0px;
         -webkit-border-bottom-right-radius:0px;
         border-bottom-right-radius:0px;

         -moz-border-radius-topright:0px;
         -webkit-border-top-right-radius:0px;
         border-top-right-radius:0px;

         -moz-border-radius-topleft:0px;
         -webkit-border-top-left-radius:0px;
         border-top-left-radius:0px;
         }.table4 table{
         width:100%;
         height:10%;
         margin:0px;padding:0px;
         }.table4 tr:last-child td:last-child {
         -moz-border-radius-bottomright:0px;
         -webkit-border-bottom-right-radius:0px;
         border-bottom-right-radius:0px;
         }
         .table4 table tr:first-child td:first-child {
         -moz-border-radius-topleft:0px;
         -webkit-border-top-left-radius:0px;
         border-top-left-radius:0px;
         }
         .table4 table tr:first-child td:last-child {
         -moz-border-radius-topright:0px;
         -webkit-border-top-right-radius:0px;
         border-top-right-radius:0px;
         }.table4 tr:last-child td:first-child{
         -moz-border-radius-bottomleft:0px;
         -webkit-border-bottom-left-radius:0px;
         border-bottom-left-radius:0px;
         }.table4 tr:hover td{

         }.table4 tr:nth-child(odd){ background-color:#e5e5e5; }
         .table4 tr:nth-child(even)    { background-color:#ffffff; }
         .table4 td{
         vertical-align:middle;


         border:0px solid #000000;
         border-width:0px 1px 1px 0px;
         text-align:left;
         padding:7px;
         font-size:10px;
         font-family:arial;
         font-weight:normal;
         color:#000000;
         }.table4 tr:last-child td{
         border-width:0px 1px 0px 0px;
         }.table4 tr td:last-child{
         border-width:0px 0px 1px 0px;
         }.table4 tr:last-child td:last-child{
         border-width:0px 0px 0px 0px;
         }
         .table4 tr:first-child td{
         	background:-o-linear-gradient(bottom, #4c4c4c 5%, #000000 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #4c4c4c), color-stop(1, #000000) );	background:-moz-linear-gradient( center top, #4c4c4c 5%, #000000 100% );	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#4c4c4c", endColorstr="#000000");	background: -o-linear-gradient(top,#4c4c4c,000000);
         background-color:#4c4c4c;
         border:0px solid #000000;
         text-align:center;
         border-width:0px 0px 1px 1px;
         font-size:14px;
         font-family:arial;
         font-weight:bold;
         color:#ffffff;
         }
         .table4 tr:first-child:hover td{
         	background:-o-linear-gradient(bottom, #4c4c4c 5%, #000000 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #4c4c4c), color-stop(1, #000000) );	background:-moz-linear-gradient( center top, #4c4c4c 5%, #000000 100% );	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#4c4c4c", endColorstr="#000000");	background: -o-linear-gradient(top,#4c4c4c,000000);
         background-color:#4c4c4c;
         }
         .table4 tr:first-child td:first-child{
         border-width:0px 0px 1px 0px;
         }
         .table4 tr:first-child td:last-child{
         border-width:0px 0px 1px 1px;
         } </style>
         <meta charset="utf-8">
         <link href="css/style.css" rel='stylesheet' type='text/css' />
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>

         </head>

<form action="viewproducts.php" method="POST">
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
      <h2>ALL PRODUCTS</h2>
      <div  style="width:800px;margin-left:-60px;" >
        <div class="table4">
          <?php echo $dynamicList ?>
          </div>
		</div>

</body>
</html>
