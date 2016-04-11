<?php
require 'connect.inc.php';
require 'core.inc.php';


$PhoneNumber = $_POST['phonenumber']; //no default
$Webservicename=$_POST['name'];
$usernamedelivery=$_POST['user'];
$passworddelivery=$_POST['pass'];
$ostatus=$_POST['status'];
$item=$_POST['item'];
$itemtype=$_POST['itemtype'];

//For Customer Registration
$cfirstname=$_POST["cfirstname"];
 $clastname=$_POST["clastname"];
 $caddress=$_POST["caddress"];
 $cphonenumber=$_POST["cphonenumber"];
 $cemailid=$_POST["cemailid"];
 $creferredby=$_POST["creferredby"];
 $customerid=$_POST["customerid"];

$productKey=$_POST["productKey"];
$productQty=$_POST["productQty"];



function fetchCustomerData($PhoneNumber) {
	require 'connect.inc.php';
	require 'core.inc.php';
	$sql2 = "SELECT * FROM dsetgo_customer where cphonenumber='$PhoneNumber'";
  $result = $conn->query($sql2);
	$posts = array();

  if ($result->num_rows > 0) {
  $posts = array("success");

                    } else {
$posts = array("failure");

                    }

		header('Content-type: application/json');
		echo json_encode($posts);
}


function deliverylogin($usernamedelivery,$passworddelivery)
{
require 'connect.inc.php';
 	require 'core.inc.php';
 	$passworddelivery=md5($passworddelivery);
 	$sql2 = "SELECT * FROM dsetgo_delivery where username='$usernamedelivery' AND password='$passworddelivery'";
  $result = $conn->query($sql2);
	$posts = array();

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        				$posts = array("approved");
                    		}
                    } else {
                      $posts = array("declined");
                    }

		header('Content-type: application/json');
		echo json_encode($posts);
}
function fetchCustomerDetail($item,$itemtype)
{
 require 'connect.inc.php';
 	require 'core.inc.php';

switch($itemtype)
{
case 'phonenumber':
$itemtype='cphonenumber';
break;
case 'address':
$itemtype='ocaddress';
break;
case 'processing':

$itemtype='cphonenumber';
break;
}

 	 $sql2 = "select * from dsetgo_customer dc, dsetgo_orders do where dc.cid=do.cid and do.orderid='$item'";

  $result = $conn->query($sql2);
	$posts = array();



$posts = array();
$i=1;
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        				$posts[]=$row[$itemtype];
					$i++;
					}
                    } else {
                      $posts = array('customerdetail'=>"0");
                    }

		header('Content-type: application/json');
		echo json_encode($posts);

}
function orders($ostatus)
{
 require 'connect.inc.php';
 	require 'core.inc.php';

			$sql2 = "select * from dsetgo_orders where orderstatus='$ostatus' and regpickdate= CURDATE()";
  $result = $conn->query($sql2);
	$posts = array();
$i=1;
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        				$posts[]=(array($row["orderid"]));
					$i++;
					}
                    } else {
                      $posts = array('customerdetail'=>"0");
                    }

		header('Content-type: application/json');
		echo json_encode($posts);


}
function CustomerRegistration($cfirstname,$clastname,$caddress,$cphonenumber,$cemailid,$creferredby)
{
require 'connect.inc.php';
 	require 'core.inc.php';

 	if($cfirstname=='')
 	{
 	$cfirstname=NULL;
 	}
 	 if($clastname=='')
 	{
 	$clastname=NULL;

 	}
 	 if($caddress=='')
 	{
 	$caddress=NULL;

 	}
 	 if($cphonenumber=='')
 	{
 	$cphonenumber=NULL;

 	}
 	if($cemailid=='')
 	{
 	$cemailid=NULL;

 	}
 	 if($creferredby=='')
 	{
 	$creferredby=NULL;
 	}
$posts = array();
$sql1 = "INSERT INTO dsetgo_customer (cfirstname, clastname,caddress,cphonenumber,cemailid,creferralcode,creferredby,cstatus)
           VALUES ('$cfirstname', '$clastname', '$caddress','$cphonenumber','$cemailid','$cphonenumber','$creferredby','ACTIVE')";
           if ($conn->query($sql1) === TRUE) {

             $msg = "Thankyou for being a part of the captaindhobi.We here at Captain Dhobi are at determined to provide full customer satisfaction with your dhobi experience.\nWe will keep in touch.\n-Team CaptainDhobi";
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
         $posts = array("success");
        // echo 'Your mail has been sent successfully.';
         } else{
        // echo 'Unable to send email. Please try again.';
        $posts = array("failure");

         }
           }
            else {
             $posts = array("failure");
echo "Customer not added!";

           }
     header('Content-type: application/json');
     echo json_encode($posts);

}
function GetProducts()
{
require 'connect.inc.php';
 	require 'core.inc.php';
 $sql2 = "select * from dsetgo_products";

  $result = $conn->query($sql2);
	$posts = array();

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        				$posts[]=$row['itemname'];
					}
                    } else {
                      $posts = array('products'=>"0");
                    }

		header('Content-type: application/json');
		echo json_encode($posts);
}


function CreateOrder($cphonenumber,$productKey,$productQty)
{
require 'connect.inc.php';
 	require 'core.inc.php';
 	$productPrice=getPrice($productKey);
 	$productID=getID($productKey);

 //echo "phone:".$cphonenumber;
$customerdetails=getCustomerDatafromPhoneNumber($cphonenumber);
$customerdetailsArray=explode(',', $customerdetails);

foreach ($customerdetailsArray as $v1) {
$cfirstname=$customerdetailsArray[1];
$clastname=$customerdetailsArray[2];
$caddress=$customerdetailsArray[3];
$cemailid=$customerdetailsArray[0];
$customerid=$customerdetailsArray[4];


}


 	$productKeyArray = explode(',', $productKey);
 	$productQtyArray = explode(',', $productQty);
 	$productPriceArray = explode(',', $productPrice);
 	$productIDArray = explode(',', $productID);
 //	echo $cphonenumber;

 $orderid=getOrderID($cphonenumber);
// echo $orderid;

 //	 $orderid = substr( $customerid.mt_rand().microtime(), 0, 7);
    date_default_timezone_set("Asia/Kolkata");
 $t=time();

 $oreg_date=date("Y-m-d H:i:s",$t);

 	$i = 0; /* for illustrative purposes only */
$total=0;
$shipping=0;
$discount=0;
foreach ($productKeyArray as $v) {

  $sql3 = "INSERT INTO dsetgo_products_orders (itemid,orderid,quantity,orderprice,reg_date)
        VALUES ('$productIDArray[$i]','$orderid','$productQtyArray[$i]','$productPriceArray[$i]','$oreg_date')";
        if ($conn->query($sql3)==TRUE ) {
         echo "";
       } else {
         echo "Error updating products_orders table: " . $conn->error;
       }



      $subtotal[$i]= $productPriceArray[$i]*$productQtyArray[$i];
      $total=$total+$subtotal[$i];

         $dynamicList0="<table cellspacing='0' cellpadding='0' border='0' width='650' style='border:1px solid #eaeaea'><thead><tr><th align='center' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Item</th><th align='center' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Quantity</th><th align='center' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Price</th><th align='center' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Subtotal</th></tr></thead><tbody bgcolor='#F6F6F6'>";



         $dynamicList1.="<tr><td align='center' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'>  $productKeyArray[$i]</td><td align='center' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'> $productQtyArray[$i] </td><td align='center' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'> $productPriceArray[$i]</td><td align='center' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'>$subtotal[$i]</td></tr>";

    $i++;
}
 	//echo $productKeyArray." ".$productQtyArray." ".$productPriceArray;
 	$grandTotal=$total-$discount-$shipping;


 $sql1 = "update dsetgo_orders set oamount='$grandTotal' where orderid='$orderid'";
  if ($conn->query($sql1) === TRUE) {
  echo "";
  }
  else
  {
  echo "could not update status";
  }



$dynamicList1= $dynamicList0.$dynamicList1;
 $dynamicList1.="</tbody><tbody></tbody><tbody><tr><td colspan='5' align='right' style='padding:3px 9px'> Total</td><td align='right' style='padding:3px 9px'> <span>$total</span></td></tr><tr><td colspan='5' align='right' style='padding:3px 9px'> Shipping &amp; Handling</td><td align='right' style='padding:3px 9px'> <span>$shipping</span></td></tr><tr><td colspan='5' align='right' style='padding:3px 9px'> Discount </td><td align='right' style='padding:3px 9px'> <span>$discount</span></td></tr><tr><td colspan='5' align='right' style='padding:3px 9px'> <strong>Grand Total</strong></td><td align='right' style='padding:3px 9px'> <strong><span>$grandTotal</span></strong></td></tr></tbody></table>";




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

//echo $message;
updateStatus($orderid,'processing');

sendmail($cemailid,$message);
//updateStatus($orderid,'processing');
}
function getOrderID($cphonenumber)
{
require 'connect.inc.php';
 	require 'core.inc.php';

 	$sql2="select do.orderid from dsetgo_orders do, dsetgo_customer dc where do.orderstatus='pending' and  dc.cphonenumber='$cphonenumber' and do.cid=dc.cid limit 1";
 	//$sql2 = "select * from dsetgo_orders do dsetgo_customer dc where do.orderstatus='pending' and do.cid";

  $result = $conn->query($sql2);
	$posts = array();
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        				$orderid.=$row['orderid'].',';
					}
                    }
                    return $orderid;

}
function updateStatus($orderid,$status)
{
require 'connect.inc.php';
 	require 'core.inc.php';
//echo $orderid.$status;
$sql2 = "update dsetgo_orders set orderstatus='$status' where orderid='$orderid'";
  if ($conn->query($sql2) === TRUE) {
  echo "";
  }
  else
  {
  echo "could not update status";
  }
}
function getID($productKey)
{
require 'connect.inc.php';
 	require 'core.inc.php';

$productKeyArray = explode(',', $productKey);
$i=0;
foreach ($productKeyArray as $v) {

$sql2 = "select * from dsetgo_products where itemname='$productKeyArray[$i]'";

  $result = $conn->query($sql2);
	$posts = array();
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        				$itemid.=$row['itemid'].',';
					}
                    }

$i++;
}
return substr($itemid, 0, -1);
}


function getPrice($productKey)
{
require 'connect.inc.php';
 	require 'core.inc.php';

$productKeyArray = explode(',', $productKey);
$i=0;
foreach ($productKeyArray as $v) {

$sql2 = "select * from dsetgo_products where itemname='$productKeyArray[$i]'";

  $result = $conn->query($sql2);
	$posts = array();
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        				$itemcost.=$row['itemcost'].',';
					}
                    }

$i++;
}
return substr($itemcost, 0, -1);
}


function getCustomerDatafromPhoneNumber($phoneNumber)
{
require 'connect.inc.php';
 	require 'core.inc.php';


$sql2 = "select * from dsetgo_customer where cphonenumber='$phoneNumber'";

$result = mysqli_query($conn,$sql2);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        				$res=$row['cemailid'].','.$row['cfirstname'].','.$row['clastname'].','.$row['caddress'].','.$row['cid'];
					}
                    }



  return $res;
}

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
switch($Webservicename)
{
case 'customerDetails':
fetchCustomerData($PhoneNumber);
break;
case 'deliverylogin':
deliverylogin($usernamedelivery,$passworddelivery);
break;
case 'orders':
orders($ostatus);
break;
case 'customerDetail':
fetchCustomerDetail($item,$itemtype);
break;
case 'customerRegistration':
CustomerRegistration($cfirstname,$clastname,$caddress,$cphonenumber,$cemailid,$creferredby);
break;
case 'getProducts':
GetProducts();
break;
case 'createOrder':
CreateOrder($cphonenumber,$productKey,$productQty);
break;
default:
break;
}

$conn->close();


?>
