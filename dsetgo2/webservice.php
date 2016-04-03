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



function fetchCustomerData($PhoneNumber) {
	require 'connect.inc.php';
	require 'core.inc.php';
	$sql2 = "SELECT * FROM dsetgo_customer where cphonenumber='$PhoneNumber'";
  $result = $conn->query($sql2);
	$posts = array();

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        		// $posts[] = array('customerdetail'=>$row);
					$posts=array('cid'=>$row["cid"],'cfirstname'=>$row["cfirstname"],'clastname'=>$row["clastname"],'caddress'=>$row["caddress"],'cemailid'=>$row["cemailid"],'creferredby'=>$row["creferredby"],'creferralcode'=>$row["creferralcode"],'cstatus'=>$row["cstatus"],'reg_date'=>$row["reg_date"]);
					}
                    } else {
                      $posts = array('customerdetail'=>"0");
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
$itemtype='caddress';
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

			$sql2 = "select * from dsetgo_orders where orderstatus='$ostatus'";
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
default:
break;
}

$conn->close();





?>
