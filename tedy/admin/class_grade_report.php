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
            $row_me = mysqli_fetch_assoc($rme);

            $school_branch_id = $row_me['school_branch_id'];
            $school_id = $row_me['school_id'];

            
           // $assigned_class = "SELECT * FROM class_grade cg inner join school_buildings sb on sb.building_id = cg.building_id inner join school_class sc on sc.building_id = cg.building_id where cg.school_branch_id='$school_branch_id'  order by cg.grade_assigned";
            $assigned_class = "SELECT * FROM class_grade cg inner join school_buildings sb on sb.building_id = cg.building_id where cg.school_branch_id='$school_branch_id'  order by cg.grade_id, cg.class_id";
            $rassigned = mysqli_query($con, $assigned_class);
            while($row_assigned = mysqli_fetch_array($rassigned)){?>
            <div style="border-style: solid; border-width: thin; border-color: lightblue; border-radius: 3px; width: 200px; margin:3px; padding: 10px; float:left; background-color:lightblue">
               
            <?php
                $cc = "SELECT * FROM school_grade where grade_id = '".$row_assigned['grade_id']."'";
                $r_cc = mysqli_query($con, $cc);
                $row_cc = mysqli_fetch_assoc($r_cc);
            ?>
                <b> Grade: </b><?php echo $row_cc['grade_name']; ?><br>
               <b> Building:</b> <?php echo $row_assigned['building_name']; ?> | 
                <?php
                    $class = $row_assigned['class_id']; 
                    $cname = "SELECT * FROM school_class where class_id='$class'";
                    $rcname = mysqli_query($con, $cname);
                    $row_cname = mysqli_fetch_assoc($rcname);
                    echo $row_cname['class_name'];
                ?><br>
                
            </div>
                <?php
                    }
                ?>
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