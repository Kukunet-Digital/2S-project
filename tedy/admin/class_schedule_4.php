<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class | Schedule</title>
    <style>
        table{
            border-collapse:collapse;
            width: 1000px;
        }
        th{
            padding-right: 10px;
            /* width: 200px; */
            padding-bottom:5px;
        }
        td{
            padding-right: 10px;
            padding-bottom: 5px;
            /* width: 200px */
        }
        tr{
            border-bottom: solid 1px lightblue;
        }
        tr: nth-child(even){
            background-color: lightgray;
        }
        select{
            padding: 10px;
            width: 300px;
            border-radius: 3px;
            border-color: lightblue;
        }
    </style>
</head>
<body>
    <form action="teachers.php" method="post">
    
    <br><br>
    <?php
        include('controller/auth.php');
        include('left_nav_bar.php');

        $grade_id = $_REQUEST['grade_id'];
    ?>

<div style="width: 1000px; margin-left: 300px;">
    <?php
        $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
        $r_me = mysqli_query($con, $me);
        $row_me = mysqli_fetch_assoc($r_me);
        $branch = $row_me['school_branch_id'];

        $school = "SELECT * FROM school_basic_info where school_id = '".$row_me['school_id']."'";
        $rs = mysqli_query($con, $school);
        $rows = mysqli_fetch_assoc($rs);

        $br = "SELECT * FROM school_branches where school_branch_id = '$branch'";
        $rbr = mysqli_query($con, $br);
        $rowbr = mysqli_fetch_assoc($rbr);

        echo '<div align="center">';
        echo '<font color="blue" size="4">';
        echo $rows['school_name'];
        echo ' | ';
        echo $rowbr['branch_name'];
        echo '</font>';
        echo '</div>';
        echo '<br><br><br>';

        $subject = "SELECT * FROM grade_subject gs inner join school_grade sg on sg.grade_id=gs.grade_id where gs.school_branch_id = '$branch'";
        $r_subject = mysqli_query($con, $subject);
        $count_sub = mysqli_num_rows($r_subject);

        if($count_sub == 0){
            echo 'No data recorded';
        }else{?>
<h4>Select the section</h4>

        <?php
            $sec = "SELECT * FROM class_grade where grade_id='$grade_id'";
            $r_sec = mysqli_query($con, $sec);
            while($row_sec = mysqli_fetch_array($r_sec)){
                $ss = $row_sec['class_id'];

                $pp = "SELECT * FROM school_class where class_id='$ss'";
                $r_pp = mysqli_query($con, $pp);
                while($row_pp = mysqli_fetch_array($r_pp)){?>
            
            <a href="class_schedule_detail.php?grade_id=<?php echo $grade_id; ?> && building_id=<?php echo $row_pp['building_id']; ?> && class_id=<?php echo $row_pp['class_id']; ?>">
                    
                    <div style="border-style:solid; border-width:thin; border-radius: 3px; width: 100px; height: 50px; padding: 10px; float:left; margin: 10px">

                        <?php
                            $gg = "SELECT * FROM school_grade where grade_id='$grade_id'";
                            $r_gg = mysqli_query($con, $gg);
                           while($row_gg = mysqli_fetch_array($r_gg)){
                            echo 'Grade: ';
                            echo $row_gg['grade_name'];
                        }

                            //echo $grade_id;
                            echo '<br>';
                            echo 'Bld ';
                            echo $row_pp['building_id'];
                            echo '-';
                            echo $row_pp['class_name'];
                            echo '<br>';
                        ?>
                    </div>
                    </a>
            <?php
                }
            }

        }    
        ?>
       

    
                
</div>
        
</body>
</html>