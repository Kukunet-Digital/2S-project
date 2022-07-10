<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Students</title>
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
        input[type="text"]{
            padding: 10px;
            width: 150px;
            border-radius: 3px;
            border-color: lightblue;
        }
    </style>
</head>
<body>
    <form action="students.php" method="post">
        <input type="text" name="search" placeholder="Student ID">
        <button style="border-style:solid; border-color:lightblue; color:white;background-color:lightblue; border-radius: 3px; padding: 10px; width: 100px; margin-top: 20px" name="btn-student-search">Search</button>
        <br>
        <?php
            if(isset($_POST['btn-student-search'])){
                $search = $_REQUEST['search'];
                if($search == ''){
                    echo '<font color="red">';
                    echo 'Please input the ID card';
                    echo '</font>';
                }else{ 

                $stname = "SELECT * FROM student_registration where student_id = '$search'";
                $result = mysqli_query($con, $stname);
                $count = mysqli_num_rows($result);

                if($count == 0){
                    echo '<font color="red">';
                    echo 'No matching record in the database';
                    echo '</font>';
                }else{ 
                $row = mysqli_fetch_assoc($result);

            }
        }
    }
        ?>
        <?php
            $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
            $rme = mysqli_query($con, $me);
            $rowme = mysqli_fetch_assoc($rme);

            $school_id = $rowme['school_id'];
            $school_branch_id = $rowme['school_branch_id'];
        ?>
        <input type="hidden" name="school_id" value="<?php echo $school_id; ?>">
        <input type="hidden" name="school_branch_id" value="<?php echo $school_branch_id; ?>">
    <table>
        <tr>
            <th style="text-align:right">Name</th>
            <td><input type="text" name="student_fullname" value="<?php echo $row['first_name']; ?> <?php echo $row['father_name']; ?> <?php echo $row['gf_name']; ?>" style="width: 300px"></td>
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
                <select name="grade" id="grade">
                    <!-- <option value="<?php//echo $row['grade']; ?>"><?php// echo $row['grade']; ?></option> -->
                    <option value=""disabled selected>Choose from the list</option>
                    <?php   
                        $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
                        $rme = mysqli_query($con, $me);
                        $rowme = mysqli_fetch_assoc($rme);

                        $school_id = $rowme['school_id'];
                       // echo $school_id;

                        $grade = "SELECT * FROM school_grade where school_id = '$school_id'";
                        $rgrade = mysqli_query($con, $grade);
                        while($rowgrade = mysqli_fetch_array($rgrade)){?>
                    <option value="<?php echo $rowgrade['grade_id']; ?>"><?php echo $rowgrade['grade_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
        <th style="text-align:right">Section</th>
            <td>
                <select name="building" id="bld">
                    <option value=""disabled selected>Select building #</option>
                </select>
            </td>
        </tr>
        <tr>        
            <th style="text-align:right">Registered by</th>
            <td><input type="hidden" name="assigned_by" value="<?php echo $rowme['username']; ?>"><?php echo $rowme['username']; ?></td>
        </tr>
        <tr>
            <th></th>
            <td><button style="border-style:solid; border-color:green; color:white;background-color:green; border-radius: 3px; padding: 10px; width: 100px; margin-top: 20px" name="btn-student-record">Record</button></td>
        </tr>
    </table>
    </form>

    <br><br>
   
        
</body>
</html>
<script>
    $(document).ready(function(){
        $('#grade').on('change', function(){
            var grade_id = this.value;
            $.ajax({
                url: "building.php",
                type:"POST",
                data: {
                    grade_id:grade_id
                },
                cache: false,
                success: function(result){
                    $("#bld").html(result);
                  //  $('#section-dropdown').html('<option value="">Select grade first</option>');
                }
            });
        });
    });
</script>