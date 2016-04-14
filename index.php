<!DOCTYPE HTML>
<?php
require 'connect.inc.php';

function sendmail_reg($cemailid,$message)
{

$to = $cemailid;
$subject = 'CaptainDhobi Registration!';
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


if($_POST["registercustomer"])
{
	 $cfirstname=$_POST["cfirstname"];
	 $clastname=$_POST["clastname"];
	 $cphonenumber=$_POST["cphonenumber"];
	 $cemailid=$_POST["cemailid"];
	 $ccity="Gurgaon";
	 $carea="Nirvana Country";
	 $cFlatnoSociety=$_POST["cFlatnoSociety"];
	 $caddress=$ccity."  "."  ".$carea."  ".$cFlatnoSociety;
   $cstatus="ACTIVE";
	 $creferralcode=$cphonenumber;
   $cregpickday=$_POST['cregpickday'];
	 $cregpickmonth=$_POST['cregpickmonth'];
	 //$cregpickyear=$_POST['cregyear'];
	 $cregpickyear="2016";
	 //$cregpicktime=$_POST['cregpicktime'];
	 //$cregdroptime=$_POST['cregdroptime'];
   $flag_phone=0;
	 $flag_email=0;

	 $tempcregpickdate=strtotime($cregpickmonth."/".$cregpickday."/".$cregpickyear);
	 $cregpickdate = date('Y-m-d',$tempcregpickdate);

	 $tempcregdropdate=strtotime($cregpickmonth."/".$cregpickday."/".$cregpickyear.' +1 day');
	 $cregdropdate = date('Y-m-d',$tempcregdropdate);

$sql="SELECT cphonenumber from dsetgo_customer where cphonenumber=$cphonenumber";
//$sql1="SELECT cemailid from dsetgo_customer where cemailid=$cemailid";
$result = $conn->query($sql);
//$result1 = $conn->query($sql1);
if ($result->num_rows > 0) {
		$flag_phone=1;
		$message="You are existing mobile customer.";
	 echo "<script type='text/javascript'>alert('$message');</script>";


}

// else if ($result1->num_rows > 0) {
// 		$flag_email=1;
// 		$message="You are existing email customer.";
// 	 echo "<script type='text/javascript'>alert('$message');</script>";
//
//
// }
// else{
// 	$message=$cemailid;
//  echo "<script type='text/javascript'>alert('$message');</script>";
//
// }

if($flag_phone==0)
{
	//$cid=mt_rand();
	 $cid = substr( $mt_rand().microtime(), 0, 7);
	 $orderid = substr( $cid.mt_rand().microtime(), 0, 7);
	//$orderid=mt_rand();
	   date_default_timezone_set("Asia/Kolkata");
 $t=time();

 $oreg_date=date("Y-m-d H:i:s",$t);
 
	
	 $sql1 = "INSERT INTO dsetgo_customer (cid,cfirstname, clastname,ccity,carea,cFlatno_Society,caddress,cphonenumber,cemailid,creferralcode ,creferredby,cstatus,reg_date)
	VALUES ('$cid','$cfirstname', '$clastname','$ccity','$carea','$cFlatnoSociety', '$caddress','$cphonenumber','$cemailid','$creferralcode',NULL,'$cstatus','$oreg_date')";




// 	//  $sql1 = "INSERT INTO dsetgo_customer (cfirstname, clastname,caddress,cphonenumber,cemailid,creferralcode,creferredby,cstatus)
// 	//  VALUES ('$cfirstname', '$clastname', '$caddress','$cphonenumber','$cemailid','$creferralcode','$creferredby','$cstatus')";

		if ($conn->query($sql1) === TRUE) {
		 $message="Thank you. Your details is registered. We will get in touch, soon.";
	 	echo "<script type='text/javascript'>alert('$message');</script>";

	  }
	  

 
//
$sql = "INSERT INTO dsetgo_orders (orderid, cid,ocfirstname,oclastname,ocemailid,orderstatus,regpickdate,regdropdate,regpicktime,regdroptime,ocaddress)
VALUES ('$orderid','$cid','$cfirstname','$clastname','$cemailid', 'pending','$cregpickdate','$cregdropdate','8pm to 10pm','8pm to 10pm','$caddress')";
	 if ($conn->query($sql) === TRUE) {
		 $message="You are new customer. Your Appointment is registered.";
	 	echo "<script type='text/javascript'>alert('$message');</script>";

	  }
		$message= "<div style= 'background-color:.'#'.fff;color:.'#'.553f32;width:600px;margin:auto;font-size:14px;line-height:26px;font-family:Arial,Helvetica,sans-serif>
			<table border='0' cellpadding='0' width= '600px ' cellspacing= '0 ' style= 'border-collapse:collapse;margin:auto '>
			  <tbody><tr>
			    <td><img src= 'http://www.captaindhobi.com/admindsetgo/images/captaindhobifinal.jpg' alt= 'top border ' style= 'display:block ' class= 'CToWUd '></td>
			  </tr>
			  <tr>
			    <td style= 'padding:25px 0 20px '><table cellpadding= '0 ' cellspacing= '0 ' border= '0 ' style= 'border-collapse:collapse '>
			        <tbody><tr>
			                <td>&nbsp;</td>
			        </tr>
			      </tbody></table></td>
			  </tr>
			  <tr>
			    </tr>

			  <tr>
			    <td style= 'background-color:#f7f7f7;padding:10px '><table style= 'background-color:#fff;padding:30px ' border= '0 ' cellpadding= '0 ' cellspacing= '0 '>
			        <tbody><tr>
			          <td><p style= 'font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#404040;text-transform:capitalize;font-weight:bold;margin:10px 0 8px '>Hello $cfirstname  $clastname,</p></td>
			        </tr>
			        <tr>
			                <td valign= 'top '>
			<p>Thank you opting for our steam ironing services! Your order is dated $cregpickdate. Our timings of clothes collection and drop are 8pm- 10 pm. Your clothes will be delivered back to you the next day between 8pm to 10pm. We hope to serve in the best possible way. We offer 24 hours delivery service.  If there is anything we can do to make your better please feel free to contact us at +91-9958560358</p>
			                 </td>
			        </tr>
			        <tr>
			          <td style= 'padding:15px 0 0 0 '><p style= 'font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#606060;margin:0 '>Thank you again,</p>
			            <p style= 'font-family:Arial,Helvetica,sans-serif;font-size:13px;text-transform:capitalize;margin:0;font-weight:bold;color:#006699;text-decoration:underline '><a href= 'http://www.captaindhobi.com ' target= '_blank '>Captain Dhobi</a></p></td>
			        </tr>
			        <tr>
			                </tr>
			      </tbody></table></td>
			  </tr>


			  <tr>
			    <td style= 'width:405px;display:block;margin:0 auto '><p style= 'margin:10px 0 0 0;font-size:14px;text-align:center '><a href= '' style= 'color:#006699;text-align:center;text-decoration:underline ' target= '_blank '>support@captaindhobi.com</a></p>
			      <p style= 'margin:0;font-size:13px;text-align:center;font-weight:bold;color:#404040;line-height:20px '>A 301, Suncity Heights, Suncity, Golf Course Road, Gurgaon Haryana, India <br>
			        </p>
			      <p style= 'margin:11px auto 0px;line-height:18px;color:#404040;font-size:13px;text-align:center '><strong>Free delivery for  orders over:</strong> Rs 50 </p>
			      <p style= 'margin:0;line-height:18px;color:#404040;font-size:13px;text-align:center '></p>
			      <p style= 'margin:20px 0 0;font-size:14px;text-align:center '><a href= 'http://www.captaindhobi.com' style= 'color:#00a0e3;text-align:center;text-decoration:underline ' target= '_blank '>www.captaindhobi.com</a></p>
			      <p style= 'margin:0;font-size:13px;text-align:center;color:#404040 '> </p></td>
			  </tr>

			</tbody></table><div class= 'yj6qo '></div><div class= 'adL '>
			</div></div>";


sendmail_reg($cemailid,$message);
	}
else {
		  $orderid=mt_rand();
			$cid1="";
			$sql3="SELECT cid from dsetgo_customer where cphonenumber=$cphonenumber";
			$result = $conn->query($sql3);
			if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$cid1=$row['cid'];
				}
			$sql2 = "INSERT INTO dsetgo_orders (orderid, cid,ocfirstname,oclastname,ocemailid,orderstatus,regpickdate,regdropdate,regpicktime,regdroptime,ocaddress)
			VALUES ('$orderid','$cid1','$cfirstname','$clastname','$cemailid', 'pending','$cregpickdate','$cregdropdate','8pm to 10pm','8pm to 10pm','$caddress')";
	//
		 if ($conn->query($sql2) === TRUE) {
			 $message="You are existing customer. Your Appointment is registered.";
			echo "<script type='text/javascript'>alert('$message');</script>";


			$message= "<div style= 'background-color:.'#'.fff;color:.'#'.553f32;width:600px;margin:auto;font-size:14px;line-height:26px;font-family:Arial,Helvetica,sans-serif>
			<table border='0' cellpadding='0' width= '600px ' cellspacing= '0 ' style= 'border-collapse:collapse;margin:auto '>
			  <tbody><tr>
			    <td><img src= 'http://www.captaindhobi.com/admindsetgo/images/captaindhobifinal.jpg' alt= 'top border ' style= 'display:block ' class= 'CToWUd '></td>
			  </tr>
			  <tr>
			    <td style= 'padding:25px 0 20px '><table cellpadding= '0 ' cellspacing= '0 ' border= '0 ' style= 'border-collapse:collapse '>
			        <tbody><tr>
			                <td>&nbsp;</td>
			        </tr>
			      </tbody></table></td>
			  </tr>
			  <tr>
			    </tr>

			  <tr>
			    <td style= 'background-color:#f7f7f7;padding:10px '><table style= 'background-color:#fff;padding:30px ' border= '0 ' cellpadding= '0 ' cellspacing= '0 '>
			        <tbody><tr>
			          <td><p style= 'font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#404040;text-transform:capitalize;font-weight:bold;margin:10px 0 8px '>Hello $cfirstname  $clastname,</p></td>
			        </tr>
			        <tr>
			                <td valign= 'top '>
			<p>Thank you opting for our steam ironing services! Your order is dated $cregpickdate. Our timings of clothes collection and drop are 8pm- 10 pm. Your clothes will be delivered back to you the next day between 8pm to 10pm. We hope to serve in the best possible way. We offer 24 hours delivery service.  If there is anything we can do to make your better please feel free to contact us at +91-9958560358</p>
			                 </td>
			        </tr>
			        <tr>
			          <td style= 'padding:15px 0 0 0 '><p style= 'font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#606060;margin:0 '>Thank you again,</p>
			            <p style= 'font-family:Arial,Helvetica,sans-serif;font-size:13px;text-transform:capitalize;margin:0;font-weight:bold;color:#006699;text-decoration:underline '><a href= 'http://www.captaindhobi.com ' target= '_blank '>Captain Dhobi</a></p></td>
			        </tr>
			        <tr>
			                </tr>
			      </tbody></table></td>
			  </tr>


			  <tr>
			    <td style= 'width:405px;display:block;margin:0 auto '><p style= 'margin:10px 0 0 0;font-size:14px;text-align:center '><a href= '' style= 'color:#006699;text-align:center;text-decoration:underline ' target= '_blank '>support@captaindhobi.com</a></p>
			      <p style= 'margin:0;font-size:13px;text-align:center;font-weight:bold;color:#404040;line-height:20px '>A 301, Suncity Heights, Suncity, Golf Course Road, Gurgaon Haryana, India <br>
			        </p>
			      <p style= 'margin:11px auto 0px;line-height:18px;color:#404040;font-size:13px;text-align:center '><strong>Free delivery for  orders over:</strong> Rs 50 </p>
			      <p style= 'margin:0;line-height:18px;color:#404040;font-size:13px;text-align:center '></p>
			      <p style= 'margin:20px 0 0;font-size:14px;text-align:center '><a href= 'http://www.captaindhobi.com' style= 'color:#00a0e3;text-align:center;text-decoration:underline ' target= '_blank '>www.captaindhobi.com</a></p>
			      <p style= 'margin:0;font-size:13px;text-align:center;color:#404040 '> </p></td>
			  </tr>

			</tbody></table><div class= 'yj6qo '></div><div class= 'adL '>
			</div></div>";

sendmail_reg($cemailid,$message);
		}
	}
}






// 	else if($flag_email==1 )
// 	{
// 		$message="You are existing customer.";
// 	 echo "<script type='text/javascript'>alert('$message');</script>";
//
//

	// else if($flag_phone==1 )
	// {
  //
	// 	111,nalen@
	// 	222,Swish@
	//
	//
	// 	111, Swish@
	//
	// }




 ?>
<script>

function validateForm()
{
var cfirstname= document.forms["webuserform"]["cfirstname"].value;
var clastname= document.forms["webuserform"]["clastname"].value;
var cphonenumber=document.forms["webuserform"]["cphonenumber"].value;
//var caddress=document.forms["webuserform"]["caddress"].value;
var cemailid=document.forms["webuserform"]["cemailid"].value;
var tempday = document.forms["webuserform"]["cregpickday"];
var tempmonth=document.forms["webuserform"]["cregpickmonth"];
// var tempyear=document.forms["webuserform"]["cregyear"];
// var temppickuptime=document.forms["webuserform"]["cregpicktime"];
// var tempdroptime=document.forms["webuserform"]["cregdroptime"];
var cregpickday=tempday.options[tempday.selectedIndex].value;
var cregpickmonth=tempmonth.options[tempmonth.selectedIndex].value;
// var cregyear=tempyear.options[tempyear.selectedIndex].value;
// var cregpicktime=temppickuptime.options[temppickuptime.selectedIndex].value;
// var cregdroptime=tempdroptime.options[tempdroptime.selectedIndex].value;
// var ccity=document.forms["webuserform"]["ccity"];
// var carea=document.forms["webuserform"]["carea"];

var cFlatnoSociety=document.forms["webuserform"]["cFlatnoSociety"].value;
//




if (cfirstname==null|| cfirstname=="")
{
alert("enter first name");
document.webuserform.cfirstname.focus();
return false;
}

else if (cphonenumber==null|| cphonenumber=="")
{
alert("enter phone number");
document.webuserform.cphonenumber.focus();
return false;
}

else if (cemailid==null|| cemailid=="")
{
alert("enter email id");
document.webuserform.cemailid.focus();
return false;

}


// else if (caddress==null|| caddress=="")
// {
// alert("enter house address");
// document.webuserform.caddress.focus();
// return false;
// }
if (cFlatnoSociety==null|| cFlatnoSociety=="")
{
alert("enter house address");
document.webuserform.cFlatnoSociety.focus();
return false;
}
//
if (cregpickday.toString().localeCompare("Pickup Day")==0)
{
alert("enter pick up day");
document.webuserform.cregpickday.focus();
return false;
}
if (cregpickmonth.toString().localeCompare("Pickup Month")==0)
{
alert("enter pick up month");
document.webuserform.cregpickmonth.focus();
return false;
}
// if (cregyear.toString().localeCompare("Pickup Year")==0)
// {
// alert("enter pick up year");
// document.webuserform.cregyear.focus();
// return false;
// }
//
// if (cregpicktime.toString().localeCompare("Pickup Time")==0)
// {
// alert("enter pick up time");
// document.webuserform.cregpicktime.focus();
// return false;
// }
// if (cregdroptime.toString().localeCompare("Drop Time")==0)
// {
// alert("enter drop time");
// document.webuserform.cregdroptime.focus();
// return false;
// }
//
//
var flag=0;

if(cphonenumber!=null )
{

	var phoneno = /^\d{10}$/;
		if(cphonenumber.match(phoneno))
					{
				 flag=1;

					}
				else
					{
					alert("phone number length should be ten and characters must be numbers ");
					document.webuserform.cphonenumber.focus();
					return false;
					}


}




if (cemailid!=null && flag==1)
{
 var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
 if(cemailid.match(mailformat))
 {
  flag=2;
 }
 else
 {
 alert("You have entered an invalid email address!");
 document.webuserform.cemailid.focus();
 return false;
}
}

// regular expression to match required date format

    // regular expression to match required time format
    // re = /^\d{1,2}:\d{2}([ap]m)?$/;
		//
    // if(form.starttime.value != '' && !form.starttime.value.match(re)) {
    //   alert("Invalid time format: " + form.starttime.value);
    //   form.starttime.focus();
    //   return false;
    // }
else{

    return true;
}

// document.getElementById("cfirstname_valid").innerHTML="mandatory";

}

</script>

<html>
	<head>

		<title>Captain Dhobi</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="#intro">Welcome</a></li>
							<li><a href="#two">Why us?</a></li>
							<li><a href="#three">Captain's Process</a></li>
							<li><a href="#four">Book you ironing now</a></li>
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>   Premium Steam Ironing at minimal Pricing!</h1>
							<p> Doorstep pickup and drop</p>
							<ul class="actions">
								<li><a href="#two" class="button scrolly">Why choose us?</a></li>
							</ul>
						</div>
					</section>



				<!-- Two -->
					<section id="two" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>Why choose us?</h2>
							<p>Here at Captain Dhobhi we steam iron your clothes with proper care and hygiene at affordable prices. We make sure you get your clothes delivered on time without delay.</p>
							<div class="features">

								<section>
									<h3>Premium Quality</h3>
									<p>Each time you give your clothes, Captain Dhobi makes them new like.  </p>
								</section>

								<section>
									<h3>Doorstep Pickup and Drop</h3>
									<p>Our captain dhobi collects unpressed clothes from your doorstep and delivers them steam ironed as good as new. </p>
																	</section>
								<section>
									<h3>Hygiene</h3>
									<p>We ensure your clothes are kept clean and are handled with care. From time to time we maintain timely checks to ensure your clothes are kept clean and away from dirt. </p>
								</section>
								<section>
									<h3>Affordable Prices</h3>
										<p>Although we make sure maximum hygene we offer  cheap price, so you need not think before ordering.</p>

									</section>
								<section>
									<h3>24 Hours Service</h3>
									<p>You need not worry about time when you choose our service. We make sure the delivery is quick and without delay.</p>
								</section>
													<section>
									<h3>Focussed Customer Service</h3>
									<p>We at Captain Dhobhi belive our top priority is customer. So if you have any queries you can contact us on 9999999999 </p>
								</section>
							</div>
							<ul class="actions">
								<li><a href="#three" class="button scrolly">Scroll further </a></li>

							</ul>
						</div>
					</section>


					<!-- One -->
						<section id="three" class="wrapper style2 spotlights">
							<section>
								<a href="#" class="image"><img src="images/pic01.jpg" alt="" data-position="center center" /></a>
								<div class="content">
									<div class="inner">
										<h2>Clothes Collection</h2>
										<p>We come at your doorstep and collect your clothes.</p>
										<ul class="actions">

										</ul>
									</div>
								</div>
							</section>
							<section>
								<a href="#" class="image"><img src="images/pic02.jpg" alt="" data-position="top center" /></a>
								<div class="content">
									<div class="inner">
										<h2>Steam Pressing Process</h2>
										<p>We drop your precious clothes to our warehouse where the clothes are collected and tagged which prevents any loss and start the steam iron services with care.</p>
										<ul class="actions">
											<li><a href="#" class="button">Learn more</a></li>
										</ul>
									</div>
								</div>
							</section>
							<section>
								<a href="#" class="image"><img src="images/pic03.jpg" alt="" data-position="25% 25%" /></a>
								<div class="content">
									<div class="inner">
										<h2>Clothes Delivered as Good as New</h2>
										<p>Your perfectly steam ironed clothes are packed and delivered by one of our captain dhobis at your doorstep </p>
										<ul class="actions">
											<li><a href="#" class="button">Learn more</a></li>
										</ul>
									</div>
								</div>
							</section>
						</section>




				<!-- Three -->
					<section id="four" class="wrapper style1 fade-up">
						<div class="inner">
							<h2>Give your details. We will get in touch with you and help you place order</h2>
							<p></p>
							<div class="split style1">
								<section>
									<form name="webuserform"  action="index.php" method="post" onsubmit="return validateForm()" >
<table>
<tr>
	<td>
			<input type="text" placeholder="*First Name" name="cfirstname"  />
	</td>

		<td>
				<input type="text" placeholder="Last Name" name="clastname"  />
		</td>
</tr>
</table>

<table>
<tr>
	<td>
			<input type="text" placeholder="*Phone Number" name="cphonenumber"  />
	</td>

		<td>
				<input type="text" placeholder="*Email Address" name="cemailid"  />
		</td>
</tr>
</table>
<table>

<tr>
	<td>
		<label for="address"> Gurgaon</label>
		</td>

		<td>
			<label for="address">Nirvana Country, Sector 50</label>
		 		</td>

			<td>
				<input type="text" placeholder="*Enter house in nirvana" name="cFlatnoSociety" />
		</td>

</tr>
</table>

<table>
	<tr>
		<td>
	<select name="cregpickday" >
	 <option value="Pickup Day">Pick Up Day</option>
	 <option value="1">1</option>
	 <option value="2">2</option>
	 <option value="3">3</option>
	 <option value="4">4</option>
	 <option value="5">5</option>
	 <option value="6">6</option>
	 <option value="7">7</option>
	 <option value="8">8</option>
	 <option value="9">9</option>
	 <option value="10">10</option>
	 <option value="11">11</option>
	 <option value="12">12</option>
	 <option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
	</select>
</td>
<td>
	<select name="cregpickmonth" >
  	<option value="Pickup Month">Pick Up Month </option>
  	<option value="1">1</option>
 	 <option value="2">2</option>
 	 <option value="3">3</option>
 	 <option value="4">4</option>
 	 <option value="5">5</option>
 	 <option value="6">6</option>
 	 <option value="7">7</option>
 	 <option value="8">8</option>
 	 <option value="9">9</option>
 	 <option value="10">10</option>
 	 <option value="11">11</option>
 	 <option value="12">12</option>

</td>
<td>
	<label for="year"> 2016</label>
<td>
	<label for="drop day"> Drop next day</label>

</td>
</tr>

</table>






<table>
<tr>
	<td>
		<label for="address"> Pick up time 8pm-10pm</label>

	</td>
	<td>
		<label for="address"> Drop time 8pm-10pm</label>
	</td>

</tr>
</table>
<div align="center">

	<input type="submit" name="registercustomer" value="Call the captain now!">

</div>








										<div class="field half">
										</div>
										<div class="field half">
										</div>

									</form>
								</section>
								<section>
									<ul class="contact">
										<li>
											<h3>Address</h3>
											<span>Aspen Greens 119<br />
											Nishant Sharma<br />
											Gurgaon, India</span>
										</li>
										<li>
											<h3>Email</h3>
											<a href="#">support@CaptainDhobi.com</a>
										</li>
										<li>
											<h3>Phone</h3>
											<span>0987654321</span>
										</li>
										<li>
											<h3>Social</h3>
											<ul class="icons">
												<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
												<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
												<li><a href="#" class="fa-github"><span class="label">GitHub</span></a></li>
												<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="#" class="fa-linkedin"><span class="label">LinkedIn</span></a></li>
											</ul>
										</li>
									</ul>
								</section>
							</div>
						</div>
					</section>

			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>