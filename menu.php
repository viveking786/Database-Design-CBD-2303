<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/order-online/styles.css"/>
</head>
<body>
<?php 
require('db_connection.php');
include('connect.php');
include ('nav.php');
$st_id=$_SESSION['sess-id'];
?>
<div class="update-staff" id="update">
<h1 class="login-title">Our Menu</h1>

<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Menu ID</strong></th>
<th><strong> Menu Name</strong></th>
<th><strong>Price</strong></th>
<th><strong>Staff ID (who Add or update menu)</strong></th>

<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php

$select="Select * from menu ORDER BY Menu_Id;";
$result = mysqli_query($conn,$select);
while($row = mysqli_fetch_assoc($result)) { ?>
<td align="center"><?php echo $row["Menu_Id"]; ?></td>
<td align="center"><?php echo $row["Menu_name"]; ?></td>
<td align="center"><?php echo $row["Menu_Price"]; ?></td>
<td align="center"><?php echo $row["Staff_id"]; ?></td>


<td align="center">
<a href="menuedit.php?id=<?php echo $row["Menu_Id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deletemenu.php?id=<?php echo $row["Menu_Id"]; ?>">Delete</a>
</td>
</tr>
<?php }?>

</table>
</div>


<?php
   


    // When form submitted, insert values into the database.
If(isset($_POST["submit"]))
{
If($_POST['menuid']=='' || $_POST['menuname']=='' || $_POST['price']=='' || $_POST['Staffid']=='')
{
Echo "please fill the empty field.";
}
Else
{
$sql_insert = mysqli_query($conn,"insert into menu(Menu_Id, Menu_name, Menu_Price, Staff_id) values('".$_POST['menuid']."','".$_POST['menuname']."', '".$_POST['price']."', '".$st_id."')");

If($sql_insert)
{
Echo "Menu is added.";
header("Location: menu.php");
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
        <h1 class="login-title">Add New Menu</h1>
		<label class="staf-reg">Menu Id</label><br/>
		<input type="text" class="login-input" name="menuid"  required /><br/>
		<label class="staf-reg">Menu Name</label><br/>
        <input type="text" class="login-input" name="menuname"  required /><br/>
				<label class="staf-reg">Price($)</label><br/>
				<input type="number" class="login-input" name="price"   /><br/>
				<input type="hidden" class="login-input" name="Staffid" value="<?php echo $st_id;?> "/>
<br/>
		
        <input type="submit" name="submit" value="submit" class="login-button">
    </form>
</div>



</body>
</html>