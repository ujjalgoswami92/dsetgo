<?php
require 'connect.inc.php';
require 'core.inc.php';

//if(isset($_GET['phonenumber']) && intval($_GET['phonenumber'])) {

	/* soak in the passed variable or set our own */
	//$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml is the default
	$PhoneNumber = $_POST['phonenumber']; //no default
$Webservicename=$_POST['name'];
$usernamedelivery=$_POST['user'];
$passworddelivery=$_POST['pass'];
$ostatus=$_POST['status'];
$item=$_POST['item'];
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
        				$posts = array('status'=>"approved");
                    							    }
                    } else {
                      $posts = array('status'=>"declined");
                    }

		header('Content-type: application/json');
		echo json_encode($posts);

}
function fetchCustomerDetail($item)
{
 require 'connect.inc.php';
 	require 'core.inc.php';



 	 $sql2 = "select dc.cphonenumber from dsetgo_customer dc, dsetgo_orders do where dc.cid=do.cid and do.orderid='$item'";

  $result = $conn->query($sql2);
	$posts = array();



$posts = array();
$i=1;
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        				$posts[]=$row["cphonenumber"];
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
fetchCustomerDetail($item);
break;
default:
break;
}

$conn->close();

//}

?>
