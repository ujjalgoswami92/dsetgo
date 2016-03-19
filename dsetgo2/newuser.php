<?php
require 'connect.inc.php';
require 'core.inc.php';
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
         ?>

         <script>
         function validateForm()
         {
         var cfirstname= document.forms["userform"]["cfirstname"].value;
         var clastname=document.forms["userform"]["clastname"].value;
         var caddress=document.forms["userform"]["caddress"].value;
         var cphonenumber=document.forms["userform"]["cphonenumber"].value;
         var cemailid=document.forms["userform"]["cemailid"].value;
         var creferredby=document.forms["userform"]["creferredby"].value;
         var creferralcode=document.forms["userform"]["creferralcode"].value;
         var cstatus=document.forms["userform"]["cstatus"].value;
         document.userform.creferralcode.value=cphonenumber;
         if (cfirstname==null|| cfirstname=="")
         {
         alert("enter first name");
         document.userform.cfirstname.focus();
         return false;
         }



         else if (caddress==null|| caddress=="")
         {
         alert("enter house address");
         document.userform.caddress.focus();
         return false;
         }
         else if (cphonenumber==null|| cphonenumber=="")
         {
         alert("enter phone number");
         document.userform.cphonenumber.focus();
         return false;
         }

         else if (cemailid==null|| cemailid=="")
         {
         alert("enter email id");
         document.userform.cemailid.focus();
         return false;

         }

         else if (cstatus==null|| cstatus=="")
         {
         alert("enter status");
         document.userform.cstatus.focus();
         return false;
         }

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
                   document.userform.cphonenumber.focus();
                   return false;
                   }


         }




         if (cemailid!=null && flag==1)
         {
          var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if(cemailid.match(mailformat))
          {

          return true;
          }
          else
          {
          alert("You have entered an invalid email address!");
          document.userform.cemailid.focus();
          return false;
         }
         }



         else
         {
           return true;
         }
         // document.getElementById("cfirstname_valid").innerHTML="mandatory";

         }

         </script>





<form  action="newuser.php" method="POST"  >
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

      <h2>USER REGISTRATION</h2>
		<form name="userform"  action="newuser.php" method="post" onsubmit="return validateForm()" >
		   <div class="lable">
		    <div class="col_1_of_1 span_1_of_3"><input type="text" name="cfirstname" placeholder="FirstName"></div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text" name="clastname" placeholder="LastName">
</div>
		   </div>
       <div class="lable">
		    <div class="col_1_of_1 span_1_of_3">	<input type="text" name="caddress" placeholder="Customer Address">
</div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text" name="cphonenumber" placeholder="Phone Number"></td>
</div>
		   </div>
       <div class="lable">
		    <div class="col_1_of_1 span_1_of_3">	<input type="text" name="cemailid" placeholder="Email ID"></td>
</div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text" name="creferralcode"  placeholder="Referral code"></td>
</div>
		   </div>
       <div class="lable">
		    <div class="col_1_of_1 span_1_of_3">	<input type="text" name="creferredby" placeholder="Referred By"></td>
        </div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text" name="cstatus" placeholder="Status" value="ACTIVE"></td>
         </div>
		   </div>
		   <input type="submit" name="Register" value="Register" >
		</form>
		</div>

</body>
</html>

<?php
         if($_POST["Register"])
         {

$cfirstname=$_POST["cfirstname"];
 $clastname=$_POST["clastname"];
 $caddress=$_POST["caddress"];
 $cphonenumber=$_POST["cphonenumber"];
 $cemailid=$_POST["cemailid"];
 $creferralcode=$_POST["creferralcode"];
 $creferredby=$_POST["creferredby"];
 $cstatus=$_POST["cstatus"];

           $sql1 = "INSERT INTO dsetgo_customer (cfirstname, clastname,caddress,cphonenumber,cemailid,creferralcode,creferredby,cstatus)
           VALUES ('$cfirstname', '$clastname', '$caddress','$cphonenumber','$cemailid','$creferralcode','$creferredby','$cstatus')";
echo "Customer Added successfully!";
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
         echo 'Your mail has been sent successfully.';
         } else{
         echo 'Unable to send email. Please try again.';
         }
           } else {
               echo "Error: " . $sql1 . "<br>" . $conn->error;
           }
}
 $conn->close();
         ?>
