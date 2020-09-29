<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="/order-online/styles.css"/>
</head>
<body>
<?php  require('db_connection.php');
include('connect.php');
$staffid=$_REQUEST['id'];
echo $staffid;
$std = mysqli_query($conn,"SELECT * FROM staff Where Staff_id='".$staffid."'");
$numrows = mysqli_num_rows($std); 
 if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($std))  
    {  
$id=$row['Staff_id'];
$name= $row['Staff_name'];
$des=$row['staff_designation'];
$pass=$row['Staff_password'];	
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

$up=mysqli_query($conn, "update staff set Staff_id='".$_POST['staff_id']."', Staff_name='".$_POST['name']."', staff_designation='".$_POST['des']."', Staff_password='".$_POST['pass']."' where Staff_id='".$_POST['staff_id']."'");
If($up)
{
Echo "Staff record is added.";
}else {echo"err";}

$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}
	
	
?>

<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="staff_id" type="text" value="<?php echo $staffid;?>" />
<p><input type="text" name="name" placeholder="Enter Name" 
required value="<?php echo $name;?>" /></p>
<p><input type="text" name="des" placeholder="Enter Designation" 
required value="<?php echo $des;?>" /></p>
<p><input type="text" name="pass" placeholder="Enter Password" 
required value="<?php echo $pass;?>" /></p>


<p><input name="submit" type="submit" value="submit" /></p>
</form></div>
	<?php  ?>

</body>
</html>