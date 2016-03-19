<?php
require 'connect.inc.php';
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
                  else if($_POST["neworder"])
                  {
                     header("Location: neworder.php");
                  }
         ?>
         <?php
           $sql2 = "SELECT * FROM dsetgo_products";
           $result = $conn->query($sql2);
          $dynamicList1='<fieldset><legend>Available Items:';
$i=1;
           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
    $dynamicList .='</legend><input type="text" readonly name="itemname'.$i.'" value="'.$row["itemname"].'" /><input type="text" readonly name="itemcost'.$i.'" value="'.$row["itemcost"].'" /> <input type="text"  name="qty'.$i.'" placeholder="qty" value=""><br />';
    $i=$i+1;
           }
           } else {
               echo "Invalid data";
           }
           $i=$i-1;
           $dynamicList=$dynamicList1.$dynamicList.'</fieldset></br>'.'<input type="text" style="display:none;" readonly name="total" value="'.$i.'" />'
         ?>
         <?php
         $max=$_POST["total"];
         $PhoneNumber=$_GET["no"];
         $cphonenumber=$PhoneNumber;
               $customerfound="true";
               $sql2 = "SELECT * FROM dsetgo_customer where cphonenumber='$PhoneNumber'";
               $result = $conn->query($sql2);
               if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {
               //   echo "Customerid: " . $row["cid"]. " - Name: " . $row["cfirstname"]. " " . $row["clastname"]. " " . $row["caddress"]. " " . $row["cphonenumber"]. " " . $row["cemailid"]. " " . $row["creferralcode"]." ". $row["creferredby"]." ".$row["cstatus"].  " " . $row["reg_date"]."<br>";
                  $customerfound="true";
   $cfirstname=$row["cfirstname"];
   $clastname=$row["clastname"];
   $caddress=$row["caddress"];
   $cemailid=$row["cemailid"];
   $creferralcode=$row["creferralcode"];
   $creferredby=$row["creferredby"];
   $cstatus=$row["cstatus"];
                   }
               } else {
                 $customerfound="true";

                   echo "Customer not found!!";
               }


       if($_POST["additem"])
        {

          $sql2 = "SELECT * FROM dsetgo_customer where cphonenumber='$PhoneNumber'";
          $result2 = $conn->query($sql2);
          if ($result2->num_rows2 > 0) {
              while($row2 = $result2->fetch_assoc()) {
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
}

        //  $j=1;$k=2;
          $max=$_POST["total"];
          //echo $max;
          $sum=0;
          for($i=1;$i<=$max;$i++)
          {
if($_POST["qty".$i]!="")
{
  $dr0='<tr><td><p><strong>Item Name</strong></p></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><p><strong>Item Cost</p></strong></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><p><strong>Item Qty</p></strong></td></tr>';
  $sum=$sum+$_POST["qty".$i]*$_POST["itemcost".$i];
  $dr.='<tr><td>'.$_POST["itemname".$i].'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.$_POST["itemcost".$i].'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.$_POST["qty".$i].'</td></tr>';
}

          }
          $dr1='<table>'.$dr0.$dr.'</table>'.'</br></br><p><strong>Total Amount: Rs'.$sum.'</p></strong></br></br>';

          $msg = "Greetings ".$cfirstname."\n".",</br>It was a pleasure serving you. Please find the receipt of your order as follows:\n\n\n"."<html><body>".$dr1."</body></html>"."\nWe hope to serve you again soon."."\n</br>-Team CaptainDhobi";
          $msg = wordwrap($msg,70);
$to = $cemailid;
$subject = 'CaptainDhobi-Order Receipt!';
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
$message .= $msg;
$message .= '</body></html>';

// Sending email
if(mail($to, $subject, $message, $headers)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}

        }
         if($customerfound=="true")
         {
           $showorhidediv='';
    //       $showorhideregister='style="display:none;"';
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
<form action="confirmorder.php" method="POST">
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
<td>
  <div <?php echo $showorhideregister;?>>
    <input type="Submit" name="neworder" value="New Order">
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

      <h2>CONFIRM ORDER</h2>
		<form  action="" method="post" >


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
       <div class="lable">
         <div class="col_1_of_1 span_1_of_3">	<input type="text"  name="cphonenumber" placeholder="Phone Number" readonly value=<?php echo $cphonenumber ?>></td>
      </div>
       </div>
       <?php echo $dynamicList;?>
       <?php echo $dr1;?>
       <input type="Submit" name="additem" value="Create Total/Generate Receipt">

  </form>

</div>
</body>
</html>
