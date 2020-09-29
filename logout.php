 
<?php 
 include('connect.php');
 include ('nav.php');
if(isset($_GET['logout']))
{
	session_destroy();
	header('location:index.php?logout=true');
	exit;
}
?>