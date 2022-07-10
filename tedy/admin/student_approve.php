<?php
    include('controller/auth.php');
    $student_id = $_REQUEST['student_id'];
    // echo $student_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student approval</title>
</head>
<body>
    <div align="center" style="border-style: solid; border-color:lightgray; border-radius: 4px; border-width:thin; padding: 30px; width: 400px; height: 200px; margin-left: 500px; margin-top: 150px">
        <?php
            $student = "SELECT * FROM student_registration where stu_id='$student_id'";
            $r_p = mysqli_query($con, $student);
            $row = mysqli_fetch_assoc($r_p);
            echo '<font color="green" size="5">';
            echo 'Do you want to approve';
            echo '<br>';
            echo '</font>';
            echo '<font color="#AEB6BF" size="5">';
            echo '  ';
            echo $row['first_name'];
            echo ' ';
            echo $row['father_name'];
            echo ' ';
            echo $row['gf_name'];
            echo '<br>';
            echo '</font>';
            echo '<font color="green" size="5">';
            echo '  as a student in the school ?'
        ?><br><br>
                <div style="padding: 10px; width: 150px; background-color:lightgray; border-style=:solid; margin-bottom: 10px; border-width: thing; border-color: lightgray; border-radius: 4px">
                    <a href="student_approved.php?student_id=<?php echo $student_id; ?>" style="text-decoration:none"><font color="green">Approve</font></a> 
                </div>
        
            <div style="padding: 10px; width: 150px; border-style=:solid; ; background-color:lightgray; border-width: thing; border-color: lightgray; border-radius: 4px">
                <a href="student_approval.php?student_id=<?php echo $student_id; ?>" style="text-decoration:none"><font color="red">Do't Approve</font></a>
            </div>
    </div>
</body>
</html>