<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="/order-online/styles.css"/>
</head>
<body>
<div class="del-message">
<?php  require('db_connection.php');
include('connect.php');
include ('nav.php');
$staffid=$_REQUEST['id'];

$del = mysqli_query($conn, "DELETE FROM staff WHERE Staff_id=$staffid"); 
If($del)
{
	Echo "Staff Record Has Deleted!";
}

?>
</div>

</body>
</html>