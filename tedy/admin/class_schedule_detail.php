<?php
    include('controller/auth.php');
    $grade_id = $_REQUEST['grade_id'];
    $building_id = $_REQUEST['building_id'];
    $class_id = $_REQUEST['class_id'];
    $me = $_SESSION['admin'];

    $yes = "SELECT * FROM admin where username = '$me'";
    $ryes = mysqli_query($con, $yes);
    $row_yes = mysqli_fetch_assoc($ryes);

    $school_id = $row_yes['school_id'];
    $school_branch_id = $row_yes['school_branch_id'];


    $school = "SELECT * FROM school_basic_info where ";
   //echo $grade_id;
    echo '<br>';
   // echo $class_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailed | Schedule</title>
</head>
<body>
    <form action="class_schedule_detail.php" method="post">
        <?php
            $schedule_check = "SELECT * FROM school_class_schedule where school_id='$school_id' and school_branch_id='$school_branch_id' and grade_id='$grade_id' and building_id='$building_id' and section_id='$class_id'";
            $result = mysqli_query($con, $schedule_check);
            $count = mysqli_num_rows($result);
            if($count == 0){
                echo 'Start the schedule';
                echo '<br>';

            $setup = "SELECT * FROM school_daily_time_basic where school_id='$school_id' and school_branch_id='$school_branch_id'";
            $r_setup = mysqli_query($con, $setup);
            $row_setup = mysqli_fetch_assoc($r_setup);

            $morning_from = $row_setup['morningPeriodFrom'];
            $morning_to = $row_setup['morningPeriodTo'];
            $timePerClass = $row_setup['timePerClass'];
            echo '<br>';
            $t = 60;
$h = floor($t/60) ? floor($t/60) .' hours' : '';
$m = $t%60 ? $t%60 .' minutes' : '';
echo $h && $m ? $h.' and '.$m : $h.$m;
                echo '<br>';

            echo 'Morning time From: ';
            echo $morning_from;
            echo '<br>';
            echo 'Morning time To: ';
            echo $morning_to;
            echo '<br>';
            echo 'Time per class (in minute): ';
            echo $timePerClass;
            echo '<br>';

            $period1 = $morning_from + $timePerClass;
            echo $period1;


                ?>
            

        <?php
            }else{
                echo 'Continue with the scheduling';
            }
        ?>
    </form>
</body>
</html>