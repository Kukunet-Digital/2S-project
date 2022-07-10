<?php
    include('dbconnection.php');

    session_start();

    //Code for Registration 
if(isset($_POST['signup']))
{
	$school_id = $_POST['school_id'];
    $school_branch_id  = $_POST['school_branch_id'];
    $role_request = $_POST['role_request'];
    $fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$fathername=$_POST['fathername'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$enc_password=$password;
$sql=mysqli_query($con,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
	echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else{
	$msg=mysqli_query($con,"insert into users(school_id, school_branch_id, role_request, fname,fathername, lname,email,password,contactno) values('$school_id', '$school_branch_id ', '$role_request', '$fname', '$fathername', '$lname','$email','$enc_password','$contact')");

if($msg)
{
	echo "<script>alert('Register successfully');</script>";
}
}
}

// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$useremail=$_POST['uemail'];

$ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="welcome.php";
$_SESSION['login']=$_POST['uemail'];
$_SESSION['school_id'] = $num['school_id'];
$_SESSION['id']=$num['id'];
$_SESSION['fname']=$num['fname'];
$_SESSION['fathername']=$num['fathername'];
$_SESSION['lname']=$num['lname'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
//header("location:http://$host$uri/$extra");
exit();
}
}

//Code for Forgot Password

if(isset($_POST['send']))
{
$femail=$_POST['femail'];

$row1=mysqli_query($con,"select email,password from users where email='$femail'");
$row2=mysqli_fetch_array($row1);
if($row2>0)
{
$email = $row2['email'];
$subject = "Information about your password";
$password=$row2['password'];
$message = "Your password is ".$password;
mail($email, $subject, $message, "From: $email");
echo  "<script>alert('Your Password has been sent Successfully');</script>";
}
else
{
echo "<script>alert('Email not register with us');</script>";	
}
}

if(isset($_POST['btn-staff-reg'])){
    $school_id = $_POST['school_id'];
    $staff_id = $_POST['staff_id'];
    $first_name = $_POST['first_name'];
    $father_name = $_POST['father_name'];
    $gf_name = $_POST['gf_name'];
    $stff_fullname_am = $_POST['stff_fullname_am'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $blood_type = $_POST['blood_type'];
    $health_status = $_POST['health_status'];
    $educational_level = $_POST['educational_level'];
    $job_position = $_POST['job_position'];
    $job_level = $_POST['job_level'];
    $employement_date = $_POST['employement_date'];
    $region = $_POST['region'];
    $zone_subcity = $_POST['zone_subcity'];
    $woreda = $_POST['woreda'];
    $kebele = $_POST['kebele'];
    $house_no = $_POST['house_no'];
    $phone = $_POST['phone'];
    $incaseOfemergency = $_POST['incaseOfemergency'];
    $emergency_phone = $_POST['emergency_phone'];
    $full_registration = $_POST['full_registration'];
    $username = $_POST['username'];
    $staff_role = $_POST['staff_role'];

    $filename = $_FILES['resident_id']['name'];
    $tmp_file = $_FILES['resident_id']['tmp_name'];
    $folder = 'images/'.$filename;
    move_uploaded_file($tmp_file, $folder);

    $filename1 = $_FILES['staff_picture']['name'];
    $tmp_file1 = $_FILES['staff_picture']['tmp_name'];
    $folder1 = 'images/'.$filename1;
    move_uploaded_file($tmp_file1, $folder1);

    $filename2 = $_FILES['attach1']['name'];
    $tmp_file2 = $_FILES['attach1']['tmp_name'];
    $folder2 = 'images/'.$filename2;
    move_uploaded_file($tmp_file2, $folder2);

    $filename3 = $_FILES['attach2']['name'];
    $tmp_file3 = $_FILES['attach2']['tmp_name'];
    $folder3 = 'images/'.$filename3;
    move_uploaded_file($tmp_file3, $folder3);

    $filename4 = $_FILES['attach3']['name'];
    $tmp_file4 = $_FILES['attach3']['tmp_name'];
    $folder4 = 'images/'.$filename4;
    move_uploaded_file($tmp_file4, $folder4);


    $sql = "INSERT INTO staff_registration (school_id, username, staff_id, first_name, father_name, gf_name, stff_fullname_am, gender, staff_role, birth_date, blood_type, health_status, educational_level, job_position, job_level, 
    employement_date, region, zone_subcity, woreda, kebele, house_no, phone, incaseOfemergency, emergency_phone, resident_id, staff_picture, attach1, attach2, attach3) 
    
    VALUES ('$school_id', '$username', '$staff_id', '$first_name', '$father_name', '$gf_name', '$stff_fullname_am', '$gender', '$staff_role', '$birth_date', '$blood_type', '$health_status', '$educational_level', '$job_position', '$job_level',
    '$employement_date', '$region', '$zone_subcity', '$woreda', '$kebele', '$house_no', '$phone', '$incaseOfemergency', '$emergency_phone', '$filename', '$filename1', '$filename2', '$filename3', '$filename4')";

    mysqli_query($con, $sql);

    $sql1 = "UPDATE users SET full_registration = '$full_registration' where id = '".$_SESSION['id']."'";
    mysqli_query($con, $sql1);

    header('location: welcome.php');
}


if(isset($_POST['btn-student-reg'])){
    $school_id = $_POST['school_id'];
    // $student_id	 = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $father_name = $_POST['father_name'];
    $gf_name = $_POST['gf_name'];
    $username = $_POST['username'];

    $stu_fullname_am = $_POST['stu_fullname_am'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $blood_type = $_POST['blood_type'];
    $health_status = $_POST['health_status'];
    
    $mother_name = $_POST['mother_name'];
    $mother_phone = $_POST['mother_phone'];
    $father_phone = $_POST['father_phone'];
    $grade = $_POST['grade'];
    $section = $_POST['section'];

    $region = $_POST['region'];
    $zone_subcity = $_POST['zone_subcity'];
    $woreda = $_POST['woreda'];
    $kebele = $_POST['kebele'];
    $house_no = $_POST['house_no'];
    $school_from = $_POST['school_from'];
    
    $full_registration = $_POST['full_registration'];
    $father_fullname = $_POST['father_fullname'];

    $filename = $_FILES['your_id']['name'];
    $tmp_file = $_FILES['your_id']['tmp_name'];
    $folder = 'images/'.$filename;
    move_uploaded_file($tmp_file, $folder);

    $filename1 = $_FILES['student_picture']['name'];
    $tmp_file1 = $_FILES['student_picture']['tmp_name'];
    $folder1 = 'images/'.$filename1;
    move_uploaded_file($tmp_file1, $folder1);

    $filename2 = $_FILES['attach1']['name'];
    $tmp_file2 = $_FILES['attach1']['tmp_name'];
    $folder2 = 'images/'.$filename2;
    move_uploaded_file($tmp_file2, $folder2);

    $filename3 = $_FILES['attach2']['name'];
    $tmp_file3 = $_FILES['attach2']['tmp_name'];
    $folder3 = 'images/'.$filename3;
    move_uploaded_file($tmp_file3, $folder3);

    $filename4 = $_FILES['attach3']['name'];
    $tmp_file4 = $_FILES['attach3']['tmp_name'];
    $folder4 = 'images/'.$filename4;
    move_uploaded_file($tmp_file4, $folder4);


    $sql = "INSERT INTO student_registration (school_id, username, first_name, father_name, gf_name, stu_fullname_am, gender, birth_date, blood_type, health_status, mother_name, mother_phone, father_phone, 
    grade, section, region, zone_subcity, woreda, kebele, house_no, school_from, your_id, student_picture, attach1, attach2, attach3) 
    
    VALUES ('$school_id', '$username', '$first_name', '$father_name', '$gf_name', '$stu_fullname_am', '$gender', '$birth_date', '$blood_type', '$health_status', '$mother_name', '$mother_phone', '$father_phone',
    '$grade', '$section', '$region', '$zone_subcity', '$woreda', '$kebele', '$house_no', '$school_from', '$filename', '$filename1', '$filename2', '$filename3', '$filename4')";

    mysqli_query($con, $sql);


    $sql1 = "UPDATE users SET full_registration = '$full_registration' where id = '".$_SESSION['id']."'";
    mysqli_query($con, $sql1);

    header('location: welcome.php');
}

if(isset($_POST['btn-parent-reg'])){
    $school_id = $_POST['school_id'];
    $student_id	 = $_POST['student_id'];
    $parent_name = $_POST['parent_name'];
    $parent_fullname_am = $_POST['parent_fullname_am'];
    $educational_level = $_POST['educational_level'];
    $username = $_POST['username'];

    $region = $_POST['region'];
    $subcity = $_POST['subcity'];
    $woreda = $_POST['woreda'];
    $kebele = $_POST['kebele'];
    $house_no = $_POST['house_no'];
    $phone = $_POST['phone'];
    
    $full_registration = $_POST['full_registration'];

    $filename = $_FILES['parent_picture']['name'];
    $tmp_file = $_FILES['parent_picture']['tmp_name'];
    $folder = 'images/'.$filename;
    move_uploaded_file($tmp_file, $folder);

    $filename1 = $_FILES['id_card']['name'];
    $tmp_file1 = $_FILES['id_card']['tmp_name'];
    $folder1 = 'images/'.$filename1;
    move_uploaded_file($tmp_file1, $folder1);

    $chk = "SELECT * FROM parent_registration where username = '$username' and student_id ='$student_id'";
    $r_chk = mysqli_query($con, $chk);
    $count = mysqli_num_rows($r_chk);

    if(!($count) == 0){
        echo 'Already registered, please check your accout!';
    }else{ 


    $sql = "INSERT INTO parent_registration (school_id, username, student_id, parent_name, parent_fullname_am, educational_level, region, subcity, woreda, kebele, house_no, phone, parent_picture, id_card) 
    
    VALUES ('$school_id', '$username', '$student_id', '$parent_name', '$parent_fullname_am', '$educational_level', '$region', '$subcity', '$woreda', '$kebele', '$house_no', '$phone', '$filename', '$filename1')";

    mysqli_query($con, $sql);


    $sql1 = "UPDATE users SET full_registration = '$full_registration' where id = '".$_SESSION['id']."'";
    mysqli_query($con, $sql1);

    header('location: welcome.php');
    }
}

if(isset($_POST['btn-parent-reg1'])){
    $school_id = $_POST['school_id'];
    $student_id	 = $_POST['student_id'];
    $parent_name = $_POST['parent_name'];
    $parent_fullname_am = $_POST['parent_fullname_am'];
    $educational_level = $_POST['educational_level'];
    $username = $_POST['username'];

    $region = $_POST['region'];
    $subcity = $_POST['subcity'];
    $woreda = $_POST['woreda'];
    $kebele = $_POST['kebele'];
    $house_no = $_POST['house_no'];
    $phone = $_POST['phone'];
    
    $full_registration = $_POST['full_registration'];

    $picture = $_POST['parent_picture'];
    $id_card = $_POST['id_card'];

    $chk = "SELECT * FROM parent_registration where username = '$username' and student_id ='$student_id'";
    $r_chk = mysqli_query($con, $chk);
    $count = mysqli_num_rows($r_chk);

    if(!($count) == 0){
        echo '<div style="margin-left: 100px;"><font color="red">';
        echo 'Already registered, please check your accout!';
        echo '</div></font>';
        ?>
        
<a href="welcome.php" style="margin-left: 100px">Click here</a>
    <?php
    }else{ 


    $sql = "INSERT INTO parent_registration (school_id, username, student_id, parent_name, parent_fullname_am, educational_level, region, subcity, woreda, kebele, house_no, phone, parent_picture, id_card) 
    
    VALUES ('$school_id', '$username', '$student_id', '$parent_name', '$parent_fullname_am', '$educational_level', '$region', '$subcity', '$woreda', '$kebele', '$house_no', '$phone', '$picture', '$id_card')";

    mysqli_query($con, $sql);


    $sql1 = "UPDATE users SET full_registration = '$full_registration' where id = '".$_SESSION['id']."'";
    mysqli_query($con, $sql1);

    header('location: welcome.php');
    }
}

