<?php
require 'connect.inc.php';
require 'core.inc.php';

session_start();
?>
<?php
// $username= $_SESSION["username"];
// $type="";
// // Create connection
// $sql = "SELECT type FROM dsetgo_admin where username='$username'";
// //echo $password;
// $result = $conn->query($sql);
//
// if ($result->num_rows > 0) {
//     // output data of each row
//
//     while($row = $result->fetch_assoc()) {
//   //      echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//
//   $type=$row["type"];
//     }
//   }
// if($type=="su")
// {
//   $hideorshowdiv='';
//
// }
// else {
//   $hideorshowdiv='style="display:none;"';
//
// }
        if($_POST["changepassword"])
        {
          header("location: changepassword.php");
        }
        else if($_POST["newadmin"])
        {
          header("location: newadmin.php");
        }
        else if($_POST["viewadmins"])
        {
          header("location: viewadmins.php");
        }
        else if($_POST["newcustomer"])
        {
          header("location: newuser.php");
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
         else if($_POST["ViewOrders"])
         {
           $cid=$_GET["cid"];
           header('Location: viewcustomerorders.php?id='.$cid.'');
         }
         else if($_POST["registercustomer"])
         {
            header("Location: newuser.php");
         }
         else if($_POST["achangepassword"])
         {

$ausername=$_SESSION["username"];
$aoldpassword=md5($_POST["aoldpassword"]);
$anewpassword=md5($_POST["anewpassword"]);
$aconfirmnewpassword=md5($_POST["aconfirmnewpassword"]);

if ( $_POST["aoldpassword"]=='' || $_POST["anewpassword"]=='' ||$_POST["aconfirmnewpassword"]=='')
{
  echo "enter all the fields please";
}
else {

  if($anewpassword==$aconfirmnewpassword)
  {
    $sql1 = "select password from dsetgo_admin where username='$ausername'";
    $sql2 = "update dsetgo_admin set password='$aconfirmnewpassword' where username='$ausername' ";
    $result = $conn->query($sql1);

    if ($result->num_rows > 0) {
        // output data of each row

        while($row = $result->fetch_assoc()) {
      if($row["password"]==$aoldpassword)
      {
        if ($conn->query($sql2) === TRUE) {
          echo "password change successful!";
        } else {
          echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
      }
     else
      {
        echo "enter correct old password";
      }
  }
      }
    else {
      echo "Invalid current password!";
    }

 }
 else {
echo "new passwords dont match!";
   }
 }
}
         else if($_POST["addproduct"])
         {

 $itemname=$_POST["itemname"];
 $itemcategory=$_POST['category'];
 $itemcost=$_POST["itemcost"];

echo $itemcategory;

           $sql1 = "INSERT INTO dsetgo_products (itemname, itemcost,itemcategory)
           VALUES ('$itemname', '$itemcost','$itemcategory')";
           if ($conn->query($sql1) === TRUE) {
             echo "Item Added successfully!";
           } else {
               echo "Error: " . $sql1 . "<br>" . $conn->error;
           }

}
         else if($_POST["cid"])
         {
           echo $_POST["cid"];
         }
        else if($_POST["Registeradmin"])
         {

 $afirstname=$_POST["afirstname"];
 $alastname=$_POST["alastname"];
 $ausername=$_POST["ausername"];
 $apassword=md5($_POST["apassword"]);
 $address=$_POST["aaddress"];
 $aemailid=$_POST["aemailid"];
 $aphonenumber=$_POST["aphonenumber"];
 $astatus=$_POST["astatus"];
           $sql = "INSERT INTO dsetgo_admin (firstname, lastname, username,password,emailid,phonenumber,address,status,type)
           VALUES ('$afirstname', '$alastname', '$ausername','$apassword','$aemailid','$aphonenumber','$aaddress','$astatus', 'nonsu')";
           if ($conn->query($sql) === TRUE) {
             echo "Admin Added successfully!";

           } else {
               echo "Error: " . $sql . "<br>" . $conn->error;
           }
         }
         else if ($_POST["searchcustomer"])
         {
           $PhoneNumber=$_POST["cphonenumber"];
           $sql2 = "SELECT * FROM dsetgo_customer where cphonenumber='$PhoneNumber'";
           $result = $conn->query($sql2);
           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
             header('Location: confirmorder.php?no='.$PhoneNumber.'');
               }
           }
           else {
             echo "Customer not found";
           }
         }
         else if($_POST["Register"])
         {

$cfirstname=$_POST["cfirstname"];
 $clastname=$_POST["clastname"];
 $ccity="Gurgaon";
 $carea="Nirvana Country";
 $cFlatno_Society=$_POST["cFlatno_Society"];
 $caddress=$ccity."  ".$carea."  ".$cFlatno_Society;
 $cphonenumber=$_POST["cphonenumber"];
 $cemailid=$_POST["cemailid"];
 $creferralcode=$_POST["creferralcode"];
 $creferredby=$_POST["creferredby"];
 $cstatus=$_POST["cstatus"];
$cid=mt_rand();
           $sql1 = "INSERT INTO dsetgo_customer (cid,cfirstname, clastname,ccity,carea,cFlatno_Society,caddress,cphonenumber,cemailid,creferralcode,creferredby,cstatus)
           VALUES ('$cid','$cfirstname', '$clastname','$ccity','$carea','$cFlatno_Society', '$caddress','$cphonenumber','$cemailid','$creferralcode',null,'$cstatus')";

           if ($conn->query($sql1) === TRUE) {
             echo "Customer Added successfully!";
             $msg = "Thankyou for being a part of the captaindhobi. We here at Captain Dhobi are at determined to provide full customer satisfaction with your dhobi experience.\nWe will keep in touch.\n-Team CaptainDhobi";
             $msg = wordwrap($msg,70);
         $to = $cemailid;
         $subject = 'CaptainDhobi- Registration Successful!';
         $from = 'support@captaindhobi.com';

         // To send HTML mail, the Content-type header must be set
         $headers  = 'MIME-Version: 1.0' . "\r\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

         // Create email headers
         $headers .= 'From: '.$from."\r\n".
         'Reply-To: '.$from."\r\n" .
         'X-Mailer: PHP/' . phpversion();

         // Compose a simple HTML email message
         $message = '<html><body>';
         $message .='Greetings '.$cfirstname.',</br>';
         $message .= $msg;
         $message .= '</body></html>';

         // Sending email
         if(mail($to, $subject, $message, $headers)){
         echo 'Your mail has been sent successfully.';
         } else{
         echo 'Unable to send email. Please try again.';
         }
           }
            else {
               echo "Error: " . $sql1 . "<br>" . $conn->error;
           }
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
  <?php echo $content3;?>
</td>
<td>
  <?php echo $content4;?>
</td>
<td>
  <?php echo $content5;?>
</td>
<td>
  <?php echo $content6;?>
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
}
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
