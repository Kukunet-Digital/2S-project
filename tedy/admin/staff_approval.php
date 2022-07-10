<?php
//session_start();
// error_reporting(0);
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

    <title>Admin | School Staff Main Approval</title>
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
          	<h3><i class="fa fa-angle-right"></i> Approve employee </h3>
				<table>
                    <tr>
                        <th>SNo</th>
                        <th>Full name</th>
                        <th>Gender</th>
                        <th>Role</th>
                        <th>Job Position</th>
                        <th>Job levl</th>
                        <th>Picture</th>
                        <th>Mobile#</th>
                        <th colspan="2">decision</th>
                    </tr>
                        <?php
                            $sno=1;
                            $info = "SELECT * FROM staff_registration order by first_name";
                            $r_info = mysqli_query($con, $info);
                            while($row_info = mysqli_fetch_array($r_info)){?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $row_info['first_name']; ?> <?php echo $row_info['father_name']; ?> <?php echo $row_info['gf_name']; ?></td>
                        <td><?php echo $row_info['gender']; ?></td>
                        <td>
                            <?php
                                $username = $row_info['username'];
                                $usr = "SELECT * FROM users where email='$username'";
                                $rusr = mysqli_query($con, $usr);
                                $rowusr = mysqli_fetch_assoc($rusr);

                                $role = $rowusr['role_id'];

                                $ra = "SELECT * FROM role where role_id = '$role'";
                                $rra = mysqli_query($con, $ra);
                                $rowra = mysqli_fetch_assoc($rra);

                                echo $rowra['role'];
                            ?>
                        </td>
                        <td><?php echo $row_info['job_position']; ?></td>
                        <td><?php echo $row_info['job_level']; ?></td>
                        <td><img src="../images/<?=$row_info['staff_picture']; ?>" width="50px" style="border-radius: 50%" alt=""></td>
                        <td><?php echo $row_info['phone']; ?></td>
                        <td>
                            <?php
                                if($row_info['staff_approval'] == 0){?>

                                <a href="staff_approve.php?staff_id=<?php echo $row_info['s_id']; ?>"><i class="fa fa-lock" style="color:red"> Approve</i></a>
                            <?php
                                }else{?>
                                    <i class="fa fa-unlock" style="color:green"> APPROVED</i>
                            <?php
                            }
                            ?>
                        </td>
                        <td>Delete</td>
                    </tr>

                        <?php
                        $sno++;
                        }
                        ?>
                </table>
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
