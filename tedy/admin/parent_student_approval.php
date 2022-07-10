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

    <title>Admin | parent Main Approval</title>
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
          	<h3><i class="fa fa-angle-right"></i> Approve parent </h3>
				<table>
                    <tr>
                        <th>SNo</th>
                        <th>Student name</th>
                        <th>Father name @StudentFile</th>
                        <th>Mother name@studentFile</th>
                        <th>Parent name@ParentFile</th>
                        <th>Picture</th>
                        <th colspan="2">decision</th>
                    </tr>
                        <?php
                            $sno=1;
                            $info = "SELECT * FROM parent_registration pr inner join student_registration sr on pr.student_id=sr.stu_id ";
                            $r_info = mysqli_query($con, $info);
                            while($row_info = mysqli_fetch_array($r_info)){?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $row_info['first_name']; ?> <?php echo $row_info['father_name']; ?></td>
                        <td><?php echo $row_info['father_name']; ?> <?php echo $row_info['gf_name']; ?></td>
                        <td><?php echo $row_info['mother_name']; ?></td>
                        <td
                            <?php
                                if($row_info['approval']==0){?>
                                style="background-color: lightred";
                            <?php
                            }elseif($row_info['approval'] == 1){?>
                                style="background-color: lightgreen";
                        <?php
                        }
                            ?>
                        >
                            <?php echo $row_info['parent_name']; ?>
                        </td>
                        <td>
                            <img src="../images/<?=$row_info['parent_picture']; ?>" style="width:50px; height:50px; border-radius:50%" alt="">
                        </td>
                        <td>
                            <?php
                                if($row_info['approval'] == 0){?>

                                <a href="parent_approve.php?parent_id=<?php echo $row_info['parent_id']; ?>"><i class="fa fa-lock" style="color:red"> Approve</i></a>
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
