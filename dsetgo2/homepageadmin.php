<?php
require 'connect.inc.php';
require 'core.inc.php';
session_start();
$username= $_SESSION["username"];
$type="";
$sql = "SELECT type FROM dsetgo_admin where username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
  $type=$row["type"];
    }
  }
if($type=="su")
{
  $content4='<input type="Submit" name="newadmin" value="new admin">';
  $content5='<input type="Submit" name="viewadmins" value="view admin">';
}
else {
  $content4='';
  $content5='';
}
?>
<?php
$content2='  <input type="Submit" name="changepassword" value="Change Password">';
$content='<h2>HOME PAGE</h2>
 <form action="homepageadmin.php" method="post">
    <table>
<tr>
<td>
</td>
<td>
  <input type="Submit" name="NewUser" value="New Customer">
</td>
<td>
  <input type="Submit" name="ViewCustomers" value="View Registered Customers">
</td>
</tr>
</table>
</br></br>
<table>
      <tr>
        <td>
          <input type="Submit" name="addproducts" value="Add Products">
        </td>
        <td>
          <input type="Submit" name="ViewProducts" value="View Products">
        </td>
        <td>
        </td>
      </tr>
</table>
</br>
</br>
<table>
      <tr>
        <td>
        </td>
        <td>
          <input type="Submit" name="NewOrder" value="New Order">
        </td>
        <td>
        </td>
      </tr>
    </table>
</br>
</br>
<table>
</table>
    </form>
';
require 'header.php';
?>
