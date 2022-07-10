<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regions</title>
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
<div style="width: 1000px">
<h4>Select the grade from the following</h4>

        <?php
            while($row_grade = mysqli_fetch_array($r_subject)){?>
                
                <a href="class_schedule_4.php?grade_id=<?php echo $row_grade['grade_id']; ?>">
                <div style="float:left; margin: 10px; border-style:solid; border-width:thin; border-color:green; border-radius:4px; padding: 10px; width: 60px; height: 50px">
                    <?php
                        $gr = $row_grade['grade_id'];
                        
                        $ga = "SELECT * FROM school_grade where grade_id = '$gr' order by grade_id";
                        $rga = mysqli_query($con, $ga);
                        while($row_rga = mysqli_fetch_array($rga)){
                            echo $row_rga['grade_name'];
                        }
                        
                        echo '<br>';
                    ?>
                        </div>
                        </a>
            <?php
            }
            ?>
       

    <?php
        }
    ?>
                
</div>
        
</body>
</html>