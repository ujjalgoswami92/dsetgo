<?php
require 'connect.inc.php';
session_start();
if($_SESSION["username"]=="")
{
  header("Location: login.php");
}
?>
<?php
function sendmail()
{
 $msg = "It was a pleasure serving you. Please find the receipt of your order as follows:\n\n\n"."<html><body>".$dr1."</body></html>"."\nWe hope to serve you again soon."."\n</br>-Team CaptainDhobi";
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
 ?>


<?php
if($_POST["additem"])
 {
   $max=$_POST["total"];
   $sum=0;
   $flag=0;
   for($i=1;$i<=$max;$i++)
   {
     if($_POST["qty".$i]!="")
     {
       $flag=1;
       $sum=$sum+$_POST["qty".$i]*$_POST["itemcost".$i];
   }
 }
 if($flag==1)
 {
       $orderid =  $cid.mt_rand();
       $sql = "INSERT INTO dsetgo_orders (orderid,oamount,cid,orderstatus)
       VALUES ('$orderid','$sum', '$cid','pending')";
       if ($conn->query($sql) === TRUE) {
           echo "order table updated successful";
       } else {
           echo "Error inserting data in order table: " . $conn->error;
       }



       for($i=1;$i<=$max;$i++)
       {
       if($_POST["qty".$i]!="")
       {
       $dr0='<tr><td><p><strong>Item Name</strong></p></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><p><strong>Item Cost</p></strong></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><p><strong>Item Qty</p></strong></td> ';
       //$sum=$sum+$_POST["qty".$i]*$_POST["itemcost".$i];
       $itemname=$_POST["itemname".$i];
       $itemcost=$_POST["itemcost".$i];
       $itemcategory=$_POST["itemcategory".$i];
       $itemqty=$_POST["qty".$i];
       echo $dr0;

       //echo $itemname.'    '.$itemcategory.'      '.$itemcost;
       $products.=$_POST["itemname".$i]."(".$_POST["qty".$i].")".",";
       $dr.='<tr><td>'.$_POST["itemname".$i].'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.$_POST["itemcost".$i].'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.$_POST["qty".$i].'</td></tr>';


       $dr1='<table>'.$dr0.$dr.'</table>'.'</br></br><p><strong>Total Amount: Rs'.$sum.'</p></strong></br></br>';




        $sql1="SELECT itemid, itemcost FROM dsetgo_products where itemname='$itemname' and itemcost=$itemcost";
         $result1=$conn->query($sql1);
        if ($result1->num_rows > 0 ) {
         $row1 = $result1->fetch_assoc();
        $sql3 = "INSERT INTO dsetgo_products_orders (itemid,orderid,quantity,orderprice)
        VALUES ('$row1[itemid]','$orderid','$itemqty','$row1[itemcost]')";
        if ($conn->query($sql3)==TRUE ) {
         echo "table products_orders updates successfully";
       } else {
         echo "Error updating products_orders table: " . $conn->error;
       }

       } else
        {
              echo "result2-->Invalid dataujj1";
        }
       } else {
          echo "result1-->Invalid dataujj2";
        }

       }








sendmail();

 }
 else {
   echo "nothing selected for order";
 }


}
 ?>

         <?php
           $sql2 = "SELECT * FROM dsetgo_products";
           $result = $conn->query($sql2);
          $dynamicList1='<fieldset><legend>Available Items:';
$i=1;
           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
              $itemcategory= $row["itemcategory"];
    $dynamicList .='</legend><input type="text" readonly name="itemname'.$i.'" value="'.$row["itemname"].'" /><input type="text" readonly name="itemcost'.$i.'" value="'.$row["itemcost"].'" /><input type="text"  name="qty'.$i.'" placeholder="qty" value=""><br />';
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
               $sql2 = "SELECT * FROM dsetgo_customer where cphonenumber='$PhoneNumber'";
               $result = $conn->query($sql2);
               if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {
               //   echo "Customerid: " . $row["cid"]. " - Name: " . $row["cfirstname"]. " " . $row["clastname"]. " " . $row["caddress"]. " " . $row["cphonenumber"]. " " . $row["cemailid"]. " " . $row["creferralcode"]." ". $row["creferredby"]." ".$row["cstatus"].  " " . $row["reg_date"]."<br>";
                  //$customerfound="true";
   $cfirstname=$row["cfirstname"];
   $clastname=$row["clastname"];
   $caddress=$row["caddress"];
   $cemailid=$row["cemailid"];
   $creferralcode=$row["creferralcode"];
   $creferredby=$row["creferredby"];
   $cstatus=$row["cstatus"];
   $cid=$row["cid"];
                   }
               } else {
                 //$customerfound="true";

                   echo "Customer not found!!";
               }

          ?>






         <?php
         $content2='<input type="Submit" name="MainMenu" value="MainMenu">';
         $content3='<input type="Submit" name="NewOrder" value="New Order">';
         $content="  <h2>CONFIRM ORDER</h2>
         <form  action='' method='post' >
            <div class='lable'>
             <div class='col_1_of_1 span_1_of_3'><input type='text'  name='cfirstname' placeholder='FirstName' readonly value=$cfirstname></div>
            </div>
            <div class='lable'>
              <div class='col_1_of_1 span_1_of_3'>	<input type='text'  name='clastname' placeholder='LastName' readonly  value=$clastname>
         </div>
            </div>
            <div class='lable'>
             <div class='col_1_of_1 span_1_of_3'>	<input type='text'  name='caddress' placeholder='Customer Address' readonly  value=$caddress>
         </div>
            </div>
            <div class='lable'>
             <div class='col_1_of_1 span_1_of_3'>	<input type='text'  name='cemailid' placeholder='Email ID'  readonly value=$cemailid></td>
         </div>
            </div>
            <div class='lable'>
              <div class='col_1_of_1 span_1_of_3'>	<input type='text'  name='cphonenumber' placeholder='Phone Number' readonly value=$cphonenumber></td>
           </div>
            </div>
            $dynamicList
            $dr1
            <input type='Submit' name='additem' value='Create Total/Generate Receipt'>
         </form>";
         require 'header.php';
         ?>
