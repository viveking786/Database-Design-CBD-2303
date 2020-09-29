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
$menuid=$_REQUEST['id'];

$st_id=$_SESSION['sess-id'];
$role=$_SESSION['role'];


$ex=mysqli_query($conn, "Select staff_designation from staff where Staff_id =$st_id");
$numrows = mysqli_num_rows($ex); 
 if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($ex))  
    {  
    $dbstaff=$row['staff_designation']; 
	}
	}

if ($dbstaff=='Admin' && $role='Admin'){
$del = mysqli_query($conn, "DELETE FROM menu WHERE Menu_Id=$menuid"); 
If($del)
{
	Echo "Menu Item Has Deleted!"; 
}}else{echo "Staff Members cannot delete Menu items. Please contact Admin. ";}
	
?>
</div>

</body>
</html>