<?php
// Start the session
session_start();
if($_SESSION["username"]=="")
{
  header("Location: login.php");
}
?>
<?php
 session_unset();
 session_destroy();
 header("Location: login.php");
?>
