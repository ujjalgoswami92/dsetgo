<?php
// $PhoneNumber = $_POST['phonenumber']; //no default
// $Webservicename=$_POST['name'];
// $usernamedelivery=$_POST['user'];
// $passworddelivery=$_POST['pass'];
// $ostatus=$_POST['status'];
// $item=$_POST['item'];
// $itemtype=$_POST['itemtype'];
//
// //For Customer Registration
// $cfirstname=$_POST["cfirstname"];
//  $clastname=$_POST["clastname"];
//  $caddress=$_POST["caddress"];
//  $cphonenumber=$_POST["cphonenumber"];
//  $cemailid=$_POST["cemailid"];
//  $creferredby=$_POST["creferredby"];
//  $customerid=$_POST["customerid"];
//
// $productKey=$_POST["productKey"];
// $productQty=$_POST["productQty"];

 ?>
<html>
<form  name="webserviceui" action="/dsetgomain/admindsetgo/webservice.php" method="post">
<table>
  <tr>
    <td>
      PhoneNumber1
    </td>
    <td>
      <input type="text" name="phonenumber"  >
    </td>
  </tr>
  <tr>
    <td>
      Name
    </td>
    <td>
      <input type="text" name="name"  >
    </td>
  </tr>
  <tr>
    <td>
      User
    </td>
    <td>
        <input type="text" name="user"  >
    </td>
  </tr>
  <tr>
    <td>
      Pass
    </td>
    <td>
        <input type="text" name="pass"  >
    </td>
  </tr>
  <tr>
    <td>
    order  Status
    </td>
    <td>
        <input type="text" name="status"  >
    </td>
  </tr>
  <tr>
    <td>
      Item
    </td>
    <td>
        <input type="text" name="item"  >
    </td>
  </tr>
  <tr>
    <td>
      ItemType
    </td>
    <td>
        <input type="text" name="itemtype"  >
    </td>
  </tr>
  <tr>
    <td>
      Firstname
    </td>
    <td>
        <input type="text" name="cfirstname"  >
    </td>
  </tr>
  <tr>
    <td>
      Lastname
    </td>
    <td>
        <input type="text" name="clastname"  >
    </td>
  </tr>
  <tr>
    <td>
      address
    </td>
    <td>
        <input type="text" name="caddress"  >
    </td>
  </tr>
  <tr>
    <td>
      phonenumber
    </td>
    <td>
        <input type="text" name="cphonenumber"  >
    </td>
  </tr>
  <tr>
    <td>
      emailid
    </td>
    <td>
        <input type="text" name="cemailid"  >
    </td>
  </tr>
  <tr>
    <td>
      reffered by
    </td>
    <td>
        <input type="text" name="creferredby"  >
    </td>
  </tr>
  <tr>
    <td>
      customerid
    </td>
    <td>
        <input type="text" name="customerid"  >
    </td>
  </tr>
  <tr>
    <td>
      productQty
    </td>
    <td>
        <input type="text" name="productQty"  >
    </td>
  </tr>
  <tr>
    <td>
      productKey
    </td>
    <td>
        <input type="text" name="productKey"  >
    </td>
  </tr>

</table>
<input type="submit" name="senddata" value="send data">
</form>
</html>
