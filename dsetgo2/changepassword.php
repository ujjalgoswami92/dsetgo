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
