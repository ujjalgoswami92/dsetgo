<?php
require 'connect.inc.php';
require 'core.inc.php';

//if(isset($_GET['phonenumber']) && intval($_GET['phonenumber'])) {

	/* soak in the passed variable or set our own */
	//$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml is the default
	$PhoneNumber = $_GET['phonenumber']; //no default
$Webservicename=$_GET['name'];
$usernamedelivery=$_GET['user'];
$passworddelivery=$_GET['pass'];
$ostatus=$_GET['status'];
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
function orders($ostatus)
{
 require 'connect.inc.php';
 	require 'core.inc.php';
/*	$sql2="SELECT * FROM dsetgo_customer where cphonenumber='9958563058'";
	//$sql2 = "select do.orderid, dc.cphonenumber from dsetgo_orders do, dsetgo_customer dc where do.cid=dc.cid and status='$ostatus'";
  $result = $conn->query($sql2);
	$posts = array();
  if ($result->num_rows > 0) {
      while($row = mysqli_fetch_row($result)) {
      //$posts[]='orderid'=>$row["cid"];
							//$posts[]=$row;
							//$posts=array('cid'=>$row["orderid"]);
//$test=$row["orderid"];
$posts=array('cid'=>$row["cid"],'cfirstname'=>$row["cfirstname"]);
		 }
                    } else {
                      $posts = array('status'=>"declined");
                    }
                    				//$posts=array('cid'=>"1");

		header('Content-type: application/json');
		echo json_encode($posts);
		//echo $posts;*/
//
// 			$sql2 = "select * from dsetgo_orders do";
//   $result = $conn->query($sql2);
// 	$posts = array();
// $i=1;
//   if ($result->num_rows > 0) {
//       while($row = $result->fetch_assoc()) {
//
//         				$posts[$i]=array($i=>(array($row["orderid"],$row["cphonenumber"])));
// 					$i++;
// 					}
//                     } else {
//                       $posts = array('customerdetail'=>"0");
//                     }
//
// 		header('Content-type: application/json');
// 		echo json_encode($posts);
//
//

//  $sql2 = "select * from dsetgo_orders where orderstatus='$ostatus'";
//  $result = $conn->query($sql2);
//  $emparray = array();
//     while($row =mysqli_fetch_assoc($result))
//     {
//         $emparray[] = $row;
//     }
//
// 		$abc= json_encode($emparray);
// echo serialize($abc);
// //var_dump(json_decode($abc, true));


$x = 1;
$return_arr = array();
$sql2 = "select * from dsetgo_orders where orderstatus='$ostatus'";
$result = $conn->query($sql2);
while( $obj = $result->fetch_object() ) {
   $row_array[$x] = $obj->orderid;
   $x++;
}

array_push($return_arr,$row_array);
echo json_encode($return_arr);

}
//echo $Webservicename;
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
default:
break;
}

$conn->close();

//}

?>
