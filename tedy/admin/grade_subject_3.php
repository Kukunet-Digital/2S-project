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
<table>
                        <tr>
                            <th>SNo.</th>
                            <th>Grade</th>
                            <th>Subject</th>
                            
                            <th colspan='2' style="text-align:center">Actions</th>
                        </tr>
                        <tr>
                            <?php
                                $sno = 1;
                                while($rowreport = mysqli_fetch_array($r_subject)){?>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $rowreport['grade_name']; ?></td>
                            <td>
                                <?php
                                    $result = $rowreport['subject_id'];
                                    $sub = explode (",", $result);
                                   
                                    $ss = "SELECT * FROM subjects where subject_id = '".$sub[0]."' OR subject_id = '".$sub[1]."' OR subject_id = '".$sub[2]."' OR subject_id = '".$sub[3]."' OR subject_id = '".$sub[4]."' OR subject_id = '".$sub[5]."' OR subject_id = '".$sub[6]."' OR subject_id = '".$sub[7]."' OR subject_id = '".$sub[8]."'
                                    OR subject_id = '".$sub[9]."' OR subject_id = '".$sub[10]."' OR subject_id = '".$sub[11]."' OR subject_id = '".$sub[12]."' OR subject_id = '".$sub[13]."' OR subject_id = '".$sub[14]."' OR subject_id = '".$sub[15]."'";
                                    $r_ss = mysqli_query($con, $ss);
                                    while($row_ss = mysqli_fetch_array($r_ss)){?>
                                    <a href="subject_id.php?subject_id=<?php echo $row_ss['subject_id']; ?>"><?php echo $row_ss['subject_name']; ?></a><br>
                                <?php
                                }
                                ?>
                            </td>
                            
                            <td><a href="edit_teachers.php?id=<?php echo $rowreport['teacher_id ']; ?>"><img src="upload/edit.png" width="20px" alt=""></a></td>
                            <td><a href="delete_teachers.php?id=<?php echo $rowreport['teacher_id ']; ?>"><img src="upload/delete.jpg" width="20px" alt=""></a></td>
                            </tr>
                        
                            <?php
                            $sno++;
                            }
                            ?>
                            
                    </table>
        <?php
        }
        ?>
                
        
</body>
</html>