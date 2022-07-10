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
            padding-right: 10px;
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
            <a href="#" class="logo"><b>School View</b></a>
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
          	<h3><i class="fa fa-angle-right"></i> <?php echo $_REQUEST['school_name']; ?> </h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                           <!-- <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();"> -->
                           <form class="form-horizontal style-form" name="form1" method="post" action="school_registration.php" enctype="multipart/form-data">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          
                           <?php
                                $school_name = $_REQUEST['school_name'];
                                $sho = "SELECT * FROM school_basic_info where school_name = '$school_name'";
                                $r_sho = mysqli_query($con, $sho);
                                $row_scho = mysqli_fetch_assoc($r_sho);
                                $id = $row_scho['school_id'];

                                ?>
                                <h3><?php // echo $school_name; ?></h3>
                                <table>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Branch name</th>
                                        <th>Branch level</th>
                                        <th colspan="2">Grade from__to__</th>
                                        <th>Branch address</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Stucent capacity</th>
                                    </tr>
                                        <?php
                                            $sno=1;
                                            $sql = "SELECT * FROM school_branches where school_id = '$id'";
                                            $r_sql = mysqli_query($con, $sql);
                                            while($row_sql = mysqli_fetch_array($r_sql)){?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <td><?php echo $row_sql['branch_name']; ?></td>
                                        <td><?php echo $row_sql['level']; ?></td>
                                        <td><?php echo $row_sql['gradeFrom']; ?></td>
                                        <td><?php echo $row_sql['gradeTo']; ?></td>
                                        <td><?php echo $row_sql['address']; ?></td>
                                        <td><?php echo $row_sql['email']; ?></td>
                                        <td><?php echo $row_sql['phone']; ?></td>
                                        <td><?php echo $row_sql['studentCapacity']; ?></td>
                                    </tr>
                                        <?php
                                        $sno++;
                                        }
                                        ?>
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

