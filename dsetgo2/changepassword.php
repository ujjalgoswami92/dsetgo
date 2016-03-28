<?php
require 'connect.inc.php';
require 'core.inc.php';
$content2='<input type="Submit" name="MainMenu" value="MainMenu">';
$content='  <h2>Admin Change Password</h2>
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
</form>';
require 'header.php';
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
        $conn->close();
         ?>
