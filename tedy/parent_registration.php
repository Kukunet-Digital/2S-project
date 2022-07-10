
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
    <form action="parent_registration.php" method="post" enctype="multipart/form-data">
        

    <h3 style="margin-left: 100px"><font color="red">Parent registration form</font></h3>
<input type="hidden" name="full_registration" value="1">
<input type="hidden" name="username" value="<?php echo $_SESSION['login']; ?>">
<div style="float:left; margin-left: 40px">
<?php
    $checkRegistration = "SELECT * FROM parent_registration where username = '".$_SESSION['login']."'";
    $rchk = mysqli_query($con, $checkRegistration);
    $co = mysqli_num_rows($rchk);
    $rrr = mysqli_fetch_assoc($rchk);

    if($co === 0){?>
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
            <th style="text-align:right; padding-right: 10px">Your name</th>
            <td><input type="text" name="parent_name" value="<?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['fathername']; ?>"></td>
        </tr><br>
        
        <tr>
            <th style="text-align:right; padding-right: 10px">Yourname in Amharic</th>
            <td><input type="text" name="parent_fullname_am"></td>
        </tr>
        
        <tr>
            <th style="text-align:right; padding-right: 10px">Educational level</th>
            <td>
                <select name="educational_level" id="">
                    <option value="" disabled selected>Choose from the list below</option>
                    <option>Ph.D.</option>
                    <option>MSc/MA</option>
                    <option>BSc/BA</option>
                    <option>Diploma</option>
                    <option>Certificate</option>
                    <option>Level III</option>
                    <option>Level II</option>
                    <option>Level I</option>
                    <option>Highschool</option>
                    <option>Elementary</option>
                    <option>Non litrate</option>
                </select>
            </td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Region</th>
            <td><input type="text" name="region" value="Addis Ababa"></td>
        </tr>
    </table>
</div>
<div style="float:left; margin-left: 40px; margin-top: 50px">
    <table>
    
        
        <tr>
            <th style="text-align:right; padding-right: 10px">Sub city</th>
            <td>
                <select name="subcity" id="" readonly>
                    <option value="" disabled selected>Select your Subcity</option>
                    <?php
                        $subc = "SELECT * FROM subcities order by subcity";
                        $rsc = mysqli_query($con, $subc);
                        while($rosc = mysqli_fetch_array($rsc)){?>
                    <option value="<?php echo $rosc['subcity']; ?>"><?php echo $rosc['subcity']; ?></option>    
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Woreda</th>
            <td><input type="text" name="woreda"></td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Kebele</th>
            <td><input type="text" name="kebele"></td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">House no</th>
            <td><input type="text" name="house_no"></td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Phone</th>
            <td><input type="text" name="phone"></td>
        </tr>
        </div>
<div style="float:left; margin-left: 40px; margin-top: 50px">
    <table>
        <tr>
            <th style="text-align:right; padding-right: 10px">Attach your residetn ID</th>
            <td><input type="file" name="id_card"></td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Attach your picture</th>
            <td><input type="file" name="picture"></td>
        </tr>
        
            
    </table>
<div style="float:left; margin-left: 40px; margin-top: 50px">
    <tr>
        <th style="text-align:right; padding-right: 10px"></th>
        <td><button name="btn-parent-reg" style="border-radius:3px; border-style:solid; border-color:red; border-width:thin; background-color:red; color:white; padding: 10px; width: 100px; margin-top: 20px">Save</button></td>
    </tr>
</div>   
</div>

        
    </table>
<?php
    }else{
        header('location: parent_registration1.php');
    }
    ?>
    

    

    </form>
</body>
</html>
<?php
    
?>
