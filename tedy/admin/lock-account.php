<?php
//session_start();
error_reporting(0);
include'controller/auth.php';
//Checking session is valid or not
if ($_SESSION['admin']=='') {
  header('location:logout.php');
  } else{

 // for  lock account php code  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Lock Account</title>
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
          	<h3><i class="fa fa-angle-right"></i> Lock Account </h3>
              <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> You can lock account here </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th>School name</th>
                                  <th class="hidden-phone">First Name</th>
                                  <th> Last Name</th>
                                  <th> Email Id</th>
                                  <th>Contact no.</th>
                                  <th>Reg. Date</th>
                                  <th>Picture</th>
                                  <th>LOCK/ UNLOCK</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from users");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                                  <td><?php echo $cnt;?></td>
                                  <td>
                                      <?php
                                          $sn = $row['school_id'];
                                          $ss = "SELECT * FROM school_basic_info where school_id='$sn'";
                                          $r_ss = mysqli_query($con, $ss);
                                          $row_ss = mysqli_fetch_assoc($r_ss);
                                          echo $row_ss['school_name'];
                                      ?>
                                  </td>
                                  <td><?php echo $row['fname'];?></td>
                                  <td><?php echo $row['lname'];?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['contactno'];?></td>  
                                  <td><?php echo $row['posting_date'];?></td>
                                  <!-- <td>
                                    <?php
                                       // $status = $row['approval'];
                                        //if($status == 0){
                                          //echo '<font color="red">';
                                          //echo 'Locked account';
                                          //echo '</font>';
                                        //}else{
                                          //echo '<font color="green">';
                                          //echo 'Approved account';
                                          //echo '</font>';
                                        //}
                                    ?>
                                  </td> -->
                                  <td>
                                    <?php
                                        $username = $row['email'];
                                        $staff_pic = "SELECT * FROM staff_registration where username = '$username'";
                                        $r_staff_pic = mysqli_query($con, $staff_pic);
                                        $row_staff_pic = mysqli_fetch_assoc($r_staff_pic);

                                        $student_pic = "SELECT * FROM student_registration where username = '$username'";
                                        $r_student_pic = mysqli_query($con, $student_pic);
                                        $row_student_pic = mysqli_fetch_assoc($r_student_pic);

                                        $parent_pic = "SELECT * FROM parent_registration where username = '$username'";
                                        $r_parent_pic = mysqli_query($con, $parent_pic);
                                        $row_parent_pic = mysqli_fetch_assoc($r_parent_pic);
                                    ?>
                                    <img src="../images/<?=$row_staff_pic['staff_picture']; ?>" style="width: 50px; border-radius: 50%" alt="">
                                    <img src="../images/<?=$row_student_pic['student_picture']; ?>" style="width: 50px; border-radius: 50%" alt="">
                                    <img src="../images/<?=$row_parent_pic['parent_picture']; ?>" style="width: 50px; border-radius: 50%" alt="">
                                  </td>
                                  <td>
                                     <?php
                                        if($row['approval']==0){?>
                                          <a href="unlock-account_conformation.php?uid=<?php echo $row['id'];?>"> 
                                          <button class="btn btn-primary btn-xs" style="width: 20px; background-color:red; border-color:red"><i class="fa fa-lock" style="color: white"></i></button> Unlock it</a>
                                        <?php
                                        }else{?>
                                          <a href="lock-account_conformation.php?uid=<?php echo $row['id'];?>"> 
                                          <button class="btn btn-primary btn-xs" style="background-color:green; border-color:green"><i class="fa fa-unlock" style="color: white"></i></button> Lock user</a>
                                      <?php
                                        }
                                     ?>
                                     
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
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
