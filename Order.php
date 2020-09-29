<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="/order-online/styles.css"/>
</head>
<body>
<?php  require('db_connection.php');
include('connect.php');
include ('nav.php');
$menuid=$_REQUEST['id'];

$st_id=$_SESSION['sess-id'];
$role=$_SESSION['role'];

$customerid=$_SESSION['customer'];

echo $st_id;
echo  $role;
echo $customerid;

?>
</body>
</html>