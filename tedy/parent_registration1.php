<?php
     include('controller/auth.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type="text"]{
            padding: 5px;
            width: 150px;
            border-radius: 3px;
            margin-bottom: 3px;
            border-width:thin;
            border-color: lightblue;
        }
        input[type="date"]{
            padding: 5px;
            width: 150px;
            border-radius: 3px;
            margin-bottom: 3px;
            border-width:thin;
            border-top: 3px;
            border-color: lightblue;
        }
        input[type="file"]{
            padding: 5px;
            border-style:solid;
            border-width: thin;
            border-color: lightblue;
            width: 150px;
            border-radius: 3px;
            margin-bottom: 3px;
            border-width:thin;
        }
        select{
            padding: 5px;
            width: 150px;
            border-radius: 3px;
            margin-bottom: 3px;
            border-width:thin;
            border-color: lightblue;
        }
        table{
            border-collapse: collapse;
        }
        th{
            text-align:right;
            padding-right: 10px;
        }
        td{
            padding-left: 10px;
        }
    </style>
     
</head>
<body>
        <?php
            include('top_nav_bar.php');
        ?>
        <div style="border-radius: 5px; border-style:solid; border-width:thin; border-color:red; background-color:red; width: 150px; float:right; height: 250px; margin-right:20px">

        </div>
    <form action="parent_registration1.php" method="post" enctype="multipart/form-data">
        

    <h3 style="margin-left: 100px"><font color="red">Parent registration form</font></h3>
<input type="hidden" name="full_registration" value="1">
<input type="hidden" name="username" value="<?php echo $_SESSION['login']; ?>">
<?php
    $checkRegistration = "SELECT * FROM parent_registration where username = '".$_SESSION['login']."'";
    $rchk = mysqli_query($con, $checkRegistration);
    $co = mysqli_num_rows($rchk);
    $rrr = mysqli_fetch_assoc($rchk);
?>
<input type="hidden" name='id_card' value="<?php echo $rrr['id_card']; ?>">
<input type="hidden" name='parent_picture' value="<?php echo $rrr['parent_picture']; ?>">
<div style="float:left; margin-left: 40px">
<table>
        <tr>
            <th style="text-align:right; padding-right: 10px">School name <br></th>
            <td>
                <?php
                    $sch = "SELECT * FROM school_basic_info where school_id = '".$_SESSION['school_id']."'";
                    $r_sch = mysqli_query($con, $sch);
                    $row_sch = mysqli_fetch_assoc($r_sch);
                    echo '<font color="red">';
                    echo $row_sch['school_name'];
                    echo '</font>';
                    echo '<br>';
                ?>
                <input type="hidden" name="school_id" value="<?php echo $_SESSION['school_id']; ?>" readonly>
            </td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Student name</th>
            <td>
                <select name="student_id" id="" required>
                    <option value="" disabled selected>Select your child name</option>
                        <?php
                            $student = "SELECT * FROM student_registration order by first_name";
                            $r_stu = mysqli_query($con, $student);
                            while($row_stu = mysqli_fetch_array($r_stu)){?>
                    <option value="<?php echo $row_stu['stu_id']; ?>"><?php echo $row_stu['first_name']; ?> <?php echo $row_stu['father_name']; ?> <?php echo $row_stu['gf_name']; ?></option>
                        <?php
                        }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <!-- <th style="text-align:right; padding-right: 10px">Your name</th> -->
            <td><input type="hidden" name="parent_name" value="<?php echo $_SESSION['fathername']; ?> <?php echo $_SESSION['lname']; ?>" readonly></td>
        </tr><br>
        
        <tr>
            <!-- <th style="text-align:right; padding-right: 10px">Yourname in Amharic</th> -->
            <td><input type="hidden" name="parent_fullname_am" value="<?php echo $rrr['parent_fullname_am']; ?>" readonly></td>
        </tr>
        
        <tr>
            <!-- <th style="text-align:right; padding-right: 10px">Educational level</th> -->
            <td>
                <input type="hidden" name="educational_level" value="<?php echo $rrr['educational_level']; ?>" readonly>
            </td>
        </tr>
        <tr>
            <!-- <th style="text-align:right; padding-right: 10px">Region</th> -->
            <td><input type="hidden" name="region" value="<?php echo $rrr['region']; ?>" readonly></td>
        </tr>
    </table>
</div>
<div style="float:left; margin-left: 40px; margin-top: 50px">
    <table>
    
        
        <tr>
            <!-- <th style="text-align:right; padding-right: 10px">Sub city</th> -->
            <td>
                <input type="hidden" name="subcity" value="<?php echo $rrr['subcity']; ?>" readonly>
            </td>
        </tr>
        <tr>
            <!-- <th style="text-align:right; padding-right: 10px">Woreda</th> -->
            <td><input type="hidden" name="woreda" value="<?php echo $rrr['woreda']; ?>" readonly></td>
        </tr>
        <tr>
            <!-- <th style="text-align:right; padding-right: 10px">Kebele</th> -->
            <td><input type="hidden" name="kebele" value="<?php echo $rrr['kebele']; ?>" readonly></td>
        </tr>
        <tr>
            <!-- <th style="text-align:right; padding-right: 10px">House no</th> -->
            <td><input type="hidden" name="house_no" value="<?php echo $rrr['house_no']; ?>" readonly></td>
        </tr>
        <tr>
            <!-- <th style="text-align:right; padding-right: 10px">Phone</th> -->
            <td><input type="hidden" name="phone" value="<?php echo $rrr['phone']; ?>" readonly></td>
        </tr>
        </table>
                    </div>

                    <div style="float:left; margin-left: 40px; margin-top: 50px">
        <table>
            <tr>
                <th style="text-align:right; padding-right: 10px"></th>
                <td><button name="btn-parent-reg1" style="border-radius:3px; border-style:solid; border-color:red; border-width:thin; background-color:red; color:white; padding: 10px; width: 100px; margin-top: 20px">Save</button></td>
            </tr>
        </table>
    
</div>   
        
        
   
                    </div>
                    </form>
                    </body>
                    </html>