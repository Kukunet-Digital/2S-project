<?php
//session_start();
error_reporting(0);
include'controller/auth.php';
//Checking session is valid or not
if ($_SESSION['admin']=='') {
  header('location:logout.php');
  } else{

 ?>
</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Subject</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
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
            width: 100%
        }
        th{
            text-align:left;
            padding-right: ;
            padding-bottom: 5px;
            background-color:#F9E79F;
        }
        td{
            
            padding-right:10px;
            padding-bottom: 5px;
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
                <?php
                    $school = "SELECT * FROM admin a inner join school_basic_info sbi on a.school_id=sbi.school_id inner join school_branches sb on a.school_id=sb.school_id where username = '".$_SESSION['admin']."'";
                    $rschool = mysqli_query($con, $school);
                    $rowschool = mysqli_fetch_assoc($rschool);
                    echo '<div style="margin-left:500px"><font size="4">';
                    echo $rowschool['school_name'];
                    echo ' | ';
                    echo $rowschool['branch_name'];
                    echo '</div></font>';
                ?>
            <div style="float:left; margin: 20px; width: 250px; border-radius: 3px; border-style: solid; border-color: lightgray; border-width:thin; padding: 20px; background-color:white; margin-top:40px">
                <h4><i class="fa fa-angle-right"></i> Subject Management </h4>
                <table>
                    <tr>
                        <th style="padding:10px"><font size="2px">Sno</th>
                        <th style="padding:10px"><font size="2px">Subject</th>
                        <th style="padding:10px" colspan="2"><font size="2px"><a href="school_systems.php?system=1">+Add</a></th>
                    </tr>
                    <?php
                        $sno=1;
                        $subject = "SELECT * FROM subjects order by subject_name";
                        $rs = mysqli_query($con, $subject);
                        while($rows = mysqli_fetch_array($rs)){?>
                    <tr>
                        <td style="text-align:center"><font size="2px"><?php echo $sno; ?></font></td>
                        <td style="padding-right:10px"><font size="2px"><?php echo $rows['subject_name'] ?></td>
                        <td style="padding-right:10px"><font size="2px"><a href="edit_subject.php?subject_id=<?php echo $rows['subject_id']; ?>"><i class="fa fa-edit"></i></a></td>
                        <td style="padding-right:10px"><font size="2px"><a href="delete_subject.php?subject_id=<?php echo $rows['subject_id']; ?>"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    <?php
                    $sno++;
                    }
                    ?>

                </table>
                
            </div>

            <div style="float:left; margin: 20px; width: 250px; border-radius: 3px; border-style: solid; border-color: lightgray; border-width:thin; padding: 20px; background-color:white; margin-top:40px">
                <h4><i class="fa fa-angle-right"></i> School Grades </h4>
                <table>
                    <tr>
                        <th style="padding:10px"><font size="2px">Sno</th>
                        <th style="padding:10px"><font size="2px">Grades</th>
                        <th colspan="2"><font size="2px"><a href="school_systems.php?system=2">+Add</a></th>
                    </tr>
                    <?php
                        $sno=1;
                        $grade = "SELECT * FROM school_grade where school_branch_id='".$rowschool['school_branch_id']."'";
                        $rg = mysqli_query($con, $grade);
                        while($rowsg = mysqli_fetch_array($rg)){?>
                    <tr>
                        <td style="text-align:center"><font size="2px"><?php echo $sno; ?></td>
                        <td style="padding-right:10px"><font size="2px"><?php echo $rowsg['grade_name'] ?></td>
                        <td style="padding-right:10px"><font size="2px"><a href="edit_grade.php?grade_id=<?php echo $rowsg['grade_id']; ?>"><i class="fa fa-edit"></i></a></td>
                        <td style="padding-right:10px"><font size="2px"><a href="delete_grade.php?grade_id=<?php echo $rowsg['grade_id']; ?>"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    <?php
                    $sno++;
                    }
                    ?>

                </table>
                
            </div>
				
            <div style="float:left; margin: 20px; width: 300px; border-radius: 3px; border-style: solid; border-color: lightgray; border-width:thin; padding: 20px; background-color:white; margin-top:40px">
                <h4><i class="fa fa-angle-right"></i> Building and class </h4>
                <a href="school_systems.php?system=3"><font color="red">+Add building  |  <a href="edit_buildings.php">Edit</a></font></a>
                <table>
                    <tr>
                        <th style="padding-bottom:10px; padding-top:10px"><font size="2px">Sno</th>
                        <th style="padding-bottom:10px; padding-top:10px"><font size="2px">Bname</th>
                        <th style="padding-bottom:10px; padding-top:10px"><font size="2px">Class</th>
                        <th style="padding-bottom:10px; padding-top:10px"><font size="2px">Capacity</th>
                        <th colspan="2"><font size="2px"><a href="school_systems.php?system=4">+Add</a></th>
                    </tr>
                    <?php
                        $sno=1;
                        $class = "SELECT * FROM school_class sc inner join school_buildings sb on sb.building_id = sc.building_id order by sc.building_id, sc.class_name";
                        $rs = mysqli_query($con, $class);
                        while($rows = mysqli_fetch_array($rs)){?>
                    <tr>
                        <td style="text-align:center"><font size="2px"><?php echo $sno; ?></td>
                        <td style="padding-right:10px"><font size="2px"><?php echo $rows['building_name'] ?></td>
                        <td style="padding-right:10px"><font size="2px"><?php echo $rows['class_name'] ?></td>
                        <td style="padding-right:10px"><font size="2px"><?php echo $rows['carying_capacity'] ?></td>
                        <td style="padding-right:10px"><font size="2px"><a href="edit_subject.php?subject_id=<?php echo $rows['subject_id']; ?>"><i class="fa fa-edit"></i></a></td>
                        <td style="padding-right:10px"><font size="2px"><a href="delete_subject.php?subject_id=<?php echo $rows['subject_id']; ?>"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    <?php
                    $sno++;
                    }
                    ?>

                </table>
            </div>

            <div style="float:left; margin: 20px; width: 300px; border-radius: 3px; border-style: solid; border-color: lightgray; border-width:thin; padding: 20px; background-color:white; margin-top:40px">
                <h4><i class="fa fa-angle-right"></i> Daily Time Setup </h4>
                    <div style="float:right">
                        <a href="basic_time_setup.php"><img src="upload/add.jpg" width="40px" alt=""></a>
                    </div>
                <?php
                    $time = "SELECT * FROM school_daily_time_basic";
                    $rTime = mysqli_query($con, $time);
                    $countTime = mysqli_num_rows($rTime);
                   // echo $countTime;

                    if($countTime == 0){
                        echo '<br><br>';
                        echo '<font color="red">';
                        echo 'No time setup infomration';
                        echo '</font>';
                    ?><br>
                    <a href="day_time_setup.php" style="margin-left: 20px">+Add</a>
                    <?php
                    }else{
                        while($rowTime = mysqli_fetch_array($rTime)){ 

                        if($rowTime['schedule_category'] = 'regular'){
                            echo '<font size="4" color="blue">';
                            echo 'Regular period';
                            echo '</font>';
                            echo '<br>';

                            echo '<font color="red">';
                            echo 'Time per class: ';
                            echo $rowTime['timePerClass'];
                            echo ' min';
                            echo '</font>';
                            echo '<br>';

                            echo 'Morning period:  ';
                            echo '<font color="red">';
                            echo $rowTime['morningPeriodFrom'];
                            echo '</font>';
                            echo ' ~ ';
                            echo '<font color="red">';
                            echo $rowTime['morningPeriodTo'];
                            echo '</font>';
                            echo '<br>';
                            echo 'Morning break time: ';
                            echo '<font color="red">';
                            echo $rowTime['morningBreakTimeFrom'];
                            echo ' ~ ';
                            echo $rowTime['morningBreakTimeTo'];
                            echo '</font>';
                            echo '<br><br>';
                            

                            echo 'Afternoon period: ';
                            echo '<font color="red">';
                            echo $rowTime['afternoonPeriodFrom'];
                            echo ' ~ ';
                            echo $rowTime['afternoonPeriodTo'];
                            echo '</font>';
                            echo '<br>';
                            echo 'Afternoon break time: ';
                            echo '<font color="red">';
                            echo $rowTime['afternoonBreakTimeFrom'];
                            echo ' ~ ';
                            echo $rowTime['afternoonBreakTimeTo'];
                            echo '</font>';
                        ?><br><br>
                            <a href="edit_time_daily.php?id=<?php echo $rowTime['dailyTime_id ']; ?>">Click here to Modify</a><br><br>
                        <?php
                        }else{
                            echo '<font size="4" color="blue">';
                            echo 'Special Evant Days';
                            echo '</font>';
                        }
                        
                    }
                }
                ?>
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
