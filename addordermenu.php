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
$ord=$_REQUEST['id'];

If(isset($_POST["submit"]))
{
If($_POST['ordid']=='' || $_POST['menuid']=='')
{
Echo "please fill the empty field.";
}
Else
{
$sql_insert = mysqli_query($conn, "insert into order_menu(Order_id, Menu_Id ) values('".$_POST['ordid']."', '".$_POST['menuid']."')");

If($sql_insert)
{
Echo "Menu is added ";
}
Else
{
Echo "There is some problem in inserting record";
}

}
}?>
	<h1 class="login-title">Add Menu Items in Order</h1> 
	<p class="line">(add one by one)</p>
	<form class="form" action="" method="post">
        
		<label class="staf-reg">OrderId</label><br/>
		<input type="text" class="login-input" name="ordid"  value="<?php echo $ord;?>"  readyonly /><br/>
		<label class="staf-reg">Menu Id</label><br/>
       <input type="text" class="login-input" name="menuid" required/><br/>
	<input type="submit" name="submit" value="submit" class="login-button">
</form>
<div class="update-staff" id="update">
<h1 class="login-title">Customer Menu</h1>

<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Order ID</strong></th>
<th><strong>Menu Id</strong></th>
<th><strong>Item Name</strong></th>
<th><strong>Price ($)</strong></th>

</tr>
</thead>
<tbody>
<?php

$select="Select order_menu.Order_id, order_menu.Menu_Id, menu.Menu_name, menu.Menu_Price from order_menu, menu Where order_menu.Menu_Id=menu.Menu_Id";
$result = mysqli_query($conn,$select);
while($row = mysqli_fetch_assoc($result)) { ?>
<td align="center"><?php echo $row["Order_id"]; ?></td>
<td align="center"><?php echo $row["Menu_Id"]; ?></td>
<td align="center"><?php echo $row["Menu_name"]; ?></td>
<td align="center"><?php echo $row["Menu_Price"]; ?></td>
</tr>
<?php }?>
</table>

</table>
</div>
</body>
</html>