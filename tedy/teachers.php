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
    <table>
        <tr>
            <th style="text-align:right">Name</th>
            <td>
                <select name="fullname" id="" required>
                    <option value=""disabled selected>Select from the list</option>
                    <?php
                        $sno = 1;
                        $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
                        $rme = mysqli_query($con, $me);
                        $rowme = mysqli_fetch_assoc($rme);

                        $school_id = $rowme['school_id'];

                        $a = "SELECT * FROM users where approval=1 and school_id='$school_id' and full_registration=1 and (role_id = 2 or role_id2 = 2 or role_id3 = 2 or role_id4 = 2)";
                        $b = mysqli_query($con, $a);
                        while($c = mysqli_fetch_array($b)){?>
                    <option value="<?php echo $c['fname']; ?> <?php echo $c['fathername']; ?> <?php echo $c['lname']; ?>"><?php echo $c['fname']; ?> <?php echo $c['fathername']; ?> <?php echo $c['lname']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th style="text-align:right">Academic Year</th>
            <td>
                <select name="academic_year" id="">
                    <?php
                        $ay = "SELECT * FROM academic_year order by academic_year desc";
                        $ray = mysqli_query($con, $ay);
                        while($roway = mysqli_fetch_array($ray)){?>
                    <option value="<?php echo $roway['academic_year']; ?>"><?php echo $roway['academic_year']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th style="text-align:right">Academic Semester</th>
            <td>
                <select name="academic_semester" id="">
                    <?php
                        $as = "SELECT * FROM academic_semester order by semister desc";
                        $ras = mysqli_query($con, $as);
                        while($rowas = mysqli_fetch_array($ras)){?>
                    <option value="<?php echo $rowas['semister']; ?>"><?php echo $rowas['semister']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
        <th style="text-align:right">Grade</th>
            <td>
                <select name="grade" id="">
                    <?php   
                        $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
                        $rme = mysqli_query($con, $me);
                        $rowme = mysqli_fetch_assoc($rme);

                        $school_id = $rowme['school_id'];
                       // echo $school_id;

                        $grade = "SELECT * FROM school_grade where school_id = '$school_id'";
                        $rgrade = mysqli_query($con, $grade);
                        while($rowgrade = mysqli_fetch_array($rgrade)){?>
                    <option value="<?php echo $rowgrade['grade_name']; ?>"><?php echo $rowgrade['grade_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
        <th style="text-align:right">Section</th>
            <td>
                <select name="section" id="">
                    <?php   
                        $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
                        $rme = mysqli_query($con, $me);
                        $rowme = mysqli_fetch_assoc($rme);

                        $school_id = $rowme['school_id'];
                        //echo $school_id;

                        $section = "SELECT * FROM school_sections where school_id = '$school_id' group by section_name";
                        $rsection = mysqli_query($con, $section);
                        while($rowsection = mysqli_fetch_array($rsection)){?>
                    <option value="<?php echo $rowsection['section_name']; ?>"><?php echo $rowsection['section_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
        <th style="text-align:right">Subject</th>
            <td>
                <select name="subject" id="">
                    <?php   
                        $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
                        $rme = mysqli_query($con, $me);
                        $rowme = mysqli_fetch_assoc($rme);

                        $school_id = $rowme['school_id'];
                        //echo $school_id;

                        $subject = "SELECT * FROM subjects where school_id = '$school_id' order by subject_name";
                        $rsubject = mysqli_query($con, $subject);
                        while($rowsubject = mysqli_fetch_array($rsubject)){?>
                    <option value="<?php echo $rowsubject['subject_name']; ?>"><?php echo $rowsubject['subject_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th style="text-align:right">Registered by</th>
            <td><input type="hidden" name="assigned_by" value="<?php echo $rowme['username']; ?>"><?php echo $rowme['username']; ?></td>
        </tr>
        <tr>
            <th></th>
            <td><button style="border-style:solid; border-color:green; color:white;background-color:green; border-radius: 3px; padding: 10px; width: 100px; margin-top: 20px" name="btn-teacher-record">Record</button></td>
        </tr>
    </table>
    </form>

    <br><br>
   
        
</body>
</html>