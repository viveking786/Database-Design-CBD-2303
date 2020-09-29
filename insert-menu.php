<?php
include(index.php);
?>
<html>
<head>
  <title>Add Menu Items</title>
</head>
<body>

<form action="insert-items.php" method="POST">
   <input type="text" name="fullname" placeholder="Enter Full Name" Required>
  <br/>
  Age : <input type="text" name="age" placeholder="Enter Age" Required>
  <br/>
  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>