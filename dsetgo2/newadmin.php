<?php
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





<form  action="newadmin.php" method="POST"  >
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

<script>
function validateForm()
{
  var afirstname= document.forms["userform"]["afirstname"].value;
  var alastname=document.forms["userform"]["alastname"].value;
  var ausername=document.forms["userform"]["ausername"].value;
  var apassword=document.forms["userform"]["apassword"].value;
  var aconfirmpassword=document.forms["userform"]["aconfirmpassword"].value;

  if (afirstname==null|| afirstname=="")
  {
  alert("enter first name");
  document.userform.afirstname.focus();
  return false;
  }
  else if (alastname==null|| alastname=="")
  {
  alert("enter last name");
  document.userform.alastname.focus();
  return false;
  }

  else if (ausername==null|| ausername=="")
  {
  alert("enter username");
  document.userform.ausername.focus();
  return false;
  }

  else if (apassword==null|| apassword=="")
  {
  alert("enter password");
  document.userform.apassword.focus();
  return false;
  }

  else if (aconfirmpassword==null|| aconfirmpassword=="")
  {
  alert("enter confirm password");
  document.userform.aconfirmpassword.focus();
  return false;
  }

  if(apassword!=aconfirmpassword)
  {
    alert("passwords should match");
    document.userform.apassword.focus();
    return false;
  }

  else
    {
      return true;
    }
}




</script>


<div class="main">

      <h2>ADMIN LOGIN</h2>
		<form name="userform"  action="newadmin.php" method="post" onsubmit="return validateForm()" >
		   <div class="lable">
		    <div class="col_1_of_1 span_1_of_3"><input type="text" name="afirstname" placeholder="FirstName"></div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="text" name="alastname" placeholder="LastName">
</div>
		   </div>
       <div class="lable">
		    <div class="col_1_of_1 span_1_of_3">	<input type="text" name="ausername" placeholder="Username">
</div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="password" name="apassword" placeholder="Password"></td>
</div>

<div class="lable">
  <div class="col_1_of_1 span_1_of_3">	<input type="password" name="aconfirmpassword" placeholder="Confirm Password"></td>
</div>
<input type="submit" name="Register" value="Register" >
		   </div>
       	</form>
		</div>

</body>
</html>

<?php
         if($_POST["Register"])
         {

$afirstname=$_POST["afirstname"];
 $alastname=$_POST["alastname"];
 $ausername=$_POST["ausername"];
 $apassword=md5($_POST["apassword"]);




           $servername = "localhost";
           $dbusername = "root";
           $dbpassword = "root";
           $dbname = "dsetgo";
           $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
           if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
           }
           $sql = "INSERT INTO dsetgo_admin (firstname, lastname, username,password,type)
           VALUES ('$afirstname', '$alastname', '$ausername','$apassword', 'nonsu')";
           if ($conn->query($sql) === TRUE) {
             echo "Admin Added successfully!";

           } else {
               echo "Error: " . $sql . "<br>" . $conn->error;
           }
}
         ?>
