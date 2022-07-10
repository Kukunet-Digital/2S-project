<?php
    include('controller/auth.php');

    $staff_id = $_REQUEST['staff_id'];
    echo $student_id;

    $staff = "SELECT * FROM staff_registration sr inner join users u on u.email=sr.username where sr.s_id = '$staff_id' ";
    $r_staff = mysqli_query($con, $staff);
    $row_staff = mysqli_fetch_assoc($r_staff);
    echo '<br>';
    // echo $row_staff['s_id'];
    $usr = $row_staff['role_id'];
    
    $role = "SELECT * FROM role where role_id = '$usr'";
    $r_role = mysqli_query($con, $role);
    $row_role = mysqli_fetch_assoc($r_role);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff | Approval</title>
</head>
<body>
    <form action="staff_approved.php" method="post">
    <?php
        if(isset($_POST['new']) && $_POST['new']){
            $staff_approval = $_POST['staff_approval'];

            $update = "UPDATE staff_registration set staff_approval = '$staff_approval' ";
            mysqli_query($con, $update);
            header('location: staff_approval.php');
        }else{?>
            <input type="hidden" name="new" value="1">
            <input type="hidden" name="s_id" value="<?php echo $staff_id; ?>">
            <input type="hidden" name="staff_approval" value="1">
            <br>
            <div align="center" style="border-style: solid; border-color:lightgray; border-radius: 4px; padding: 30px; border-width: thin; width: 400px; height: 150px; margin-left: 500px; margin-top: 150px">
               <font size="5" color="blue"> Do you want to approve </font> <br><font size="5" color="red"><?php echo $row_staff['first_name']; ?> <?php echo $row_staff['father_name']; ?></font><br><font color="blue" size="5"> as <?php echo $row_role['role']; ?> ?</font><br>
                <button class="btn" style="margin-top: 50px; margin-bottom: 50px; border-radius:3px; border-color:green; color:green; padding: 10px; width: 150px">Yes</button><br><br>
            </div>
            
    <?php
        }
    ?>
    </form>
</body>
</html>