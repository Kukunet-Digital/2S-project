<?php
//session_start();
error_reporting(0);
include'controller/auth.php';
//Checking session is valid or not
if ($_SESSION['admin']=='') {
  header('location:logout.php');
  } else{

 // for  add new role php code  

?>

      <?php
        include('left_nav_bar.php');
      ?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Assign Role </h3>
				<div class="row">
				
                  
	                  
                <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Here you can assign role to users </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th>School name</th>
                                  <th class="hidden-phone">Name</th>
                                  <th> Father Name</th>
                                  <th> GF Name</th>
                                  <th> Email Id</th>
                                  <th>Contact no.</th>
                                  <th>Picture</th>
                                  <th>Role requested</th>
                                  <th>Role</th>
                                  <th>Assign/ Change Role</th>
                              </tr>
                              </thead>
                            <?php
                                $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
                                $rme = mysqli_query($con, $me);
                                $rowme = mysqli_fetch_assoc($rme);
                                $myschool = $rowme['school_id'];
                            ?>
                            <tbody>

                            <?php
                                $ret = "SELECT * FROM users where school_id = '$myschool' and approval = 1";
                                $runlock = mysqli_query($con, $ret);
    							$cnt=1;

                                while($row = mysqli_fetch_array($runlock)){?>
                                    

                              <tr>
                              <td><?php echo $cnt;?></td>
                                <td>
                                    <?php
                                        $sn = $row['school_id'];

                                        $ss = "SELECT * FROM school_basic_info where school_id = '$sn'";
                                        $rss = mysqli_query($con, $ss);
                                        $rowss = mysqli_fetch_assoc($rss);
                                        echo $rowss['school_name'];
                                    ?>
                                </td>
                                  <td><?php echo $row['fname'];?></td>
                                  <td><?php echo $row['fathername'];?></td>
                                  <td><?php echo $row['lname'];?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['contactno'];?></td>
                                  <td>
                                    <?php
                                        $un = $row['email'];
                                        $pic_staff = "SELECT * FROM staff_registration where username = '$un'";
                                        $rpic_staff = mysqli_query($con, $pic_staff);
                                        $row_pic_staff = mysqli_fetch_array($rpic_staff);

                                        $pic_student = "SELECT * FROM student_registration where username = '$un'";
                                        $rpic_student = mysqli_query($con, $pic_student);
                                        $row_pic_student = mysqli_fetch_array($rpic_student);

                                        $pic_parent = "SELECT * FROM parent_registration where username = '$un'";
                                        $rpic_parent = mysqli_query($con, $pic_parent);
                                        $row_pic_parent = mysqli_fetch_array($rpic_parent);
                                    ?>
                                    <img src="../images/<?=$row_pic_staff['staff_picture']; ?>" style="width: 50px; border-radius:50%" alt="">
                                    <img src="../images/<?=$row_pic_student['student_picture']; ?>" style="width: 50px; border-radius:50%" alt="">
                                    <img src="../images/<?=$row_pic_parent['parent_picture']; ?>" style="width: 50px; border-radius:50%" alt="">
                                  </td> 
                                  <td>
                                    <?php
                                        $role_request = $row['role_request'];
                                        $rq = "SELECT * FROM role where role_id = '$role_request'";
                                        $r_rq = mysqli_query($con, $rq);
                                        $row_rq = mysqli_fetch_assoc($r_rq);
                                        echo $row_rq['role'];
                                    ?>
                                  </td> 
                                  <td 
                                    <?php
                                            $role = $row['role_id'];
                                            if($role == 0){?>
                                                style="background-color: lightgray";
                                            <?php                                                
                                            }else{
                                                $rr = "SELECT * FROM role where role_id = '$role'";
                                                $r_rr = mysqli_query($con, $rr);
                                                $row_rr = mysqli_fetch_assoc($r_rr);
                                                $ro = $row_rr['role'];

                                                if($ro == 'Director'){?>
                                                    style="background-color: lightgreen; color:green"
                                            <?php
                                                }elseif($ro == 'Teacher'){?>
                                                    style="background-color: lightblue; color:white"
                                            <?php    
                                            }elseif($ro == 'Parent'){?>
                                                    style="background-color: #FAD7A0; color:red"
                                        <?php
                                        }elseif($ro == 'Other staff'){?>
                                                style="background-color:lightgray"
                                    <?php
                                    }elseif($ro == 'Student'){?>
                                                style="background-color:lightpink";
                                    <?php
                                    }
                                            }
                                        ?>
                                  >
                                    <?php
                                        $role = $row['role_id'];
                                        if($role == 0){
                                            echo 'No role is assigned';
                                        }else{
                                            $rr = "SELECT * FROM role where role_id = '$role'";
                                            $r_rr = mysqli_query($con, $rr);
                                            $row_rr = mysqli_fetch_assoc($r_rr);
                                            echo $row_rr['role'];
                                        }
                                    ?>
                                </td>
                                  <td>
                                     <a href="update-assign_role.php?uid=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button> Assign/ Change role</a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                              <?php
                                }
                                
                                ?>
                          </table>
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
