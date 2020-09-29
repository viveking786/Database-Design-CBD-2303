<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="/order-online/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    /* body {
      background-color: #1BA39C;
    } */
  </style>
</head>

<body>

  <div class="heading-page">
    <h1>BSV Restraunt</h1>
    <p>Admin Portal</p>
    <p><a href="register.php" class="reg">Register</a> <a href="index.php" class="reg">Login</a></p>

  </div>
  <h3 class="log_fr_in">Login Form</h3>
  <form action="" method="POST" class="lgn_form">
    <label for="id">Staff ID: <input type="text" name="id" id="id"></label><br />
    <label for="pass">Password: <input type="password" name="pass" id="pass"></label><br />
    Designation: <input type="radio" name="des" value="Admin" id="admin"/><label for="admin">Admin</label> | <input type="radio" name="des" value="Staff" id="staff"/><label for="staff">Staff</label>
    <br>
    <input type="submit" value="Login" name="submit" />
  </form>
  <?php
  include('connect.php');
  if (isset($_POST["submit"])) {
    $inst = mysqli_query($conn, "INSERT INTO staff (Staff_id, Staff_name, Staff_designation, Staff_password) values(11, 'Adminstrator', 'Admin', 'pass@123')");
    if (!empty($_POST['id']) && !empty($_POST['pass']) && !empty($_POST['des'])) {
      $id = $_POST['id'];
      $pass = $_POST['pass'];
      $role = $_POST['des'];
      if ($role == 'Admin') {
        $std = mysqli_query($conn, "SELECT * FROM staff WHERE Staff_id = '" . $_POST['id'] . "' and Staff_password = '" . $_POST['pass'] . "'");
        $numrows = mysqli_num_rows($std);
        if ($numrows != 0) {
          while ($row = mysqli_fetch_assoc($std)) {
            $dbusername = $row['Staff_id'];
            $dbpassword = $row['Staff_password'];
          }

          if ($id == $dbusername && $pass == $dbpassword) {
            session_start();
            $_SESSION['sess-id'] = $dbusername;

            $_SESSION['role'] = $role;
            /* Redirect browser */
            header("Location: register.php");
          }
        } else {
          echo "Invalid username or password!";
        }
      } else {
        session_start();
        $_SESSION['sess-id'] = $id;

        $_SESSION['role'] = $role;
        header("Location: menu.php");
      }
    } else {
      echo "All fields are required!";
    }
  } ?>
</body>

</html>