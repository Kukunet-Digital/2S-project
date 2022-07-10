<?php
//session_start();
error_reporting(0);
include'controller/auth.php';
//Checking session is valid or not
if (strlen($_SESSION['admin']== '')) {
  header('location:logout.php');
  } else{

 // for  add new role php code  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Add New Role</title>
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
          	<h3><i class="fa fa-angle-right"></i> Add New Role </h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">

                      
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                       
                                    <?php
                                        $role = "SELECT * FROM role order by role";
                                        $result = mysqli_query($con, $role);
                                        $count = mysqli_num_rows($result);
                                        ?>
                                            <?php
                                        if($count == 0){?>
                                                    <p>First Name </p>
                                                    <input type="text" class="text" value=""  name="fname" required >
                                                    <p>Last Name </p>
                                                    <input type="text" class="text" value="" name="lname"  required >
                                                    <p>Email Address </p>
                                                    <input type="text" class="text" value="" name="email"  >
                                                    
                                                    <p>Password </p>
                                                    <input type="password" value="" name="password" required>
                                                            <p>Contact No. </p>
                                                    <input type="text" value="" name="contact"  required>
                                                    <div class="sign-up">
                                                        <input type="reset" value="Reset">
                                                        <input type="submit" name="signup"  value="Sign Up" >
                                                        <div class="clear"> </div>
                                                    </div>
                                                <?php
                                                }else{?>
                                                <table class="table table-striped table-advance table-hover" style="width: 100%">
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>Role</th>
                                                        <th>Description</th>
                                                        <th colspan="2" style="text-align:center">Actions</th>
                                                        <th><a href="add-new-role_check.php">+Add</a></th>
                                                    </tr>
                                                    <?php
                                                        $sno = 1;
                                                        while($row = mysqli_fetch_array($result)){?>
                                                    <tr>
                                                        <td><?php echo $sno; ?></td>
                                                        <td><?php echo $row['role']; ?></td>
                                                        <td><?php echo $row['description']; ?></td>
                                                        <td><a href="$.php?id=<?php echo $row['description']; ?>">Edit</a></td>
                                                        <td><a href="$.php?id=<?php echo $row['description']; ?>">Delete</a></td>
                                                        <td></td>
                                                    </tr>
                                                        
                                                    <?php
                                                    $sno++;
                                                    }
                                                ?>
                                        
                                        </table>
                                    <?php
                                    }
                                    ?>
                              
                            
                            
                               
								
						
                      
                          
                             
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
