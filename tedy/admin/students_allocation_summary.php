<?php
//session_start();
error_reporting(0);
include'controller/auth.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

 // for  System Assesment php code  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Addresses</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <style>
        table{
            border-collapse:collapse;
            width: 700px;
        }
        tr{
            border-bottom: 1px solid lightblue;
            margin-bottom: 8px;
        }
        td{
            padding: 8px;
        }

    </style>
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
     <?php
        include('left_nav_bar.php');
     ?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Students Allocation Page </h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">

                      
                           <form class="form-horizontal style-form" name="" method="post" action="students_allocation.php">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;"> 
                                <div style="float:left">
                                <div style="float:right">
                                    <a href="allocated_students.php">Click here to see STUDENTS</a><br><br><br>
                                    <?php
                                     $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
                                     $rme = mysqli_query($con, $me);
                                     $rowme = mysqli_fetch_assoc($rme);
             
                                     $school_id = $rowme['school_id'];
                                     $school_branch_id = $rowme['school_branch_id'];

                                        $rep = "SELECT * FROM  student_class_location where school_id='$school_id'";
                                        $rrep = mysqli_query($con, $rep);
                                        $crep = mysqli_num_rows($rrep);
                                        echo 'Total students allocated: ';
                                        echo $crep;
                                        echo '</br>';
                                    ?>
                                    
                                </div>
                                <table>
                                    <tr>
                                        <th style="padding-bottom:10px; padding-top:10px"><font size="2px">Sno</th>
                                        <th style="padding-bottom:10px; padding-top:10px"><font size="2px">Bname</th>
                                        <th style="padding-bottom:10px; padding-top:10px"><font size="2px">Class</th>
                                        <th style="padding-bottom:10px; padding-top:10px"><font size="2px">Capacity</th>
                                        <th style="padding-bottom:10px; padding-top:10px"><font size="2px">Allocated to grade</th>
                                        <th style="padding-bottom:10px; padding-top:10px"><font size="2px"># of students allocated</th>
                                    </tr>
                                    <?php
                                        $sno=1;
                                        $class = "SELECT * FROM school_class sc inner join school_buildings sb on sb.building_id = sc.building_id";
                                        $rs = mysqli_query($con, $class);
                                        while($rows = mysqli_fetch_array($rs)){?>
                                    <tr>
                                        <td style="text-align:left"><font size="2px"><?php echo $sno; ?></td>
                                        <td style="padding-right:10px"><font size="2px"><?php echo $rows['building_name'] ?></td>
                                        <td style="padding-right:10px"><font size="2px"><?php echo $rows['class_name'] ?></td>
                                        <td style="padding-right:10px"><font size="2px"><?php echo $rows['carying_capacity'] ?></td>
                                        <td>
                                            <?php
                                                $bld = $rows['building_name'];
                                                $clss = $rows['class_name'];

                                                $allocated = "SELECT * FROM student_class_location ";
                                                $rall = mysqli_query($con, $allocated);
                                                while($rowall = mysqli_fetch_array($con, $rall)){
                                                    echo $rowall['student_fullname'];
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <?php
                                    $sno++;
                                    }
                                    ?>

                                </table>
                                </div><br>
                                
                              
                              </label>
                              
                          </div>
                          
                             
                          </form>
                      </div>
                  </div>
              </div>
		</section>
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
