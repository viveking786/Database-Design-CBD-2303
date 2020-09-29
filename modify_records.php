<?php
include('connect.php')
if(isset($_POST['edit_staff']))
{
 $row=$_POST['row_id'];
 $name=$_POST['name_val'];
 $des=$_POST['des_val'];

 mysql_query("update staff set Staff_name='$name',Staff_designation='$des' where id='$row'");
 echo "success";
 exit();
}

if(isset($_POST['delete_staff']))
{
 $row_no=$_POST['row_id'];
 mysql_query("delete from staff where Staff_id='$row_no'");
 echo "success";
 exit();
}

?>