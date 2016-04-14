<?php
require 'connect.inc.php';
require 'core.inc.php';

session_start();
if($_SESSION["username"]=="")
{
  header("Location: login.php");
}
?>

<script>
function validateForm()
{
//   function validateForm()
//   {
//   var cfirstname= document.forms["userform"]["cfirstname"].value;
//
//   if (cfirstname==null|| cfirstname=="")
//   {
//   alert("enter first name");
//   document.userform.cfirstname.focus();
//   return false;
// }
var itemname =document.productform.itemname.value;
var itemcost=document.productform.itemcost.value
if(itemname=="" ||itemname==null)
{
alert("enter item name please")
document.productform.itemname.focus();
return false;
}
else if(document.getElementById("regular").checked==false && document.getElementById("premium").checked==false)
{
alert ("please select regular or premium")
return false

}

else if(itemcost=="" ||itemcost==null)
{
alert("enter item cost please")
document.productform.itemcost.focus();
return false;
}
else if (isNaN(itemcost))
{
alert("item cost should be numeric only")
return false
}
else return true;
}
</script>

         <?php
         $content2='<input type="Submit" name="MainMenu" value="MainMenu">';
         $content3='<input type="Submit" name="ViewProducts" value="View Products">';
         $content='  <h2>ADD NEW PRODUCT</h2>
         <form name="productform" action="addproducts.php" method="post" onsubmit="return validateForm()">
            <div class="lable">
             <div class="col_1_of_1 span_1_of_3"><input type="text" name="itemname" placeholder="PRODUCT NAME"></div>
            </div>
            <div class="lable">
              <div class="col_1_of_1 span_1_of_3">
                   <input type="radio"  name="category" id="regular" value="REGULAR"> REGULAR
                  <input type="radio"  name="category" id="premium" value="PREMIUM"> PREMIUM
         </div>
            </div>
            <div class="lable">
             <div class="col_1_of_1 span_1_of_3">	<input type="text" name="itemcost" placeholder="PRODUCT COST">
         </div>
            </div>

            <input type="submit" name="addproduct" value="ADD PRODUCT" >

         </form>';
         require 'header.php';
          ?>
