<?php
    include('controller/auth.php');

    $stu_id = $_REQUEST['student_id'];
    //echo $student_id;

    $stu = "SELECT * FROM student_registration where stu_id = '$stu_id' ";
    $r_stu = mysqli_query($con, $stu);
    $row_stu = mysqli_fetch_assoc($r_stu);
    echo '<br>';
  //  echo $row_stu['stu_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | Approval</title>
</head>
<body>
    <form action="student_approved.php" method="post">
    <?php
        if(isset($_POST['new']) && $_POST['new']){
            $st_approval = $_POST['st_approval'];
            $student_id = $_POST['student_id'];
            $stu_id = $_POST['stu_id'];

            $update = "UPDATE student_registration set student_id = '$student_id', st_approval = '$st_approval' where stu_id='$stu_id'";
            mysqli_query($con, $update);
            header('location: student_approval.php');
        }else{?>
        <div align="center" style="margin-left: 500px; margin-top: 150px; width: 400px; border-style:solid; border-width:thin; border-radius: 5px; border=color:lightgray; padding: 30px; height: 150px">
            <input type="hidden" name="new" value="1">
            <input type="hidden" name="stu_id" value="<?php echo $row_stu['stu_id']; ?>">
            <input type="hidden" name="st_approval" value="1">
            <input type="hidden" name="student_id" value="STU-<?php echo $row_stu['school_id']; ?>-<?php echo $row_stu['stu_id']; ?>">
            <br>
           <font color="blue" size="5"> Do you want to approve</font><br><font color="lightgray" size="5px"> <?php echo $row_stu['first_name']; ?> <?php echo $row_stu['father_name']; ?> ?</font><br>
            <button class="btn" style="padding: 10px; border-style:solid; border-width: thin; border-color:green; border-radius:5px; margin-top: 50px; margin-bottom:50px; width: 150px">Yes</button>
        </div>
            
    <?php
        }
    ?>
    </form>
</body>
</html>