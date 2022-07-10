<?php
   // $con = mysqli_connect('localhost', 'root', '', 'ss');
   include('controller/auth.php');
    $uid = $_REQUEST['uid'];

    $blocking = "SELECT * FROM users where id = '$uid'";
    $result = mysqli_query($con, $blocking);
    $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="lock_check.php" method="post">
        <?php
            if(isset($_POST['new']) && $_POST['new']){
                $approval = $_REQUEST['approval'];
                $uid = $_POST['id'];

                $update = "UPDATE users set approval='$approval' where id='$uid'";
                mysqli_query($con, $update);
                header('location:lock-account.php');

            }else{?>
                <input type="hidden" name="new" value="1">
                <input type="hidden" name="id" value="<?php echo $uid; ?>">
                <input type="hidden" name="approval" value="0">
                <button>Save change</button>
        <?php
        }

?>
    </form>
</body>
</html>