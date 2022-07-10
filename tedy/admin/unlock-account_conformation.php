<?php
//session_start();
error_reporting(0);
include'controller/auth.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
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
          	<h3><i class="fa fa-angle-right"></i> Lock the selected Account here</h3>
              <div class="col-md-12">
                      <div class="content-panel">
                        <div style="margin-left: 100px; marigin-top: 50px; padding: 40px">
                          <?php
                            $uid = $_REQUEST['uid'];
                            
                            $lock = "SELECT * FROM users where id = '$uid'";
                            $result = mysqli_query($con, $lock);
                            $row = mysqli_fetch_assoc($result);

                            $app = $row['approval'];

                                                        
                            ?>
                          <form action="lock-account_conformation.php" method="post">


                            <?php
                            if($row['approval'] !== 0){
                                
                                
                            if(isset($_POST['new']) && $_POST['new']){
                                $approval = $_REQUEST['approval'];
                                $uid = $_POST['id'];

                                                                
                                $update = "UPDATE users set approval = '$approval' where id='$uid'";
                                mysqli_query($con, $update);
                                echo '<font color="green" size="5px">';
                                echo 'Account unlocked';
                                echo '</font>';
                                ?><br><br>
                                    <a href="lock-account.php">Go back</a><br><br>
                                <?php
                                // header('location:lock-account.php');
                                header('location: lock_check.php');
                            
                            }else{?>
                            <input type="hidden" name="id" value="<?php echo $uid; ?>">
                            <input type="hidden" name="new" value="1">
                            <input type="hidden" name="approval" value= "1">
                            <button class="buttons" style="border-radius: 3px; border-color: green; border-width: thin; padding: 10px; background-color: lightgreen">Unlock <br> <?php echo $row['fname']; ?> <?php echo $row['lname']; ?></button>
                        
                        <?php
                            }
                            }else{
                                echo "The account is already locked!";
                            }
                          ?>
                          </div>
                          </form>
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
