<?php
    include('controller/auth.php');

    $additional_role_id = $_REQUEST['role_id'];

    $me = $_SESSION['login'];

    $role_additional = "SELECT * FROM users where email='$me'";
    $rra = mysqli_query($con, $role_additional);
    $rowra = mysqli_fetch_assoc($rra);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Additional Role</title>
</head>
<body>
    <form action="additional_role.php" method="post">
        <?php
            $request_role2a = $rowra['role_request2'];
            $request_role3a = $rowra['role_request3'];
            $request_role4a = $rowra['role_request4'];
            
            if($request_role2a == 0){
                if(isset($_POST['new']) && $_POST['new']){
                    $request_role2 = $_POST['role_request2'];

                    $finish = "UPDATE users set role_request2 = '$request_role2' where email='$me'";
                    mysqli_query($con, $finish);
                    header('location: welcome.php');
                }else{?>
                    <input type="hidden" name="new" value="1" id="">
                    <input type="hidden" name="role_request2" value="<?php echo $additional_role_id; ?>">
                    <input type="hidden" name="email" value="<?php echo $me; ?>">    
                    <button>Make the request</button>

                <?php
                }

            }else{
                if($request_role3a == 0){
                    if(isset($_POST['new']) && $_POST['new']){
                        $request_role3 = $_POST['role_request3'];
    
                        $finish = "UPDATE users set role_request3 = '$request_role3' where email='$me'";
                        mysqli_query($con, $finish);
                        header('location: welcome.php');
                    }else{?>
                        <input type="hidden" name="new" value="1" id="">
                        <input type="hidden" name="role_request3" value="<?php echo $additional_role_id; ?>">
                        <input type="hidden" name="email" value="<?php echo $me; ?>">    
                        <button>Make the request</button>
    
                    <?php
                    }
                }else{
                    if($request_role4a == 0){
                        if(isset($_POST['new']) && $_POST['new']){
                            $request_role4 = $_POST['role_request4'];
        
                            $finish = "UPDATE users set role_request4 = '$request_role4' where email='$me'";
                            mysqli_query($con, $finish);
                            header('location: welcome.php');
                        }else{?>
                            <input type="hidden" name="new" value="1" id="">
                            <input type="hidden" name="role_request4" value="<?php echo $additional_role_id; ?>">
                            <input type="hidden" name="email" value="<?php echo $me; ?>">    
                            <button>Make the request</button>
        
                        <?php
                        }
                    }
                }
            }


            
        ?>
    </form>
</body>
</html>