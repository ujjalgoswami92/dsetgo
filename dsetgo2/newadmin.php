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
$content2='<input type="Submit" name="MainMenu" value="MainMenu">';
$content='  <h2>ADMIN LOGIN</h2>
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
<input type="submit" name="Registeradmin" value="Register" >
   </div>
    </form>';
require 'header.php';
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
