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
                  //  include('left_nav_bar.php');
                    $subject = $_REQUEST['subject_id'];
                    $grade_id = $_REQUEST['grade_id'];
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
                    //echo $subject;

                    $sub = "SELECT * FROM subjects where subject_id = '$subject'";
                    $r_sub = mysqli_query($con, $sub);
                    $row_sub = mysqli_fetch_assoc($r_sub);
                    //echo $row_sub['subject_name'];

                ?>
                
                        <div style="float:left; margin: 20px; width: 250px; border-radius: 3px; border-style: solid; border-color: lightgray; border-width:thin; padding: 20px; background-color:white; margin-top:40px">
                        <h4><i class="fa fa-angle-right"></i> Subject Management </h4>
                        <?php
                            if(isset($_POST['new']) && $_POST['new']){
                                $subject_name = $_REQUEST['subject_name'];

                                $update = "UPDATE subjects SET subject_name = '$subject_name' where subject_id = '$subject'";
                                $result = mysqli_query($con, $update);
                                
                                header('location:subjects.php');
                            }else{?>
                            <form action="edit_subject.php" method="post">

                                <input type="hidden" name="new" value="1">
                                <input type="hidden" name="subject_id" value="<?php echo $subject; ?>">
                                <input type="text" name="subject_name" value="<?php echo $row_sub['subject_name']; ?>"><br>
                                <button>Update</button>
                        <?php
                        }
                        ?>  
                        
                    </div>
                </form>
            

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
