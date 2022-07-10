<?php
    include('controller/auth.php');
    $parent_id = $_REQUEST['parent_id'];

    $parent = "SELECT * FROM parent_registration where parent_id = '$parent_id'";
    $result = mysqli_query($con, $parent);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent_approval</title>
</head>
<body>
    <form action="parent_approved.php" method="post">
    <?php
        if(isset($_POST['new']) && $_POST['new']){
            $approval = $_REQUEST['approval'];

            $update = "UPDATE parent_registration SET approval = '$approval' where parent_id = '$parent_id'";
            mysqli_query($con, $update);
            header('location: parent_student_approval.php');
        }else{?>
            <div align="center" style="margin-left: 500px; margin-top: 150px; width: 400px; border-style:solid; border-width:thin; border-radius: 5px; border=color:lightgray; padding: 30px; height: 150px">
                <input type="hidden" name="new" value="1">
                <input type="hidden" name="parent_id" value="<?php echo $parent_id; ?>">
                <input type="hidden" name="approval" value="1">
                <font color="blue" size="5"> Are you sure ? </font><br>
                <button class="btn" style="padding: 10px; border-style:solid; border-width: thin; border-color:green; border-radius:5px; margin-top: 50px; margin-bottom:50px; width: 150px">Yes</button>
            </div>
    <?php
    }
    ?>
    </form>
</body>
</html>