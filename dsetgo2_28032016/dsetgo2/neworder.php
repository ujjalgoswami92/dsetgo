<?php
require 'connect.inc.php';
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
                  else if($_POST["registercustomer"])
                  {
                     header("Location: newuser.php");
                  }
                  else if ($_POST["searchcustomer"])
                  {
                    $PhoneNumber=$_POST["cphonenumber"];
                    $sql2 = "SELECT * FROM dsetgo_customer where cphonenumber='$PhoneNumber'";
                    $result = $conn->query($sql2);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                      header('Location: confirmorder.php?no='.$PhoneNumber.'');
                        }
                    }
                    else {
                      echo "Customer not found";
                    }
                  }

?>
 <head>
<style>
           #products option {
    width: 50px;
}
#products{
 width:150px;
}
.products {
   font-size: 50px;
}​
</style>
         </head>
<form action="neworder.php" method="POST">
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
<td>
  <div <?php echo $showorhideregister;?>>
    <input type="Submit" name="registercustomer" value="Register Customer">
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

      <h2>SEARCH CUSTOMER</h2>
		<form name="phonenumberform" action="neworder.php" method="post" onsubmit="return validatephonenumber()">
      <div class="lable">
        <div class="col_1_of_1 span_1_of_3">	<input type="text"  name="cphonenumber" placeholder="Phone Number" value=<?php echo $cphonenumber ?>></td>
     </div>
      </div>
      <input type="Submit" name="searchcustomer" value="Search Customer">



  </form>

</div>
</body>
</html>
