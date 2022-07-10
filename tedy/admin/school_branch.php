<?php
    include('controller/auth.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | School Registration</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <style>
        table{
            border-collapse:collapse;
        }
        th{
            text-align:right;
            padding-right: 20px;
            padding-bottom: 4px;
            border-radius: 2px;
        }
        input[type="text"]{
            width: 600px;
            border-radius: 3px;
            border-color: green;
            margin: 3px;
            padding: 10px;
            border-width: thin;
        }
        input[type="file"]{
            width: 600px;
            border-radius: 3px;
            border-color: green;
            margin: 3px;
            padding: 10px;
            border-width: thin;
            border-style: solid
        }
        select{
            width: 600px;
            border-radius: 3px;
            border-color: green;
            margin: 3px;
            padding: 10px;
            border-width: thin;
            border-style: solid
        }
    </style>
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>School Registration</b></a>
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
          	<h3><i class="fa fa-angle-right"></i> Register the school detail </h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                           <!-- <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();"> -->
                           <form class="form-horizontal style-form" name="form1" method="post" action="school_branch.php" enctype="multipart/form-data">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <?php
                                $school_name = $_REQUEST['school_name'];
                                $sho = "SELECT * FROM school_basic_info where school_name = '$school_name'";
                                $r_sho = mysqli_query($con, $sho);
                                $row_scho = mysqli_fetch_assoc($r_sho);

                                ?>
                                    <h2></h2><br>
                                <table>
                                    <tr>
                                        <th>School name</th>
                                        <td><?php echo '<font color="red">'; echo $row_scho['school_name']; echo '</font>' ?>
                                        <input type="hidden" name="school_name" value="<?php echo $school_name; ?>">
                                        <input type="hidden" name="school_id" value="<?php echo $row_scho['school_id']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Branch name</th>
                                        <td><input type="text" name="branch_name"></td>
                                    </tr>
                                    <tr>
                                        <th>Level</th>
                                        <td>
                                            <select name="level" id="">
                                                <option value=""disabled selected>Choose from the list</option>
                                                <option>Day care</option>
                                                <option>Nursery</option>
                                                <option>kindergarten</option>
                                                <option>Elementary school</option>
                                                <option>Secondary school</option>
                                                <option>Advanced school</option>
                                                <option>Special school</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Grade from</th>
                                        <td><input type="text" name="gradeFrom" placeholder="eg. KG 1"></td>
                                    </tr>
                                    <tr>
                                        <th>Grade to</th>
                                        <td><input type="text" name="gradeTo" placeholder="eg. KG 3"></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><textarea name="address" id="" cols="90" rows="3" style="border-radius:3px"></textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><input type="text" name="email"></td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td><input type="text" name="phone"></td>
                                    </tr>
                                    <tr>
                                        <th>Student capacity</th>
                                        <td><input type="text" name="studentCapacity"></td>
                                    </tr>
                                    <tr>
                                        <th>Recorded by</th>
                                        <td><input type="text" name="recBy" value="<?php echo $_SESSION['login']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td><button name="btn-branch" class="btn" style="background-color: #E6B0AA; color:white">Save</button></td>
                                    </tr>
                                </table>
                                
                         
                          
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

