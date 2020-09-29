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
$st_id=$_SESSION['sess-id'];
$role=$_SESSION['role'];

$std = mysqli_query($conn,"SELECT staff_designation FROM staff Where Staff_id='".$st_id."'");
$numrows = mysqli_num_rows($std); 
 if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($std))  
    {  
    $dbstaff=$row['staff_designation']; 
	}
	}
if(($role== 'Admin') && ($dbstaff=='Admin')){
if($_REQUEST['id'] !=''){$custid=$_REQUEST['id'];}else{echo"customer Deatils missing. Please go to customer page and place order";}
    // When form submitted, insert values into the database.
If(isset($_POST["submit"]))
{
If($_POST['id']=='' || $_POST['cost']=='' ||  $_POST['Staffid']=='')
{
Echo "please fill the empty field.";
}
Else
{
$sql_insert = mysqli_query($conn, "insert into orders(Order_id, Order_status, total_cost, Customer_id, Staff_id ) values('".$_POST['id']."','".$_POST['status']."', '".$_POST['cost']."', '".$_POST['customerid']."', '".$_POST['Staffid']."')");

If($sql_insert)
{
Echo "Order is assigned ";
header('Location: addordermenu.php?id='.$_POST['id']);
}
Else
{
Echo "There is some problem in inserting record";
}

}
}

?>
<div class="add-new">
    <form class="form" action="" method="post">
        <h1 class="login-title">Add New Order Details</h1>
		<label class="staf-reg">OrderId</label><br/>
		<input type="text" class="login-input" name="id"  required /><br/>
		<label class="staf-reg">Order Date</label><br/>
       <input type="text" class="login-input" name="date" value="<?php echo date("Y/m/d");?>"/><br/>
	
		<label class="staf-reg">Order Status</label><br/>
		<input type="text" class="login-input" name="status" value="Pending" required /><br/>
		
		<label class="staf-reg">Total cost</label><br/>
				<input type="number" class="login-input" name="cost"  value="<?php echo "0";?>" /><br/>
		<label class="staf-reg">Customer Id</label><br/>
				<input type="number" class="login-input" name="customerid" value="<?php echo $custid;?>" /><br/>
				<label class="staf-reg">Assign Staff Id</label><br/>
				<input type="number" class="login-input" name="Staffid" />
<br/>
	
        <input type="submit" name="submit" value="submit" class="login-button">
    </form>
	
<?php
}else{ ?>
<div class="order-ass">
<h1 class="login-title">Assigned Orders</h1>

<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Order ID</strong></th>
<th><strong>Order Date</strong></th>
<th><strong>Menu Id</strong></th>
<th><strong>Status</strong></th>
<th><strong>Customer id</strong></th>
<th><strong>Action</strong></th>

</tr>
</thead>
<tbody>
<?php
$selt = mysqli_query($conn, "Select orders.Order_id, orders.Order_date, orders.Order_status, orders.Customer_id, order_menu.Menu_Id FROM orders, order_menu Where order_menu.Order_id = orders.Order_id AND orders.Staff_id='".$st_id."' ");
while($row = mysqli_fetch_assoc($selt)) { ?>
<tr>
<td align="center"><?php echo $row["Order_id"]; ?></td>
<td align="center"><?php echo $row["Order_date"]; ?></td>
<td align="center"><?php echo $row["Menu_Id"]; ?></td>
<td align="center"><?php echo $row["Order_status"]; ?></td>
<td align="center"><?php echo $row["Customer_id"]; ?></td>
<td align="center"><a href="update.php?id=<?php echo $row["Order_id"]; ?>">Update</a>
</td></tr>
<?php }?>

	
</tbody>
</table>
</div>
<?php } ?>

</body>
</html>