<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="school_branch_middle.php" post="post">
        <?php
            include('controller/auth.php');
            $school_name = $_REQUEST['school_name'];
          //  echo $school_name;
            echo '<br>';

            $sql = "SELECT * FROM school_basic_info where school_name = '$school_name'";
            $r_sql = mysqli_query($con, $sql);
            $row_sql = mysqli_fetch_assoc($r_sql);
            $id = $row_sql['school_id'];
          //  echo $id;
            echo '<br>';
        
            $count = $row_sql['noOfbranches'];
          //  echo $count;
            echo '<br>';
        
            $co = "SELECT * FROM school_branches where school_id = '$id'";
            $r_co = mysqli_query($con, $co);
            $count_co = mysqli_num_rows($r_co);
        
            
           // echo $count_co;
        
            if($count_co < $count){
                header('location: school_branch.php?school_name='.$school_name.'');
            }else{
                header('location: school_view.php?school_name='.$school_name.'');
            }
        ?>

    </form>
</body>
</html>