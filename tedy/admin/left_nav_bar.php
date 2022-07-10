<?php
    $adm = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
    $radm = mysqli_query($con, $adm);
    $rowadm = mysqli_fetch_assoc($radm);
    $admrole = $rowadm['admin_role'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<?php
    if($admrole == 1){?>
        <title>System Admin</title>
<?php
}elseif($admrole == 2){?>
    <title>Human Resouce</title>
<?php
}elseif($admrole == 3){?>
    <title>Finance Management</title>
<?php
}
?>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
              <?php
if($admrole == 1){?>
    <a href="#" class="logo"><b>Admin Dashboard</b></a>
<?php
}elseif($admrole == 2){?>
    <a href="#" class="logo"><b>HR Dashboard</b></a>
<?php
}elseif($admrole == 3){?>
    <a href="#" class="logo"><b>Finance Dashboard</b></a>
<?php
}
?>

            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>

<aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              <?php
                    
                    $me = "SELECT * FROM admin where username = '".$_SESSION['login']."'";
                    $rme = mysqli_query($con, $me);
                    $rowme = mysqli_fetch_assoc($rme);

                    $sn = $rowme['school_id'];
                    // echo $sn;
               
                    $school = "SELECT * FROM school_basic_info where school_id = '$sn'";
                    $r_school = mysqli_query($con, $school);
                    $row_school = mysqli_fetch_assoc($r_school);
                    $logo = $row_school['logo'];
                    // echo $logo;

                    $usr_type = "SELECT * FROM users where email='".$_SESSION['login']."'";
                    $r_ut = mysqli_query($con, $usr_type);
                    $row_ut = mysqli_fetch_assoc($r_ut);

                    $ut = $row_ut['role_id'];

                    if($ut == 1 || $ut == 2 || $ut == 5){
                        $me = "SELECT * FROM staff_registration where username='".$_SESSION['login']."'";
                        $rme = mysqli_query($con, $me);
                        $rowme = mysqli_fetch_assoc($rme);
                        $pic = $rowme['picture'];
                    ?>
                        <!-- <img src="upload/<?=$pic; ?>" width=150px style="border-radius: 50%" alt=""> -->
                    <?php
                    }elseif($ut == 3){
                        $me = "SELECT * FROM student_registration where username='".$_SESSION['login']."'";
                        $rme = mysqli_query($con, $me);
                        $rowme = mysqli_fetch_assoc($rme);
                        $pic = $rowme['picture'];
                    ?>
                        <!-- <img src="upload/<?=$pic; ?>" width=150px style="border-radius: 50%" alt=""> -->
                    <?php
                    }elseif($ut == 4){
                        $me = "SELECT * FROM parent_registration where username='".$_SESSION['login']."'";
                        $rme = mysqli_query($con, $me);
                        $rowme = mysqli_fetch_assoc($rme);
                        $pic = $rowme['picture'];
                    ?>
                        <!-- <img src="upload/<?=$pic; ?>" width=150px style="border-radius: 50%" alt=""> -->
                    <?php
                    }

                    
              ?>
              	  <p class="centered"><a href="#"><img src="upload/<?=$row_school['logo']; ?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	<?php
                        $ar = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
                        $rar = mysqli_query($con, $ar);
                        $rowar = mysqli_fetch_assoc($rar);
                        
                        $admin_role = $rowar['admin_role'];
                        if($admin_role == 1){
                            //System Admin
                            ?>
                                <li class="sub-menu">
                                    <a href="school_registration.php">
                                        <i class="fa fa-home"></i>
                                        <span>School registration</span>
                                    </a>
                                </li>
                                <li class="sub-menu">
                                    <a href="address_issue.php" >
                                        <i class="fa fa-map-marker"></i>
                                        <span>Address Issues</span>
                                    </a>
                                </li>
                                <li class="sub-menu">
                                    <a href="add-new-role.php" >
                                        <i class="fa fa-pencil-square-o"></i>
                                            <span>Add/ Modify Role</span>
                                    </a>
                                </li>
                                <li class="sub-menu">
                                    <a href="change-password.php">
                                    <i class="fa fa-file"></i>
                                    <span>Change Password</span>
                                    </a>
                                </li>
                                <li class="sub-menu">
                                <a href="manage-users.php" >
                                    <i class="fa fa-users"></i>
                                    <span>Manage Users</span>
                                </a>
                            </li>

                            </li>

                            <li class="sub-menu">
                                <a href="lock-account.php" >
                                    <i class="fa fa-unlock"></i>
                                    <i class="fa fa-lock"></i>
                                    <span><font color="yellow"> Lock/ Unlock Account</font></span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="user_status.php" >
                                    <i class="fa fa-user"></i>
                                    <span><font color="yellow"> User status</font></span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="subjects.php" >
                                    <i class="fa fa-book"></i>
                                    <span><font color="lightgreen"> Basic setup</font></span>
                                </a>
                            </li>
                            
                            </li>                                                       
                            <li class="sub-menu">
                                <a href="system-assesment.php" >
                                    <i class="fa fa-search"></i>
                                    <span>System Assesment</span>
                                </a>
                            
                            </li>

                            <li class="sub-menu">
                                <a href="system-feedback.php" >
                                    <i class="fa fa-comments-o"></i>
                                    <span>System Feedback</span>
                                </a>
                            </li>
                            
                    <?php
                    }elseif($admin_role ==2){
                        //Human resources
                        ?>
                            <li class="sub-menu">
                                <a href="user_status.php" >
                                    <i class="fa fa-user"></i>
                                    <span><font color="yellow"> User status</font></span>
                                </a>
                            </li>                                                   
                            <li class="sub-menu">
                            <a href="assign-role.php" >
                                <i class="fa fa-tasks"></i>
                                <span>Assign Role</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="parent_student_approval.php" >
                                <i class="fa fa-tasks"></i>
                                <span><font color="yellow"> Parent Approval</font></span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="student_approval.php" >
                                <i class="fa fa-tasks"></i>
                                <span><font color="yellow">Student Approval</font></span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="staff_approval.php" >
                                <i class="fa fa-tasks"></i>
                                <span><font color="yellow"> All Staff Approval</font></span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="teachers_setup.php" >
                                <i class="fa fa-pencil"></i>
                                <span><font color="pink"> Teachers setup</font></span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="annual_schedule.php" >
                                <i class="fa fa-calendar"></i>
                                <span><font color="pink"> Annual schedule</font></span>
                            </a>
                        </li>
                <?php
                    }elseif($admin_role == 3){
                        //Finance 
                        ?>
                    
                
                    <?php
                    }elseif($admin_role == 4){
                        
                        //Academic affair
                        ?>
                            <?php
                                $ay = "SELECT * FROM academic_year order by academic_year limit 1";
                                $ray = mysqli_query($con, $ay);
                                $rowray = mysqli_fetch_assoc($ray);
                                $year = $rowray['academic_year'];
                            ?>
                            <li class="sub-menu">
                                <a href="#academic_year.php" >
                                    <i class="fa fa-user"></i>
                                    <span><font color="yellow"> Academic Year | <?php echo '<font color="white">'; echo $year; echo '</font>'; ?></font></span>
                                </a>
                                
                            </li> 
                            <?php
                                $as = "SELECT * FROM academic_semester order by semister limit 1";
                                $ras = mysqli_query($con, $as);
                                $rowas = mysqli_fetch_assoc($ras);
                                $semister = $rowas['semister'];
                            ?>
                            <li class="sub-menu">
                                <a href="#semester.php" >
                                    <i class="fa fa-user"></i>
                                    <span><font color="yellow"> Semester | <?php echo $semister; ?></font></span>
                                </a>
                            </li> 
                            <li class="sub-menu">
                                <a href="class_grade_allocation.php" >
                                <!-- <a href="class_grade.php" > -->
                                    <i class="fa fa-user"></i>
                                    <span><font color="yellow"> Class & Grade arrangement</font></span>
                                </a>
                            </li> 
                            <li class="sub-menu">
                                <a href="teachers_allocation.php" >
                                    <i class="fa fa-user"></i>
                                    <span><font color="yellow"> Teachers Allocation</font></span>
                                </a>
                            </li> 
                            <li class="sub-menu">
                                <a href="students_allocation.php" >
                                    <i class="fa fa-user"></i>
                                    <span><font color="yellow"> Students Allocation</font></span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="students_allocation_summary.php" >
                                    <i class="fa fa-user"></i>
                                    <span><font color="yellow"> Students Alloc Summary</font></span>
                                </a>
                            </li> 
                            <li class="sub-menu">
                                <a href="grade_subject.php" >
                                    <i class="fa fa-user"></i>
                                    <span><font color="yellow"> Grade vs. Subject</font></span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="class_schedule.php" >
                                    <i class="fa fa-user"></i>
                                    <span><font color="yellow"> Class schedule</font></span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="exam_schedule.php" >
                                    <i class="fa fa-user"></i>
                                    <span><font color="yellow"> Exam Schedule</font></span>
                                </a>
                            </li>  
                            <li class="sub-menu">
                                <a href="teachers_assignment.php" >
                                    <i class="fa fa-user"></i>
                                    <span><font color="yellow"> Teachers Assignment</font></span>
                                </a>
                            </li> 
                    <?php
                    }elseif($admin_role == 5){
                            // Super Admin
                        ?>

                        <?php
                    }
                    ?>

                    
                  
                  

                
                
                 
              </ul>
          </div>
      </aside>