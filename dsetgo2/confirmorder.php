<?php
require 'connect.inc.php';
session_start();
if($_SESSION["username"]=="")
{
  header("Location: login.php");
}
?>
<?php
function sendmail($cemailid,$message)
{

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


// Sending email
if(mail($to, $subject, $message, $headers)){
echo 'Your mail has been sent successfully.';
} else{
echo 'Unable to send email. Please try again.';
}

}
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

       $oreg_date="";
       $sql="SELECT reg_date from dsetgo_orders where orderid='$orderid'";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
         $row = $result->fetch_assoc();

       $oreg_date= $row["reg_date"];
       }
       else
         {
           echo "no data found";
         }

$sum=0;

       for($i=1;$i<=$max;$i++)
       {
       if($_POST["qty".$i]!="")
       {


         $dynamicList0="<table cellspacing='0' cellpadding='0' border='0' width='650' style='border:1px solid #eaeaea'><thead><tr><th align='left' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Item</th><th align='left' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Type</th><th align='center' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Quantity</th><th align='left' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Price</th><th align='right' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Subtotal</th></tr></thead><tbody bgcolor='#F6F6F6'>";


       $dr0='<tr><td><p><strong>Item Name</strong></p></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><p><strong>Item Cost</p></strong></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><p><strong>Item Qty</p></strong></td> ';
       //$sum=$sum+$_POST["qty".$i]*$_POST["itemcost".$i];
       $itemname=$_POST["itemname".$i];
       $itemcost=$_POST["itemcost".$i];
       $itemcategory=$_POST["itemcategory".$i];
       $itemqty=$_POST["qty".$i];
       $sum_item=$_POST["qty".$i]*$_POST["itemcost".$i];
       $sum=$sum+$sum_item;
       echo $itemcategory;


       $dynamicList1.="<tr><td align='left' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'> <strong style='font-size:11px'> $itemname</strong></td><td align='left' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'>$itemcategory</td><td align='center' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'> $itemqty </td><td align='center' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'> ₹$itemcost</td><td align='center' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'>₹$sum_item</td></tr>";




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
       $dynamicList1= $dynamicList0.$dynamicList1;
       $dynamicList1.="</tbody><tbody></tbody><tbody><tr><td colspan='5' align='right' style='padding:3px 9px'> Total</td><td align='right' style='padding:3px 9px'> <span>₹$sum</span></td></tr><tr><td colspan='5' align='right' style='padding:3px 9px'> Shipping &amp; Handling</td><td align='right' style='padding:3px 9px'> <span>₹0</span></td></tr><tr><td colspan='5' align='right' style='padding:3px 9px'> Discount </td><td align='right' style='padding:3px 9px'> <span>₹0</span></td></tr><tr><td colspan='5' align='right' style='padding:3px 9px'> <strong>Grand Total</strong></td><td align='right' style='padding:3px 9px'> <strong><span>₹$sum</span></strong></td></tr></tbody></table>";






       $message="
       <div style='background:#f6f6f6;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0'><div class='adM'>
         </div><table cellspacing='0' cellpadding='0' border='0' width='100%'>
           <tbody><tr>
             <td align='center' valign='top' style='padding:20px 0 20px 0'><table bgcolor='#FFFFFF' cellspacing='0' cellpadding='10' border='0' width='650' style='border:1px solid #e0e0e0'>

                 <tbody><tr>
                   <td valign='top'><a href='http://www.captaindhobi.com/' target='_blank'><img src='http://www.captaindhobi.com/admindsetgo/images.captaindhobi.jpg' alt='DCGPAC' style='margin-bottom:10px' border='0' class='CToWUd'></a></td>
                 </tr>

                 <tr>
                   <td valign='top'><h1 style='font-size:22px;font-weight:normal;line-height:22px;margin:0 0 11px 0'>Hello, $cfirstname  $clastname </h1>
                   <p style='font-size:12px;line-height:16px;margin:0'> Thank you for your order. We will take care of your clothes. We will send you updates
                       to help you track your order. For any query kindly contact us on support@captaindhobi.com or call us on +9958563058</p></td>
                 </tr>
                 <tr>
                   <td><h2 style='font-size:18px;font-weight:normal;margin:0'>Your Order $orderid <small> (placed on $oreg_date) </small></h2></td>
                 </tr>

                 <tr>
                   <td>

       $dynamicList1
                 </td></tr>

                 <tr>

                   <td><table cellspacing='0' cellpadding='0' border='0' width='650'>
                       <thead>
                         <tr>
                           <th align='left' width='325' bgcolor='#EAEAEA' style='font-size:13px;padding:5px 9px 6px 9px;line-height:1em'>Billing Information:</th>
                           <th width='10'></th>
                           <th align='left' width='325' bgcolor='#EAEAEA' style='font-size:13px;padding:5px 9px 6px 9px;line-height:1em'>Payment Method:</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td valign='top' style='font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea'>Name: $cfirstname  $clastname <br>
                           Email: $cemailid <br>
                           Phone: $cphonenumber
        </td>
                           <td>&nbsp;</td>
                           <td valign='top' style='font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea'> <p>Cash on Delivery</p> </td>
                         </tr>
                       </tbody>
                     </table>
                     <br>

                     <table cellspacing='0' cellpadding='0' border='0' width='650'>
                       <thead>
                         <tr>
                           <th align='left' width='325' bgcolor='#EAEAEA' style='font-size:13px;padding:5px 9px 6px 9px;line-height:1em'>Shipping Information:</th>
                           <th width='10'></th>
                           <th align='left' width='325' bgcolor='#EAEAEA' style='font-size:13px;padding:5px 9px 6px 9px;line-height:1em'>Shipping Method:</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td valign='top' style='font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea'>

                           Address: $caddress


                             &nbsp; </td>
                           <td>&nbsp;</td>
                           <td valign='top' style='font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea'> Ground Shipping
                             &nbsp; </td>
                         </tr>
                       </tbody>
                     </table>
                     <br>
                      </td>
                 </tr>
                 <tr>
                   <td bgcolor='#EAEAEA' align='center' style='background:#eaeaea;text-align:center'><center>
                       <p style='font-size:12px;margin:0'>Thank you, we hope you liked our service<strong></strong></p>
                     </center></td>
                 </tr>
               </tbody></table></td>
           </tr>
         </tbody></table><div class='yj6qo'></div><div class='adL'>
       </div></div>
       ";

sendmail($cemailid,$message);

 }
 else {
   echo "nothing selected for order";
 }


}
 ?>

         <?php
           $sql2 = "SELECT * FROM dsetgo_products";
           $result = $conn->query($sql2);
          $dynamicList5='<fieldset><legend>Available Items:';
$i=1;
           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
              $itemcategory= $row["itemcategory"];
    $dynamicList .='</legend><input type="text" readonly name="itemname'.$i.'" value="'.$row["itemname"].'" /><input type="text" readonly name="itemcategory'.$i.'" value="'.$row["itemcategory"].'" /><input type="text" readonly name="itemcost'.$i.'" value="'.$row["itemcost"].'" /><input type="text"  name="qty'.$i.'" placeholder="qty" value=""><br />';
    $i=$i+1;
           }
           } else {
               echo "Invalid data";
           }
           $i=$i-1;
           $dynamicList=$dynamicList5.$dynamicList.'</fieldset></br>'.'<input type="text" style="display:none;" readonly name="total" value="'.$i.'" />'
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
