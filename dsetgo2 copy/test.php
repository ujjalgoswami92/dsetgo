<?php

require 'connect.inc.php';

$cfirstname='nalen';
$clastname='anand';
$orderid="qawsedrf";
$max=3;
$itemname="pant";
$itemcost="10";
$itemcategory="regular";
$itemqty=3;
$sum_item=30;
$sum=90;
$caddress="Ag 41, nirvana";
$cemailid="nalenanand25@gmail.com";
$cphonenumber="9650839565";
$orderid=1136173059;

$oreg_date="";
$sql="SELECT reg_date from dsetgo_orders where orderid='$orderid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

echo "nalen";
echo $row["reg_date"];
}
else
  {
    echo "no data found";
  }


$dynamicList="<table cellspacing='0' cellpadding='0' border='0' width='650' style='border:1px solid #eaeaea'><thead><tr><th align='left' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Item</th><th align='left' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Type</th><th align='center' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Quantity</th><th align='left' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Price</th><th align='right' bgcolor='#EAEAEA' style='font-size:13px;padding:3px 9px'>Subtotal</th></tr></thead>";

$dynamicList.= "<tbody bgcolor='#F6F6F6'>";
//
for($i=1;$i<=$max;$i++)
{

  $dynamicList.="<tr><td align='left' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'> <strong style='font-size:11px'> $itemname</strong></td><td align='left' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'>$itemcategory</td><td align='center' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'> $itemqty </td><td align='center' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'> ₹$itemcost</td><td align='center' valign='top' style='font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc'>₹$sum_item</td></tr>";


}


$dynamicList.="</tbody><tbody></tbody><tbody><tr><td colspan='5' align='right' style='padding:3px 9px'> Total</td><td align='right' style='padding:3px 9px'> <span>₹$sum</span></td></tr><tr><td colspan='5' align='right' style='padding:3px 9px'> Shipping &amp; Handling</td><td align='right' style='padding:3px 9px'> <span>₹0</span></td></tr><tr><td colspan='5' align='right' style='padding:3px 9px'> Discount </td><td align='right' style='padding:3px 9px'> <span>₹0</span></td></tr><tr><td colspan='5' align='right' style='padding:3px 9px'> <strong>Grand Total</strong></td><td align='right' style='padding:3px 9px'> <strong><span>₹$sum</span></strong></td></tr></tbody></table>";


$message="
<div style='background:#f6f6f6;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0'><div class='adM'>
  </div><table cellspacing='0' cellpadding='0' border='0' width='100%'>
    <tbody><tr>
      <td align='center' valign='top' style='padding:20px 0 20px 0'><table bgcolor='#FFFFFF' cellspacing='0' cellpadding='10' border='0' width='650' style='border:1px solid #e0e0e0'>

          <tbody><tr>
            <td valign='top'><a href='http://www.dcgpac.com/' target='_blank'><img src='https://ci5.googleusercontent.com/proxy/BRqf8Dj5jQFoGu_7GVG8auD1GEKdYaLRhXsjiCJApMzNmRHCjz8Xqe5eWTb8nLbR-5tSJGXdIKe8_1QGtpQqRTNzCp7yLnS3xAPXmpPBxJ0=s0-d-e1-ft#http://www.dcgpac.com/media/email/logo/websites/1/logo.png' alt='DCGPAC' style='margin-bottom:10px' border='0' class='CToWUd'></a></td>
          </tr>

          <tr>
            <td valign='top'><h1 style='font-size:22px;font-weight:normal;line-height:22px;margin:0 0 11px 0'>Hello, $cfirstname  $clastname </h1>
            <p style='font-size:12px;line-height:16px;margin:0'> Thank you for your order. We will take care of your clothes. We will send you updates
                to help you track your order. For any query kindly contact us on support@captaindhobi.com or call us on +9958563058</p></td>
          </tr>
          <tr>
            <td><h2 style='font-size:18px;font-weight:normal;margin:0'>Your Order $orderid <small> (placed on </small></h2></td>
          </tr>

          <tr>
            <td>

$dynamicList
          </td></tr>

          <tr>

            <td><table cellspacing='0' cellpadding='0' border='0' width='650'>
                <thead>
                  <tr>
                    <th align='left' width='325' bgcolor='#EAEAEA' style='font-size:13px;padding:5px 9px 6px 9px;line-height:1em'>Billing Information:</th>
                    <th width='10'></th>
                    <th align='left' width='325' bgcolor='#EAEAEA' style='font-size:13px;padding:5px 9px 6px 9px;line-height:1em'>Payment Method:</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td valign='top' style='font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea'>Name: $cfirstname  $clastname <br>
                    Email: $cemailid <br>
                    Phone: $cphonenumber
 </td>
                    <td>&nbsp;</td>
                    <td valign='top' style='font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea'> <p>Cash on Delivery</p> </td>
                  </tr>
                </tbody>
              </table>
              <br>

              <table cellspacing='0' cellpadding='0' border='0' width='650'>
                <thead>
                  <tr>
                    <th align='left' width='325' bgcolor='#EAEAEA' style='font-size:13px;padding:5px 9px 6px 9px;line-height:1em'>Shipping Information:</th>
                    <th width='10'></th>
                    <th align='left' width='325' bgcolor='#EAEAEA' style='font-size:13px;padding:5px 9px 6px 9px;line-height:1em'>Shipping Method:</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td valign='top' style='font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea'>

                    Address: $caddress


                      &nbsp; </td>
                    <td>&nbsp;</td>
                    <td valign='top' style='font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea'> Ground Shipping
                      &nbsp; </td>
                  </tr>
                </tbody>
              </table>
              <br>
               </td>
          </tr>
          <tr>
            <td bgcolor='#EAEAEA' align='center' style='background:#eaeaea;text-align:center'><center>
                <p style='font-size:12px;margin:0'>Thank you, we hope you liked our service<strong></strong></p>
              </center></td>
          </tr>
        </tbody></table></td>
    </tr>
  </tbody></table><div class='yj6qo'></div><div class='adL'>
</div></div>
";
echo $message;
?>
