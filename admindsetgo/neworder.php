<?php
require 'connect.inc.php';
session_start();
if($_SESSION["username"]=="")
{
  header("Location: login.php");
}
?>
<?php
$content2='<input type="Submit" name="MainMenu" value="MainMenu">';
$content3='<input type="Submit" name="registercustomer" value="Register Customer">';
$content="  <h2>SEARCH CUSTOMER</h2>
<form name='phonenumberform' action='neworder.php' method='post' onsubmit='return validatephonenumber()'>
  <div class='lable'>
    <div class='col_1_of_1 span_1_of_3'>	<input type='text'  name='cphonenumber' placeholder='Phone Number' value=$cphonenumber></td>
 </div>
  </div>
  <input type='Submit' name='searchcustomer' value='Search Customer'>
</form>";
require 'header.php';
?>
