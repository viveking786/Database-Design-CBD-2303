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
$custid=$_REQUEST['id'];
$std = mysqli_query($conn,"SELECT Customer.Customer_id, Customer.Customer_name, Customer.Customer_address, customer_contact.customer_phone FROM Customer, customer_contact WHERE  Customer.Customer_id=customer_contact.Customer_Id AND Customer.Customer_id='".$custid."'");
$numrows = mysqli_num_rows($std); 
 if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($std))  
    {  
$id=$row['Customer_id'];
$name= $row['Customer_name'];
$address=$row['Customer_address'];
$phone=$row['customer_phone'];	
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

$up=mysqli_query($conn, "update Customer set Customer_id='".$_POST['id']."', Customer_name='".$_POST['name']."', Customer_address='".$_POST['address']."' where Customer_id='".$_POST['id']."'");
$up_phn=mysqli_query($conn, "update customer_contact set Customer_Id='".$_POST['id']."', customer_phone='".$_POST['phone']."' where Customer_Id='".$_POST['id']."'");
If($up)
{
Echo "Customer Details are updated.";
header("Location: customer.php");

}else {echo"error";}

}
	
	
?>

<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p>Customer Id<br/>
<input name="id" type="text" value="<?php echo $id;?>" readonly /></p>

<p>Customer Name<br/><input type="text" name="name" 
required value="<?php echo $name;?>" /></p>
<p>Address<br/><input type="text" name="address" placeholder="Enter Price" 
required value="<?php echo $address;?>" /></p>
<p>Phone Number<br/><input type="text" name="phone" placeholder="Enter Price" 
required value="<?php echo $phone;?>" /></p>
<p><input name="submit" type="submit" value="submit" /></p>
</form></div>
	<?php  ?>

</body>
</html>