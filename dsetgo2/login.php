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
      <h2>ADMIN LOGIN</h2>
		<form name="loginform" action="validatelogin.php" method="post" onsubmit="return validatelogin()" >
		   <div class="lable">
		    <div class="col_1_of_2 span_1_of_2">	<input type="text" class="text" placeholder="User Name" name="username"  ></div>
		   </div>
		   <div class="lable-2">
				 <div class="col_1_of_2 span_1_of_2">	<input type="password" class="text" name="password" placeholder="Password" ></div>
		   </div>
		   <input type="submit" value="Login" >
		</form>
		</div>
</body>
</html>

<script>
function validatelogin()
{

  var username= document.forms["loginform"]["username"].value;
  var password=document.forms["loginform"]["password"].value;


  if (username==null|| username=="")
{
alert("enter username");
document.loginform.username.focus();
return false;
}



else if (password==null|| password=="")
{
alert("enter password");
document.loginform.password.focus();
return false;
}
else {
  return true
}
}
</script>
