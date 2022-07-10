<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class | Grade</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<?php
    include('controller/auth.php');
?>
<body>
    <form action="class_grade.php" method="post">
        <?php
            $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
            $rme = mysqli_query($con, $me);
            $rowme = mysqli_fetch_assoc($rme);

            $school_id = $rowme['school_id'];
            $school_branch_id = $rowme['school_branch_id'];
        ?>
    <table>
        <input type="hidden" name="school_id" value="<?php echo $school_id; ?>">
        <input type="hidden" name="school_branch_id" value="<?php echo $school_branch_id; ?>">
        
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
                <select name="grade_id" id="">
                    <?php   
                        $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
                        $rme = mysqli_query($con, $me);
                        $rowme = mysqli_fetch_assoc($rme);

                        $school_id = $rowme['school_id'];
                       // echo $school_id;

                        $grade = "SELECT * FROM school_grade where school_branch_id = '$school_branch_id'";
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
            <th style="text-align:right">Building no</th>
            <td>
                <select name="building_id" id="building" required>
                    <option value=""disabled selected>Select from the list</option>
                    <?php
                        $sno = 1;
                        $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
                        $rme = mysqli_query($con, $me);
                        $rowme = mysqli_fetch_assoc($rme);

                        $school_id = $rowme['school_id'];

                        $a = "SELECT * FROM school_buildings where school_branch_id = '$school_branch_id'";
                        $b = mysqli_query($con, $a);
                        while($c = mysqli_fetch_array($b)){?>
                    <option value="<?php echo $c['building_id']; ?>"><?php echo $c['building_name']; ?> </option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
        <th style="text-align:right">Section</th>
            <td>
                <select name="class_id" id="section" size="1">
                    <option value=""disabled selected>Select class</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <th style="text-align:right">Registered by</th>
            <td><input type="hidden" name="assigned_by" value="<?php echo $rowme['username']; ?>"><?php echo $rowme['username']; ?></td>
        </tr>
        <tr>
            <th></th>
            <td><button style="border-style:solid; border-color:green; color:white;background-color:green; border-radius: 3px; padding: 10px; width: 100px; margin-top: 20px" name="btn-class-grade">Record</button></td>
        </tr>
    </table>
    </form>

    <br><br>
  
        
</body>
</html>
<script>
        $(document).ready(function(){
            $('#building').on('change', function(){
                var building_id = this.value;
                $.ajax({
                    url: "class.php",
                    type: "POST",
                    data: {
                        building_id: building_id
                    },
                    cache: false,
                    success: function(result){
                        $("#section").html(result);
                       // $('#woreda-dropdown').html('<optionvalue="">Select zone first</option>');
                    }
                });
            });
        });

</script>