<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="/order-online/styles.css"/>
</head>
<body>
<?php
    require('db_connection.php');
include('connect.php');
include('nav.php');
$st_id=$_SESSION['sess-id'];
$role=$_SESSION['role'];

If(isset($_POST["submit"]))
{
If($_POST['custname']=='' || $_POST['custadd']=='')
{
Echo "please fill the empty field.";
}
Else
{
$sql_insert = mysqli_query($conn,"insert into Customer(Customer_id, Customer_name, Customer_address) values('".$_POST['customerid']."','".$_POST['custname']."','".$_POST['custadd']."')");
$sql_insert_contact = mysqli_query($conn, "insert into customer_contact(Customer_Id, customer_phone) values('".$_POST['customerid']."','".$_POST['phone']."')");
If($sql_insert)
{
Echo "Customer is added.";
}
Else
{
Echo "There is some problem in inserting record";
}
$ctid = $_POST['customerid'];
	$_SESSION['customerid']= $ctid;
}
}

?>
<div class="add-new">
    <form class="form" action="" method="post">
        <h1 class="login-title">Add New customer</h1>
		<label class="staf-reg">Customer Id</label><br/>
		<input type="text" class="login-input" name="customerid"  required /><br/>
		<label class="staf-reg">Customer Name</label><br/>
        <input type="text" class="login-input" name="custname"  required /><br/>
		<label class="staf-reg">Customer address</label><br/>
		<input type="text" class="login-input" name="custadd"  required /><br/>
		 <label class="staf-reg">Phone Number</label><br/>
				<input type="text" class="login-input" name="phone"  required /><br/>
		
<br/>
        <input type="submit" name="submit" value="submit" class="login-button">
    </form>
</div>

<div class="update-staff" id="update">
<h1 class="login-title">Update Customer Details</h1>

<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Customer ID</strong></th>
<th><strong>Customer Name</strong></th>
<th><strong>customer address</strong></th>
<th><strong>Phone Number</strong></th>
<th><strong> Orders </strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php

$selt=mysqli_query($conn,"SELECT Customer.Customer_id, Customer.Customer_name, Customer.Customer_address, customer_contact.customer_phone FROM Customer, customer_contact WHERE  Customer.Customer_id=customer_contact.Customer_ID");
$numrows = mysqli_num_rows($selt); 
 if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($selt))  
     { ?>
<td align="center"><?php echo $row["Customer_id"]; ?></td>
<td align="center"><?php echo $row["Customer_name"]; ?></td>
<td align="center"><?php echo $row["Customer_address"]; ?></td>
<td align="center"><?php echo $row["customer_phone"]; ?></td>
<td align="center" class="cus_order">
<a href="orders.php?id=<?php echo $row["Customer_id"]; ?>"><i class="fa fa-shopping-cart"></i></a>
</td>

<td align="center" class="cus_order_edit">
<a href="cust-edit.php?id=<?php echo $row["Customer_id"]; ?>"><i class="fa fa-edit"></i></a>
</td>
<td align="center" class="cus_order_remove">
<a href="custdelete.php?id=<?php echo $row["Customer_id"]; ?>"><i class="fa fa-remove"></i></a>
</td>
</tr>
	 <?php }}?>

</table>
</div>

</body>
</html>