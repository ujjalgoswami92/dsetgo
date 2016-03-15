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
                  else if($_POST["viewproducts"])
                  {
                    header("Location: viewproducts.php");
                  }

         ?>
<form action="addproducts.php" method="POST">
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
<div class="lable">
 <div class="col_1_of_2 span_1_of_3">  <input type="Submit" name="viewproducts" value="View Products">
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

      <h2>ADD NEW PRODUCT</h2>
		<form action="addproducts.php" method="post">
		   <div class="lable">
		    <div class="col_1_of_1 span_1_of_3"><input type="text" name="itemname" placeholder="PRODUCT NAME"></div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">
              <input type="radio" name="category" value="REGULAR"> REGULAR
             <input type="radio" name="category" value="PREMIUM"> PREMIUM
</div>
		   </div>
       <div class="lable">
		    <div class="col_1_of_1 span_1_of_3">	<input type="text" name="itemcost" placeholder="PRODUCT COST">
</div>
		   </div>

		   <input type="submit" name="addproduct" value="ADD PRODUCT" >

  	</form>
		</div>

</body>
</html>
<?php
         if($_POST["addproduct"])
         {

$itemname=$_POST["itemname"];
 $itemcategory=$_POST['category'];
 $itemcost=$_POST["itemcost"];

echo $itemcategory;

           $servername = "localhost";
           $dbusername = "root";
           $dbpassword = "root";
           $dbname = "dsetgo";
           $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
           if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
           }
           $sql1 = "INSERT INTO dsetgo_products (itemname, itemcost,itemcategory)
           VALUES ('$itemname', '$itemcost','$itemcategory')";
           if ($conn->query($sql1) === TRUE) {
             echo "Item Added successfully!";
           } else {
               echo "Error: " . $sql1 . "<br>" . $conn->error;
           }
}
         ?>
