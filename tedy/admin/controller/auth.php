<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_POST['login']))
{
  $adminusername=$_POST['username'];
  // $pass=md5($_POST['password']);
  $pass=$_POST['password'];
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="manage-users.php";
$_SESSION['admin']=$num['username'];
$_SESSION['id']=$num['id'];
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
$_SESSION['action1']="*Invalid username or password";
$extra="index.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}

if(isset($_POST['btn-school'])){
    $school_name = $_POST['school_name'];
    $noOfbranches = $_POST['noOfbranches'];
    $slogan = $_POST['slogan'];
    $website = $_POST['website'];
    $twitter = $_POST['twitter'];
    $telegram = $_POST['telegram'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $registeredBy = $_POST['registeredBy'];

    $filename = $_FILES['logo']['name'];
    $tmp_file = $_FILES['logo']['tmp_name'];
    $folder = 'upload/'.$filename;

    move_uploaded_file($tmp_file, $folder);

    $insert = "INSERT INTO school_basic_info (school_name, noOfbranches, slogan, website, twitter, telegram, facebook, instagram, registeredBy, logo) 
    VALUES ('$school_name', '$noOfbranches', '$slogan', '$website', '$twitter', '$telegram', '$facebook', '$instagram', '$registeredBy', '$filename')";

    $result = mysqli_query($con, $insert);

    if($result){
        header('location: school_branch.php?school_name='.$school_name.'');
    }
}

if(isset($_POST['btn-branch'])){
    $school_id = $_POST['school_id'];
    $school_name = $_POST['school_name'];
    $branch_name = $_POST['branch_name'];
    $level = $_POST['level'];
    $gradeFrom= $_POST['gradeFrom'];
    $gradeTo = $_POST['gradeTo'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $studentCapacity = $_POST['studentCapacity'];
    $recBy= $_POST['recBy'];

    
    $insert = "INSERT INTO school_branches (school_id, branch_name, level, gradeFrom, gradeTo, address, email, phone, studentCapacity, recBy) VALUES 
    ('$school_id', '$branch_name', '$level', '$gradeFrom', '$gradeTo', '$address', '$email', '$phone', '$studentCapacity', '$recBy')";

    $result = mysqli_query($con, $insert);
    header('location: school_branch_middle.php?school_name='.$school_name.'');

}

if(isset($_POST['btn-grade'])){
    $school_id = $_POST['school_id'];
    $school_branch_id = $_POST['school_branch_id'];
    $grade_name = $_POST['grade_name'];

    $insert = "INSERT INTO school_grade (school_id, school_branch_id, grade_name) VALUES ('$school_id', '$school_branch_id', '$grade_name')";
    $result = mysqli_query($con, $insert);
    header('location: subjects.php');
}

if(isset($_POST['btn-subject'])){
    $school_id = $_POST['school_id'];
    $school_branch_id = $_POST['school_branch_id'];
    $subject_name = $_POST['subject_name'];

    $sql = "SELECT * FROM subjects where school_branch_id='$school_branch_id' and subject_name='$subject_name'";
    $rsql = mysqli_query($con, $sql);
    $count = mysqli_num_rows($rsql);

    if(!($count) == 0){
    $errors['duplicate'] = "It is already registered!";
    }
    else{  

    $insert = "INSERT INTO subjects (school_id, school_branch_id, subject_name) VALUES ('$school_id', '$school_branch_id', '$subject_name')";
    $result = mysqli_query($con, $insert);
    header('location: subjects.php');
}
}

if(isset($_POST['btn-building'])){
    $school_id = $_POST['school_id'];
    $school_branch_id = $_POST['school_branch_id'];
    $building_name = $_POST['building_name'];
    $no_of_floors = $_POST['no_of_floors'];
    $no_of_rooms = $_POST['no_of_rooms'];

    $sql = "SELECT * FROM school_buildings where school_branch_id='$school_branch_id' and building_name='$building_name'";
    $rsql = mysqli_query($con, $sql);
    $count = mysqli_num_rows($rsql);

    if(!($count) == 0){
    $errors['duplicate'] = "It is already registered!"; 
    }else{ 

    $insert = "INSERT INTO school_buildings (school_id, school_branch_id, building_name, no_of_floors, no_of_rooms) VALUES ('$school_id', '$school_branch_id', '$building_name', '$no_of_floors', '$no_of_rooms')";
    $result = mysqli_query($con, $insert);
    header('location: subjects.php');
}
}

if(isset($_POST['btn-class'])){
    $school_id = $_POST['school_id'];
    $school_branch_id = $_POST['school_branch_id'];
    $building_id = $_POST['building_id'];
    $class_name = $_POST['class_name'];
    $carying_capacity = $_POST['carying_capacity'];
    

    $sql = "SELECT * FROM school_class where school_branch_id='$school_branch_id' and building_id = '$building_id' and class_name='$class_name'";
    $rsql = mysqli_query($con, $sql);
    $count = mysqli_num_rows($rsql);

    if(!($count) == 0){
    $errors['duplicate'] = "It is already registered!"; 
    }else{ 

    $insert = "INSERT INTO school_class (school_id, school_branch_id, building_id, class_name, carying_capacity) VALUES ('$school_id', '$school_branch_id', '$building_id', '$class_name', '$carying_capacity')";
    $result = mysqli_query($con, $insert);
    header('location: subjects.php');
}
}

if(isset($_POST['btn-regular_time'])){
    $schedule_category = $_POST['schedule_category'];

    $morningPeriodFrom = $_POST['morningPeriodFrom'];
    $morningPeriodTo = $_POST['morningPeriodTo'];

    $afternoonPeriodFrom = $_POST['afternoonPeriodFrom'];
    $afternoonPeriodTo = $_POST['afternoonPeriodTo'];

    $timePerClass = $_POST['timePerClass'];
    $morningBreakTimeFrom = $_POST['morningBreakTimeFrom'];
    $morningBreakTimeTo = $_POST['morningBreakTimeTo'];

    $afternoonBreakTimeFrom = $_POST['afternoonBreakTimeFrom'];
    $afternoonBreakTimeTo = $_POST['afternoonBreakTimeTo'];

    $insert = "INSERT INTO school_daily_time_basic (schedule_category, morningPeriodFrom, morningPeriodTo, afternoonPeriodFrom, afternoonPeriodTo, timePerClass, morningBreakTimeFrom, morningBreakTimeTo, afternoonBreakTimeFrom, afternoonBreakTimeTo) 
    VALUES ('$schedule_category', '$morningPeriodFrom', '$morningPeriodTo', '$afternoonPeriodFrom', '$afternoonPeriodTo', '$timePerClass', '$morningBreakTimeFrom', '$morningBreakTimeTo', '$afternoonBreakTimeFrom', '$afternoonBreakTimeTo')";

    mysqli_query($con, $insert);
    header('location: subjects.php');
}

if(isset($_POST['btn-teacher-record'])){
    $fullname = $_POST['fullname'];
    $academic_year = $_POST['academic_year'];
    $academic_semester = $_POST['academic_semester'];
    $grade = $_POST['grade'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $assigned_by = $_POST['assigned_by'];

    $sql = "SELECT * FROM teachers_registration where fullname='$fullname' and academic_year='$academic_year' and academic_semester = '$academic_semester' and grade = '$grade' and subject = '$subject'";
    $rseq = mysqli_query($con, $sql);
    $countsql = mysqli_num_rows($rseq);

    if(!($countsql) == 0){
        echo '<font color="red">';
        echo 'Already registered';
        echo '</font>';
    }else{

        $insert = "INSERT INTO teachers_registration (fullname, academic_year, academic_semester, grade, section, subject, assigned_by) 
        values ('$fullname', '$academic_year', '$academic_semester', '$grade', '$section', '$subject', '$assigned_by')";
        mysqli_query($con, $insert);
    }
}

if(isset($_POST['btn-student-record'])){
    $student_fullname = $_POST['student_fullname'];
    $academic_year = $_POST['academic_year'];
    $academic_semester = $_POST['academic_semester'];
    $grade = $_POST['grade'];
    $allocated_section = $_POST['allocated_section'];
    $assigned_by = $_POST['assigned_by'];
    $building = $_POST['building'];
    $school_id = $_POST['school_id'];
    $school_branch_id = $_POST['school_branch_id'];

    $sql = "SELECT * FROM student_class_location where student_fullname='$student_fullname' and academic_year='$academic_year' and academic_semester = '$academic_semester'";
    $rseq = mysqli_query($con, $sql);
    $countsql = mysqli_num_rows($rseq);

    if(!($countsql) == 0){
        echo '<font color="red">';
        echo 'Already registered';
        echo '</font>';
    }else{

        $insert = "INSERT INTO student_class_location (school_id, school_branch_id, student_fullname, academic_year, academic_semester, grade, building, allocated_section, assigned_by) 
        values ('$school_id', '$school_branch_id', '$student_fullname', '$academic_year', '$academic_semester', '$grade', '$building', '$allocated_section', '$assigned_by')";
        mysqli_query($con, $insert);
    }
}

if(isset($_POST['btn-class-grade'])){
    $school_id = $_POST['school_id'];
    $school_branch_id = $_POST['school_branch_id'];
    $academic_year = $_POST['academic_year'];
    $academic_semester = $_POST['academic_semester'];
    $building_id = $_POST['building_id'];
    $class_id = $_POST['class_id'];
    $grade_id = $_POST['grade_id'];
    $assigned_by = $_POST['assigned_by'];

    $sql = "SELECT * FROM class_grade where school_branch_id='$school_branch_id' and academic_year='$academic_year' and academic_semester='$academic_semester' and building_id='$building_id' and class_id='$class_id'";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);

    if(!($count) == 0){
        echo '<font color="red" size="3">';
        echo 'Already registered !';
        echo '</font>';
    }else{ 

    $insert = "INSERT INTO class_grade (school_id, school_branch_id, academic_year, academic_semester, building_id, class_id, grade_id, assigned_by) 
        VALUES ('$school_id', '$school_branch_id', '$academic_year', '$academic_semester', '$building_id', '$class_id', '$grade_id', '$assigned_by')";
    mysqli_query($con, $insert);
}
}

if(isset($_POST['btn-grade-subject'])){
    $grade_id = $_POST['grade_id'];
    $school_id = $_POST['school_id'];
    $school_branch_id = $_POST['school_branch_id'];
    $registered_by = $_POST['registered_by'];
   
    $checkbox1 = $_POST['subject_id'];
    $chk="";  
    foreach($checkbox1 as $chk1)  
       {  
          $chk.= $chk1.",";  
       }  

    $sql = "SELECT * FROM grade_subject where grade_id = '$grade_id' and school_id = '$school_id' and school_branch_id = '$school_branch_id'";
    $r_sql = mysqli_query($con, $sql);
    $count = mysqli_num_rows($r_sql);

    if(!($count) == 0){
        echo 'Duplicate record, rejected !';
    }else{ 

    $insert = "INSERT INTO grade_subject (grade_id, subject_id, school_id, school_branch_id, registered_by) values ('$grade_id', '$chk', '$school_id', '$school_branch_id', '$registered_by')";
    mysqli_query($con, $insert);

}
}
if(isset($_POST['btn-basic-time'])){
    $school_id = $_POST['school_id'];
    $school_branch_id = $_POST['school_branch_id'];
    $schedule_category = $_POST['schedule_category'];
    $date_when = $_POST['date_when'];
    $morningPeriodFrom = $_POST['morningPeriodFrom'];
    $morningPeriodTo = $_POST['morningPeriodTo'];
    $afternoonPeriodFrom = $_POST['afternoonPeriodFrom'];
    $afternoonPeriodTo = $_POST['afternoonPeriodTo'];
    $timePerClass = $_POST['timePerClass'];
    $morningBreakTimeFrom = $_POST['morningBreakTimeFrom'];
    
    $morningBreakTimeTo = $_POST['morningBreakTimeTo'];
    $afternoonBreakTimeFrom = $_POST['afternoonBreakTimeFrom'];
    $afternoonBreakTimeTo = $_POST['afternoonBreakTimeTo'];

    $insert = "INSERT INTO school_daily_time_basic (school_id, school_branch_id, schedule_category, date_when, morningPeriodFrom, morningPeriodTo, afternoonPeriodFrom, afternoonPeriodTo, timePerClass, morningBreakTimeFrom, morningBreakTimeTo, afternoonBreakTimeFrom, afternoonBreakTimeTo) 
    VALUES ('$school_id', '$school_branch_id', '$schedule_category', '$date_when', '$morningPeriodFrom', '$morningPeriodTo', '$afternoonPeriodFrom', '$afternoonPeriodTo', '$timePerClass', '$morningBreakTimeFrom', '$morningBreakTimeTo', '$afternoonBreakTimeFrom', '$afternoonBreakTimeTo')";
    mysqli_query($con, $insert);
}