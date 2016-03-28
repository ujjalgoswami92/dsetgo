<?php
require 'connect.inc.php';
require 'core.inc.php';

session_start();
?>
<?php
$username= $_SESSION["username"];
$type="";
// Create connection
$sql = "SELECT type FROM dsetgo_admin where username='$username'";
//echo $password;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
  //      echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

  $type=$row["type"];
    }
  }
if($type=="su")
{
  $hideorshowdiv='';

}
else {
  $hideorshowdiv='style="display:none;"';

}
        if($_POST["changepassword"])
        {
          header("location: changepassword.php");
        }

        else if($_POST["newadmin"])
        {
          header("location: newadmin.php");
        }

        else if($_POST["logout"])
          {
            header("Location: logout.php");
         }
         else if($_POST["NewUser"])
         {
           header("Location: newuser.php");
         }
         else if($_POST["NewOrder"])
         {
           header("Location: neworder.php");
         }
         else if($_POST["ViewCustomers"])
         {
           header("Location: viewcustomers.php");
         }
         else if($_POST["ViewProducts"])
         {
           header("Location: viewproducts.php");
         }
         else if($_POST["addproducts"])
         {
           header("Location: addproducts.php");
         }
 $conn->close();
         ?>
<form action="homepageadmin.php" method="POST">
  <table>
<tr>
<td>
<input type="Submit" disabled name="newadmin" value='Welcome <?php echo $_SESSION["username"];?>'>
</td>
<td>
<input type="Submit" name="logout" value="Logout">
</td>
<td>
<?php echo $content2;?>
</td>
<td>
</td>
</tr>
  </table>
</form>


<!DOCTYPE html>
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
<body>
<div class="main">
<?php echo $content; ?>

		</div>
</body>
</html>
