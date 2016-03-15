<html>
<body>

<form action="welcome.php" method="post">
	Name: <input type="text" name="name" value="<?php echo $name;?>"><br>

	E-mail: <input type="text" name="email" value="<?php echo $email;?>"><br>

	Website: <input type="text" name="website" value="<?php echo $website;?>"><br>

	Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea><br>

	Gender:
	<input type="radio" name="gender"
	<?php if (isset($gender) && $gender=="female") echo "checked";?>
	value="female">Female
	<input type="radio" name="gender"
	<?php if (isset($gender) && $gender=="male") echo "checked";?>
	value="male">Male<br>
<input type="submit">
</form>

</body>
</html>
