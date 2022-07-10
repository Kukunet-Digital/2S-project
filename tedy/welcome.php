<?php
session_start();
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
	
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome </title>
    
    <style>
        table{
            border-collapse:collapse;
        }
        th{
            padding-right: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php
        include('top_nav_bar.php');
    ?>
    <div class="container">
        <header class="jumbotron hero-spacer">
            <?php
                include('dbconnection.php');
                $confirm = "SELECT * FROM users where email = '".$_SESSION['login']."'";
                $result = mysqli_query($con, $confirm);
                $row = mysqli_fetch_assoc($result);

                $access = $row['approval'];
                $role = $row['role_id'];
                $full_registration = $row['full_registration'];

                if($access == 0){?>
                <h2>A Warm Welcome!</h2>
                    <p>You have made initial registration on the system. To furhter continue to use it in full scale please wait until you get initial approval by the system admin 
                        
                    </p>
                    <p><a  href="logout.php" class="btn btn-primary btn-large">Logout </a></p>
                <?php
                }elseif($access == 1 && $role == 0){?>

                <h2>A Warm Welcome!</h2>
                    <p>You have got approval to use the system, but the decision on your role in the school is still suspended. Please wait!</p>
                    <p><a  href="logout.php" class="btn btn-primary btn-large">Logout </a></p>
            <?php    
            }elseif($access == 1 && $role !== 0 && $full_registration == 0){?>
                <h3>A Warm Welcome!</h3>
                    <p><font size="3">You should provide all informaton required by the school to get access to the whole system based on your role.</font></p>
                    <?php
                        $mrole = $row['role_id'];
                        if($mrole == 1 || $mrole == 2 || $mrole ==5){?>
                           <a href="staff_registration.php"><font size="5">Please click here to get registeed</font></a>
                        <?php
                        }elseif($mrole == 3){?>
                           <a href="student_registration.php"><font size="5">Please click here to get registeed</font></a>
                        <?php
                        }elseif($mrole == 4){?>
                           <a href="parent_registration.php"><font size="5">Please click here to get registeed</font></a>
                        <?php
                        }elseif($mrole == 6){
                            include('owner_registration.php');
                        }else{
                            echo 'no active action';
                        }
                    ?>
            <?php
                }elseif($access == 1 && $role !== 0 && $full_registration == 1){?>
                    <h3>Welcome!</h3>
                        <p><font size="3"> You are successfully registred and have the access to all working modalities as </font><?php
                            $myrole = $row['role_id']; 
                            $mr = "SELECT * FROM role where role_id = '$myrole'";
                            $r_mr = mysqli_query($con, $mr);
                            $row_mr = mysqli_fetch_assoc($r_mr);

                            echo '<font color="#D98880" size="3" style="text-transform:uppercase">';
                            echo  $row_mr['role'];
                            echo '</font>';
                            //role == 1; Director
                            //role == 2; Teacher
                            //role == 3; Student
                            //role == 4; Parent
                            //role == 5; Other staff
                            //role == 6; Owner
                            //role == 7; Guest
                        if($myrole == 1){?>
                            <br>
                            <?php
                                $director = "SELECT * FROM staff_registration where username = '".$_SESSION['login']."'";
                                $rdirect = mysqli_query($con, $director);
                                $row_director = mysqli_fetch_assoc($rdirect);
                                $app = $row_director['staff_approval'];

                                if($app == 0){
                                    echo '<font color="green">';
                                    echo 'Please wait until your douments are checked and gets approved';
                                    echo '</font>';
                                }else{?>
                                    <table>
                                        <tr>
                                            <th>
                                            <div align="center" style="border-style:solid; border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/attendance.jpg" style="width: 30px; border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br> Attendance summaries</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/schedule.png" style="width: 30px; border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br> School Schedule</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/teacher.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br> Teachers</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/subject.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br> Subjects</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/best.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br> Outstanding teachers</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/news.jpg" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br> News</h5>
                                            </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/finance.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Finance activities</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/hrm.jpg" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>HR information</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/parents.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Parents</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/announcement.jpg" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Announcements</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/exam.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Exams</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/result.jpg" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Students results</h5>
                                            </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                    <h5><img src="images/feedback.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Feedbacks</h5>
                                                </div>
                                            </th>
                                            <th>
                                                <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                    <h5><img src="images/almuni.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Almuni</h5>
                                                </div>
                                            </th>
                                            <th>
                                                <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                    <h5><img src="images/report.jpg" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Reports</h5>
                                                </div>
                                            </th>
                                            <th>
                                                <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                    <h5><img src="images/library.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Library</h5>
                                                </div>
                                            </th>
                                            <th>
                                                <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                    <h5><img src="images/sms.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Short Messages</h5>
                                                </div>
                                            </th>
                                            <th>
                                                <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                    <h5><img src="images/performance.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Performance Evaluation</h5>
                                                </div>
                                            </th>
                                        </tr>
                                </table>
                        <?php
                                }
                        }elseif($myrole == 2){?>
                        <br>
                            <?php
                                $tech = "SELECT * FROM staff_registration where username = '".$_SESSION['login']."'";
                                $rtech = mysqli_query($con, $tech);
                                $row_tech = mysqli_fetch_assoc($rtech);
                                $app = $row_tech['staff_approval'];

                                if($app == 0){
                                    echo '<font color="green">';
                                    echo 'Please wait until your douments are checked and gets approved';
                                    echo '</font>';
                                }else{?>
                                <div style="float:right">
                                    <?php
                                        $rolecheck = "SELECT * FROM users where email = '".$_SESSION['login']."'";
                                        $rrolecheck = mysqli_query($con, $rolecheck);
                                        $row_rolecheck = mysqli_fetch_assoc($rrolecheck);
                                            $request1 = $row_rolecheck['role_request'];
                                            $request2 = $row_rolecheck['role_request2'];
                                            $request3 = $row_rolecheck['role_request3'];
                                            $request4 = $row_rolecheck['role_request4'];

                                            $approve1 = $row_rolecheck['role_id'];
                                            $approve2 = $row_rolecheck['role_id2'];
                                            $approve3 = $row_rolecheck['role_id3'];
                                            $approve4 = $row_rolecheck['role_id4'];

                                        

                                if(!($request2) == 0 && $approve2 == 1){
                                    if($request2 == 1){?>
                                        <a href="user_page.php?role_id=1">Your director role</a>
                                    <?php
                                    }elseif($request2 == 2){?>
                                        <a href="user_page.php?role_id=2">Your teacher role</a>
                                    <?php
                                    }elseif($request2 == 3){?>
                                        <a href="user_page.php?role_id=3">Your student role</a>
                                    <?php
                                    }elseif($request2 == 4){?>
                                        <a href="user_page.php?role_id=4">Your parent role</a>
                                    <?php
                                    }elseif($request2 == 5){?>
                                        <a href="user_page.php?role_id=5">Your other staff role</a>
                                    <?php
                                    }
                                    
                                    echo '<br>';
                                }elseif(!($request2) == 0 && $approve2 == 0){
                                    echo 'Wait until approved';
                                    echo '<br>';
                                   }elseif($request2 == 0 && $approve2 == 0){?>
                                    <a href="additional_role.php?role_id=4">+Add Parent Role</a><br>
                                    <a href="additional_role.php?role_id=1">+Add Director Role</a><br>
                                    <a href="additional_role.php?role_id=5">+Add Other Staff Role</a><br>
                                <?php
                                   }
                                   
                                   if(!($request3) == 0 && $approve3 == 1){
                                    if($request3 == 1){?>
                                        <a href="user_page.php?role_id=1">Your director role</a><br>
                                    <?php
                                    }elseif($request3 == 2){?>
                                        <a href="user_page.php?role_id=2">Your teacher role</a><br>
                                    <?php
                                    }elseif($request3 == 3){?>
                                        <a href="user_page.php?role_id=3">Your student role</a><br>
                                    <?php
                                    }elseif($request3 == 4){?>
                                        <a href="user_page.php?role_id=4">Your parent role</a><br>
                                    <?php
                                    }elseif($request3 == 5){?>
                                        <a href="user_page.php?role_id=5">Your other staff role</a><br>
                                    <?php
                                    }
                                }elseif(!($request3) == 0 && $approve3 == 0){
                                    echo 'Wait until approved';
                                    echo '<br>';
                                }else{
                                    if($request2 == 4){?>
                                        <a href="additional_role.php?role_id=1">+Add Director Role</a><br>
                                        <a href="additional_role.php?role_id=5">+Add Other Staff Role</a><br>
                                    <?php
                                    }elseif($request2 == 1){?>
                                        <a href="additional_role.php?role_id=4">+Add Parent Role</a><br>
                                        <a href="additional_role.php?role_id=5">+Add Other Staff Role</a><br>
                                    <?php
                                    }elseif($request2 == 5){?>
                                        <a href="additional_role.php?role_id=4">+Add Parent Role</a><br>
                                        <a href="additional_role.php?role_id=1">+Add Director Role</a><br>
                                    <?php
                                    }
                                    ?>
                                <?php
                                   }

                                   if(!($request4) == 0 && $approve4 == 1){
                                    if($request4 == 1){?>
                                        <a href="user_page.php?role_id=1">Your director role</a><br>
                                    <?php
                                    }elseif($request4 == 2){?>
                                        <a href="user_page.php?role_id=2">Your teacher role</a><br>
                                    <?php
                                    }elseif($request4 == 3){?>
                                        <a href="user_page.php?role_id=3">Your student role</a><br>
                                    <?php
                                    }elseif($request4 == 4){?>
                                        <a href="user_page.php?role_id=4">Your parent role</a><br>
                                    <?php
                                    }elseif($request4 == 5){?>
                                        <a href="user_page.php?role_id=5">Your other staff role</a><br>
                                    <?php
                                    }
                                }elseif(!($request4) == 0 && $approve4 == 0){
                                    echo 'Wait until approved';
                                    echo '<br>';
                                }else{
                                    if($request2 == 1 && $request3 == 4){?>
                                        <a href="additional_role.php?role_id=5">+Add Other Staff Role</a><br>
                                    <?php
                                    }if($request2 == 1 && $request3 == 5){?>
                                    <a href="additional_role.php?role_id=4">+Add Parent Role</a><br>
                                <?php
                                    }if($request2 == 4 && $request3 == 5){?>
                                    <a href="additional_role.php?role_id=1">+Add Director Role</a><br>
                                    <?php
                                    }
                                    ?>
                                    
                                <?php
                                   }
                                   
                                   ?>

                         

                                    
                                </div>
                            <table>
                                <tr>
                                    <th>
                                        <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                            <h5><img src="images/class.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Your classes</h5>
                                        </div>
                                    </th>
                                    <th>
                                        <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                            <h5><img src="images/attendance.jpg" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Class attendance</h5>
                                        </div>
                                    </th>
                                    <th>
                                        <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                            <h5><img src="images/attendance.jpg" style="width: 30px;  border-style:solid; border-color:red; border-width:thick; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Your attendance</h5>
                                        </div>
                                    </th>
                                    <th>
                                        <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                            <h5><img src="images/assignment.jpg" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Assignments</h5>
                                        </div>
                                    </th>
                                    <th>
                                        <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                            <h5><img src="images/exam.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Exams</h5>
                                        </div>
                                    </th>
                                    <th>
                                        <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                            <h5><img src="images/communication.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Communication</h5>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                        <?php
                                }
                        }elseif($myrole == 3){?><br><br>
                            <?php
                                $stu = "SELECT * FROM student_registration where username = '".$_SESSION['login']."'";
                                $r_stu = mysqli_query($con, $stu);
                                $row_stu = mysqli_fetch_assoc($r_stu);
                                $app = $row_stu['st_approval'];

                                if($app == 0){
                                    echo '<font color="green">';
                                    echo 'Please wait until your douments are checked and gets approved';
                                    echo '</font>';
                                }else{?>
                            
                             <table>
                                <tr>
                                    <th>
                                       <a href="student_subjects.php">
                                        <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/subject.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Your subjects</h5>
                                            </div>
                                       </a> 
                                    </th>
                                    <th>
                                        <a href="student_attendance_report.php">
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/attendance.jpg" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Your attendance report</h5>
                                            </div>
                                        </a>
                                        
                                    </th>
                                    <th>
                                        <a href="student_communication.php">
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/communication.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Communication</h5>
                                            </div>
                                        </a>
                                        
                                    </th>
                                    <th>
                                        <a href="student_exam_result.php">
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/result.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Your exam results</h5>
                                            </div>
                                        </a>
                                        
                                    </th>
                                    <th>
                                        <a href="student_activities.php">
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/activities.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Your activities</h5>
                                            </div>
                                        </a>
                                        
                                    </th>
                                    <th>
                                        <a href="announcements.php">
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/announcement.jpg" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Announcement</h5>
                                            </div>
                                        </a>
                                        
                                    </th>
                                    <th>
                                        <a href="students_teachers_list.php">
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/teachers.jpg" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Your teachers</h5>
                                            </div>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="schedule.php">
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/calender.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>School schedule</h5>
                                            </div>
                                        </a>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                            <h5><img src="images/reference.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>References</h5>
                                        </div>
                                    </th>
                                    <th>
                                        <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                            <h5><img src="images/assignment.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Assignment</h5>
                                        </div>
                                    </th>
                                    <th>
                                        <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                            <h5><img src="images/exam_samples.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Exam samples</h5>
                                        </div>
                                    </th>
                                    <th>
                                        <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                            <h5><img src="images/qn_answer.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br>Q&A section</h5>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <?php
                            }
                        
                            ?>
                        <?php
                        }elseif($myrole == 4){?>
                            <div style="float:right">
                                <a href="parent_registration.php">+Add student</a>
                            </div>
                            <?php 
                                
                                $yn = "SELECT * FROM parent_registration pr inner join student_registration sr on sr.stu_id=pr.student_id where pr.username = '".$_SESSION['login']."' and pr.approval=1";
                                $ryn = mysqli_query($con, $yn);
                                while($row_yn = mysqli_fetch_array($ryn)){?>
                                    <a href="parent_student_page.php?student_id=<?php echo $row_yn['stu_id']; ?>"><?php echo $row_yn['first_name']; ?> <?php echo $row_yn['father_name']; ?></a><br>
                                   
                            <?php
                                } 
                            ?>
                            
                            <br><br>
                            <table>
                                        <tr>
                                            <th>
                                            <div align="center" style="border-style:solid; border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/attendance.jpg" style="width: 30px; border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br> Attendance summaries</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/schedule.png" style="width: 30px; border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br> School Schedule</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/teacher.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br> Teachers</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/subject.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br> Subjects</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/best.png" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br> Outstanding teachers</h5>
                                            </div>
                                            </th>
                                            <th>
                                            <div align="center" style="border-style:solid; border-color: #D7DBDD; border-width:thin; border-radius: 5px; padding: 10px; background-color: white; ">
                                                <h5><img src="images/news.jpg" style="width: 30px;  border-style:solid; border-color:lightgray; border-width:thin; margin-bottom: 10px; height: 30px; border-radius:50%" alt=""><br> News</h5>
                                            </div>
                                            </th>
                                        </tr>
                            </table>
                    <?php
                        }
                    }elseif($myrole == 5){?>
                        <div style="float:right">
                            <a href="parent_registration.php">+Add student</a>
                        </div>
                        <?php 
                            
                            $yn = "SELECT * FROM staff_registration where username = '".$_SESSION['login']."'";
                            $ryn = mysqli_query($con, $yn);
                            while($row_yn = mysqli_fetch_array($ryn)){?>
                                <a href="parent_student_page.php?student_id=<?php echo $row_yn['stu_id']; ?>"><?php echo $row_yn['first_name']; ?> <?php echo $row_yn['father_name']; ?></a><br>
                               
                        <?php
                            } 
                        }
                        
                }
                        ?>
        </header>

        <hr>


      


        </div>

        <hr>


    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
