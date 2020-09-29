<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" href="/order-online/styles.css" />
</head>

<body>
    <?php
    require('db_connection.php');
    include('connect.php');
    include('nav.php');
    $st_id = $_SESSION['sess-id'];
    $role = $_SESSION['role'];
    $std = mysqli_query($conn, "SELECT staff_designation FROM staff Where Staff_id='" . $st_id . "'");
    $numrows = mysqli_num_rows($std);
    if ($numrows != 0) {
        while ($row = mysqli_fetch_assoc($std)) {
            $dbstaff = $row['staff_designation'];
        }
    }
    if (($role == 'Admin') && ($dbstaff == 'Admin')) {

        // When form submitted, insert values into the database.
        if (isset($_POST["submit"])) {
            if ($_POST['Staffid'] == '' || $_POST['Staffname'] == '' || $_POST['password'] == '' || $_POST['Staffdes'] == '') {
                echo "please fill the empty field.";
            } else {
                $sql_insert = mysqli_query($conn, "insert into staff(Staff_id, Staff_name, Staff_designation, Staff_password) values('" . $_POST['Staffid'] . "','" . $_POST['Staffname'] . "', '" . $_POST['Staffdes'] . "', '" . $_POST['password'] . "')");
                $sql_insert_contact = mysqli_query($conn, "insert into staff_contact(Staff_id, staff_phone) values('" . $_POST['Staffid'] . "','" . $_POST['Staffphone'] . "')");
                $sql_insert_alt = mysqli_query($conn, "insert into staff_contact(Staff_id, staff_phone) values('" . $_POST['Staffid'] . "','" . $_POST['Staffemer'] . "')");

                if ($sql_insert) {
                    echo "Staff record is added.";
                } else {
                    echo "There is some problem in inserting record";
                }
            }
        }

    ?>
        <div class="add-new">
        <h1 class="login-title">Add New Staff Member</h1>
            <form class="form" action="" method="post">
                <label class="staf-reg">Staff Id</label><br />
                <input type="text" class="login-input" name="Staffid" required /><br />
                <label class="staf-reg">Staff Name</label><br />
                <input type="text" class="login-input" name="Staffname" required /><br />
                <label class="staf-reg">Staff Designation</label><br />
                <input type="text" class="login-input" name="Staffdes" required /><br />
                <label class="staf-reg">Phone Number</label><br />
                <input type="number" class="login-input" name="Staffphone" required /><br />
                <label class="staf-reg">Alternate Phone Number</label><br />
                <input type="number" class="login-input" name="Staffemer" value='0000000000' />
                <br />
                <label class="staf-reg">Password</label><br />
                <input type="password" class="login-input" name="password"><br />
                <input type="submit" name="submit" value="submit" class="login-button">
            </form>
        </div>

        <div class="update-staff" id="update">
            <h1 class="login-title">Update Staff Details</h1>

            <table width="100%" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Staff Name</th>
                        <th>Staff Designation</th>
                        <th>Staff Password</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $select = "Select * from staff ORDER BY Staff_id;";
                    $result = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <td align="center"><?php echo $row["Staff_id"]; ?></td>
                        <td align="center"><?php echo $row["Staff_name"]; ?></td>
                        <td align="center"><?php echo $row["staff_designation"]; ?></td>
                        <td align="center"><?php echo $row["Staff_password"]; ?></td>


                        <td align="center" class="edit_rec_td">
                            <a class="edit_records" href="edit.php?id=<?php echo $row["Staff_id"]; ?>"><i class="fa fa-edit"></i></a>
                        </td>
                        <td align="center"  class="delete_rec_td">
                            <a class="delete_records" href="delete.php?id=<?php echo $row["Staff_id"]; ?>"><i class="fa fa-remove"></i></a>
                        </td>
                        </tr>
                    <?php } ?>

            </table>
        </div>
    <?php
    } else {
        echo '<h3 class="not_allowed">Please Contact The Adminstration Department</h3>';
    } ?>
</body>

</html>