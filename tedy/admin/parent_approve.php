<?php
    include('controller/auth.php');
    $parent_id = $_REQUEST['parent_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div align="center" style="border-style: solid; border-color:lightgray; border-radius: 4px; border-width:thin; padding: 30px; width: 400px; height: 200px; margin-left: 500px; margin-top: 150px">
        <?php
            $parent = "SELECT * FROM parent_registration where parent_id='$parent_id'";
            $r_p = mysqli_query($con, $parent);
            $row = mysqli_fetch_assoc($r_p);
            echo '<font color="green" size="5">';
            echo 'Do you want to approve';
            echo '</font>';
            echo '<font color="#AEB6BF" size="5">';
            echo $row['parent_name'];
            echo '</font>';
            echo '<font color="green" size="5">';
            echo '  as parent of' ;
            echo ' ';
            echo '</font>';
            echo '<font color="#AEB6BF" size="5">';
            $stu_id = $row['student_id'];
        
            $student = "SELECT * FROM student_registration where stu_id = '$stu_id'";
            $r_st = mysqli_query($con, $student);
            $row_s = mysqli_fetch_assoc($r_st);
            echo $row_s['first_name'];
            echo ' ';
            echo $row_s['father_name'];
            echo ' ?'
        ?><br><br>
                <div style="padding: 10px; width: 150px; background-color:lightgray; border-style=:solid; margin-bottom: 10px; border-width: thing; border-color: lightgray; border-radius: 4px">
                    <a href="parent_approved.php?parent_id=<?php echo $parent_id; ?>" style="text-decoration:none"><font color="green">Approve</font></a> 
                </div>
        
            <div style="padding: 10px; width: 150px; border-style=:solid; ; background-color:lightgray; border-width: thing; border-color: lightgray; border-radius: 4px">
                <a href="parent_student_approval.php?parent_id=<?php echo $parent_id; ?>" style="text-decoration:none"><font color="red">Do't Approve</font></a>
            </div>
    </div>
</body>
</html>