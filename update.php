<!DOCTYPE html>
<html>
<head>
    <title>Update Menu</title>
    <link rel="stylesheet" href="/order-online/styles.css"/>
</head>
<body>
<?php  require('db_connection.php');
include('connect.php');
include ('nav.php');
$orderid=$_REQUEST['id'];
$staffid=$_SESSION['sess-id'];

$std = mysqli_query($conn,"Select Order_id,  Order_status FROM orders Where Order_id='".$orderid."'");
$numrows = mysqli_num_rows($std); 
 if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($std))  
    {  
$id=$row['Order_id'];
$status=$row['Order_status'];
	
	}}
/*$cont = mysqli_query($conn,"SELECT staff_phone from staff_contact where Staff_id='".$id."'"); 
$numrows = mysqli_num_rows($resultct); 
 if($numrows!=0)  
    { 
while($row=mysqli_fetch_assoc($resultct)){ 
$phone = $row['staff_phone'];

	}}*/
	

	If(isset($_POST["submit"])){

$up=mysqli_query($conn, "update orders set Order_id='".$_POST['Order_Id']."', Order_status='".$_POST['status']."' where Order_id='".$orderid."'");
If($up)
{
Echo "Menu is updated.";
header("Location: orders.php");

}else {echo"error";
}

}
	
	
?>

<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<input name="Order_Id" type="text" value="<?php echo $id;?>" readonly />

<p><select name="status">
<option value="Pending">Pending</option>
<option value="In Progress">In Progress</option>
<option value="Completed">Completed</option>
</select></p>

<p><input name="submit" type="submit" value="submit" /></p>
</form></div>
	<?php  ?>

</body>
</html>