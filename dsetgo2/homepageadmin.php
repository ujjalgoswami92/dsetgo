<?php
session_start();
?>
<?php
        if($_POST["logout"])
          {
            header("Location: logout.php");
         }
         else if($_POST["NewUser"])
         {
           header("Location: newuser.php");
         }
         else if($_POST["NewOrder"])
         {
           header("Location: neworder.php");
         }
         else if($_POST["ViewCustomers"])
         {
           header("Location: viewcustomers.php");
         }
         else if($_POST["addproducts"])
         {
           header("Location: addproducts.php");
         }
         ?>
<form action="homepageadmin.php" method="POST">
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
      <h2>HOME PAGE</h2>
		<form action="homepageadmin.php" method="post">
		   <div class="lable">
		    <div class="col_1_of_4 span_1_of_3">  <input type="Submit" name="NewUser" value="New User">

		   </div>

		   <div class="lable-2">
				 <div class="col_1_of_4 span_2_of_3">	  <input type="Submit" name="NewOrder" value="New Order">

		   </div>

       <div class="lable-2">
        <div class="col_1_of_4 span_3_of_3">
<input type="Submit" name="ViewCustomers" value="View Registered Customers">
</div>
      </div>
    </br></br></br></br>
      <div class="lable-2">
       <div class="col_1_of_4 span_4_of_3">
<input type="Submit" name="addproducts" value="ADD PROD">
</div>
     </div>
      </form>
		</div>
</body>
</html>
