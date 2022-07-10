
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
        <div style="border-radius: 5px; border-style:solid; border-width:thin; border-color:brown; background-color:brown; width: 150px; float:right; height: 250px; margin-right:20px">

        </div>
    <form action="student_registration.php" method="post" enctype="multipart/form-data">
        

    <h3 style="margin-left: 100px"><font color="brown">Students registration form</font></h3>
<input type="hidden" name="full_registration" value="1">
<input type="hidden" name="username" value="<?php echo $_SESSION['login']; ?>">
<div style="float:left; margin-left: 40px">
<table>
        <tr>
            <th style="text-align:right; padding-right: 10px">School name</th>
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
                <input type="hidden" name="school_id" value="<?php echo $_SESSION['school_id']; ?>">
            </td>
        </tr><br>
        <tr>
            <th style="text-align:right; padding-right: 10px">First name</th>
            <td><input type="text" name="first_name" value="<?php echo $_SESSION['fname']; ?>"></td>
        </tr><br>
        <tr>
            <th style="text-align:right; padding-right: 10px">Father name</th>
            <td><input type="text" name="father_name" value="<?php echo $_SESSION['fathername']; ?>"></td>
        </tr><br>
        <tr>
            <th style="text-align:right; padding-right: 10px">Grand father name</th>
            <td><input type="text" name="gf_name" value="<?php echo $_SESSION['lname']; ?>">
                <input type="hidden" name="father_fullname" value="<?php echo $_SESSION['fathername']; ?> <?php echo $_SESSION['lname']; ?>">
            </td>
        </tr><br>
        <!-- <tr>
            <th style="text-align:right; padding-right: 10px">Student Id</th>
            <td><input type="text" name="student_id"></td>
        </tr> -->
        <tr>
            <th style="text-align:right; padding-right: 10px">Your name in Amharic</th>
            <td><input type="text" name="stu_fullname_am"></td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Gender</th>
            <td>
                <select name="gender" id="">
                    <option>Female</option>
                    <option>Male</option>
                </select>
            </td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Birth date</th>
            <td><input type="date" name="birth_date"></td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Blood type</th>
            <td>
                <select name="blood_type" id="">
                    <option value="" disabled selected>Select your blood type</option>
                    <option>Blood group A+</option>
                    <option>Blood group A-</option>
                    <option>Blood group B+</option>
                    <option>Blood group B-</option>
                    <option>Blood group O+</option>
                    <option>Blood group O-</option>
                    <option>Blood group AB+</option>
                    <option>Blood group AB-</option>
                </select>
            </td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Health condition</th>
            <td>
                <select name="health_status" id="">
                    <option value="" disabled selected>Select from the list</option>
                    <option>Healthy</option>
                    <option>Occasionally sick</option>
                    <option>Frequently sick</option>
                    <option>Physically disabled</option>
                </select>
            </td>
        </tr>
        
        
    </table>
</div>
<div style="float:left; margin-left: 40px; margin-top: 50px">
    <table>
    <tr>
            <th style="text-align:right; padding-right: 10px">Mother name/ የአሳዳጊ ስም</th>
            <td>
                <input type="text" name="mother_name">
            </td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Mother/ የአሳዳጊ phone number</th>
            <td>
                <input type="text" name="mother_phone">
            </td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Father phone number</th>
            <td><input type="text" name="father_phone"></td>
        </tr>
        
        <tr>
            <th style="text-align:right; padding-right: 10px">Grade</th>
            <td>
                <input type="text" name="grade">
            </td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Region</th>
            <td><input type="text" name="region" value="Addis Ababa"></td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Sub city</th>
            <td>
                <select name="zone_subcity" id="" readonly>
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
            <th style="text-align:right; padding-right: 10px">Previous school name</th>
            <td><input type="text" name="school_from"></td>
        </tr>
        
        
    </table>
</div>
<div style="float:left; margin-left: 40px; margin-top: 50px">
    <table>
        <tr>
            <th style="text-align:right; padding-right: 10px">Attach your ID</th>
            <td><input type="file" name="your_id"></td>
        </tr>
        <tr>
            <th style="text-align:right; padding-right: 10px">Attach your picture</th>
            <td><input type="file" name="student_picture"></td>
        </tr>
        <tr>
                <th style="text-align:right; padding-right: 10px">Previous year result card</th>
                <td><input type="file" name="attach1"></td>
            </tr>
            <tr>
                <th style="text-align:right; padding-right: 10px">Clearance</th>
                <td><input type="file" name="attach2"></td>
            </tr>
            <tr>
                <th style="text-align:right; padding-right: 10px">Reciept</th>
                <td><input type="file" name="attach3"></td>
            </tr>
            <tr>
                <th style="text-align:right; padding-right: 10px"></th>
                <td><button name="btn-student-reg" style="border-radius:3px; border-style:solid; border-color:brown; border-width:thin; background-color:brown; color:white; padding: 10px; width: 100px; margin-top: 20px">Save</button></td>
            </tr>
    </table>
</div>
    
        
       
    

    </form>
</body>
</html>
<?php
    
?>
