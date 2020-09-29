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
$menuid=$_REQUEST['id'];
$staffid=$_SESSION['sess-id'];

$std = mysqli_query($conn,"SELECT * FROM menu Where Menu_Id='".$menuid."'");
$numrows = mysqli_num_rows($std); 
 if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($std))  
    {  
$id=$row['Menu_Id'];
$name= $row['Menu_name'];
$price=$row['Menu_Price'];
$staff=$row['Staff_id'];	
	}}
/*$cont = mysqli_query($conn,"SELECT staff_phone from staff_contact where Staff_id='".$id."'"); 
$numrows = mysqli_num_rows($resultct); 
 if($numrows!=0)  
    { 
while($row=mysqli_fetch_assoc($resultct)){ 
$phone = $row['staff_phone'];

	}}*/
	
$status = "";

	If(isset($_POST["submit"])){

$up=mysqli_query($conn, "update menu set Menu_Id='".$_POST['Menu_Id']."', Menu_name='".$_POST['name']."', Menu_Price='".$_POST['price']."', Staff_id='".$_POST['staff']."' where Menu_Id='".$_POST['Menu_Id']."'");
If($up)
{
Echo "Menu is updated.";
header("Location: menu.php");

}else {echo"error";}

}
	
	
?>

<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="staff" type="hidden" value="<?php echo $staff;?>" />
<input name="Menu_Id" type="text" value="<?php echo $id;?>" readonly />

<p><input type="text" name="name" placeholder="Menu Name" 
required value="<?php echo $name;?>" /></p>
<p><input type="text" name="price" placeholder="Enter Price" 
required value="<?php echo $price;?>" /></p>

<p><input name="submit" type="submit" value="submit" /></p>
</form></div>
	<?php  ?>

</body>
</html>