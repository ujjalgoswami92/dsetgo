<?php
session_start();
if($_SESSION["username"]=="")
{
  header("Location: login.php");
}
?>
<?php
         if($_POST["Logout"])
                   {
                     header("Location: logout.php");
                  }
                  else if($_POST["MainMenu"])
                  {
                    header("Location: homepageadmin.php");
                  }
         ?>
         <?php
                  if($_POST["achangepassword"])
                  {

         $ausername=$_SESSION["username"];
         $aoldpassword=md5($_POST["aoldpassword"]);
         $anewpassword=md5($_POST["anewpassword"]);
         $aconfirmnewpassword=md5($_POST["aconfirmnewpassword"]);

         if ( $_POST["aoldpassword"]=='' || $_POST["anewpassword"]=='' ||$_POST["aconfirmnewpassword"]=='')
         {
           echo "enter all the fields please";
         }
         else {

           if($anewpassword==$aconfirmnewpassword)
           {
             $servername = "localhost";
             $dbusername = "root";
             $dbpassword = "root";
             $dbname = "dsetgo";
             $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             }
             $sql1 = "select password from dsetgo_admin where username='$ausername'";
             $sql2 = "update dsetgo_admin set password='$aconfirmnewpassword' where username='$ausername' ";
             $result = $conn->query($sql1);

             if ($result->num_rows > 0) {
                 // output data of each row

                 while($row = $result->fetch_assoc()) {
               if($row["password"]==$aoldpassword)
               {
                 if ($conn->query($sql2) === TRUE) {
                   echo "password change successful!";
                 } else {
                   echo "Error: " . $sql1 . "<br>" . $conn->error;
                 }
               }
              else
               {
                 echo "enter correct old password";
               }

           }

               }
             else {
               echo "Invalid current password!";
             }

          }
          else {
echo "new passwords dont match!";
            }
          }
        }
         ?>
<form  action="login.php" method="POST"  >
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

      <h2>Admin Change Password</h2>
		<form name="adminform"  action="changepassword.php" method="post" >
      <div class="lable">
       <div class="col_1_of_1 span_1_of_3"><input type="password" name="aoldpassword" placeholder="Old Password"></div>
      </div>
       <div class="lable">
		    <div class="col_1_of_1 span_1_of_3"><input type="password" name="anewpassword" placeholder="New Password"></div>
		   </div>
		   <div class="lable">
				 <div class="col_1_of_1 span_1_of_3">	<input type="password" name="aconfirmnewpassword" placeholder="Confirm New Password">
</div>

		   <input type="submit" name="achangepassword" value="change password" >
		</form>
		</div>

</body>
</html>
