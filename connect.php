<?php
session_start();
error_reporting(0);
$servername = "localhost";
$username = "root_order";
$password = "order@123";
$dbname = "myorder";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Customer (
Customer_id INT(6) AUTO_INCREMENT PRIMARY KEY,
Customer_name VARCHAR(30) NOT NULL,
Customer_address VARCHAR(30) NOT NULL

)";


$sql2="CREATE TABLE IF NOT EXISTS staff(
Staff_id int(3) AUTO_INCREMENT PRIMARY KEY, 
Staff_name varchar(30) NOT NULL, 
staff_designation varchar(30) NOT NULL,
Staff_password varchar(11) NOT NULL
)";


$sql3="CREATE TABLE IF NOT EXISTS Orders(
Order_id int(3) not null PRIMARY KEY AUTO_INCREMENT,
Order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
Order_status varchar(17) NOT NULL DEFAULT 'Pending',
total_cost int(5) not null, 
Customer_id int(6) not null,
Staff_id int(3) NOT NULL,
Foreign key (Staff_id) REFERENCES staff(Staff_id),
Foreign key (Customer_id) REFERENCES Customer(Customer_id)
)";


$sql4="CREATE TABLE IF NOT EXISTS Menu(
Menu_Id int(3) Not NULL PRIMARY KEY, 
Menu_name varchar(30) NOT NULL, 
Menu_Price int(10) NOT NULL,
Staff_id int(3) NOT NULL,
Foreign key (Staff_id) references staff(Staff_id)
)";

$sql5="CREATE TABLE IF NOT EXISTS order_menu(
Menu_Id int(3) Not NULL, 
Order_id int(3) not null,
Primary key(Menu_Id,Order_id)
)";

$contact1= "CREATE TABLE IF NOT EXISTS customer_contact (
Customer_Id int(6) not null, 
customer_phone int(12) not null,
Primary key(Customer_Id,customer_phone)
)";



if ($conn->query($sql) === TRUE ) {
  echo "";
} else {
  echo "Error creating customer table: " . $conn->error;
}
if ($conn->query($sql2) === TRUE ) {
  echo "";
} else {
  echo "Error creating staff table: " . $conn->error;
}

if ($conn->query($sql3) === TRUE ) {
  echo "";
} else {
  echo "Error creating order table: " . $conn->error;
}

if ($conn->query($sql4) === TRUE ) {
  echo "";
} else {
  echo "Error creating menu table: " . $conn->error;
}
if ($conn->query($sql5) === TRUE ) {
  echo "";
} else {
  echo "Error creating menu_order table: " . $conn->error;
}
if ($conn->query($contact1) === TRUE ) {
  echo "";
} else {
  echo "Error creating Customer_contact table: " . $conn->error;
}


?>
