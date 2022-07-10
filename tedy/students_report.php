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
    <form action="students_report.php" method="post">
    
    <br><br>
    <?php
        $report = "SELECT * FROM student_class_location order by academic_year desc, academic_semester desc, grade asc, allocated_section asc";
        $rreport = mysqli_query($con, $report);
        $countreport = mysqli_num_rows($rreport);

        if($countreport == 0){
            echo 'No student is allocated !';
        }else{
            
            ?>
                <table>
                        <tr>
                            <th>SNo.</th>
                            <th>Student name</th>
                            <th>Academic year</th>
                            <th>Academic semester</th>
                            <th>Grade</th>
                            <th>Building</th>
                            <th>Section</th>
                            <th colspan='2' style="text-align:center">Actions</th>
                        </tr>
                        <tr>
                            <?php
                                $sno = 1;
                                while($rowreport = mysqli_fetch_array($rreport)){?>
                            <td>
                                <?php echo $sno; ?>
                            </td>
                            <td><?php echo $rowreport['student_fullname']; ?></td>
                            <td><?php echo $rowreport['academic_year']; ?></td>
                            <td><?php echo $rowreport['academic_semester']; ?></td>
                            <td><?php
                                    $gr = "SELECT * fROM school_grade where grade_id = '".$rowreport['grade']."'";
                                    $rgr = mysqli_query($con, $gr);
                                    $row_gr = mysqli_fetch_array($rgr);
                                echo $row_gr['grade_name']; ?>
                        
                            </td>
                            <td>
                                <?php
                                    $bld = "SELECT * FROM school_class where class_id = '".$rowreport['building']."'";
                                    $r_bld = mysqli_query($con, $bld);
                                    $row_bld = mysqli_fetch_array($r_bld);
                                    echo $row_bld['building_id']; 
                                
                                ?>
                            </td>
                            <td>
                                <?php
                                 $bld = "SELECT * FROM school_class where class_id = '".$rowreport['building']."'";
                                 $r_bld = mysqli_query($con, $bld);
                                 $row_bld = mysqli_fetch_array($r_bld);
                                    echo $row_bld['class_name']; 
                                 ?>
                            </td>
                            <td><?php echo $rowreport['subassigned_byject']; ?></td>
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