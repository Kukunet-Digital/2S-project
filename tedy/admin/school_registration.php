<?php
    include('controller/auth.php');
    if(($_SESSION['admin']) == ''){
        header('location:logout.php');
    }
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
          	<h3><i class="fa fa-angle-right"></i> Register School </h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                           <!-- <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();"> -->
                           <form class="form-horizontal style-form" name="form1" method="post" action="school_registration.php" enctype="multipart/form-data">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          
                          <table>
                                <tr>
                                    <th>School name</th>
                                    <td><input type="text" name="school_name"></td>
                                </tr>
                                <tr>
                                    <th>Number of branches</th>
                                    <td><input type="text" name="noOfbranches"></td>
                                </tr>
                                <tr>
                                    <th>Slogan</th>
                                    <td><input type="text" name="slogan"></td>
                                </tr>
                                <tr>
                                    <th>Logo</th>
                                    <td><input type="file" name="logo"></td>
                                </tr>
                                <tr>
                                    <th>Website</th>
                                    <td><input type="text" name="website"></td>
                                </tr>
                                <tr>
                                    <th>Twitter</th>
                                    <td><input type="text" name="twitter"></td>
                                </tr>
                                <tr>
                                    <th>Telegram</th>
                                    <td><input type="text" name="telegram"></td>
                                </tr>
                                <tr>
                                    <th>Facebook</th>
                                    <td><input type="text" name="facebook"></td>
                                </tr>
                                <tr>
                                    <th>Instagram</th>
                                    <td><input type="text" name="instagram"></td>
                                </tr>
                                <tr>
                                    <th>Registered by</th>
                                    <td><input type="text" name="registeredBy" value="<?php echo $_SESSION['login']; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td><button class="btn" style="background-color: #EB984E" name="btn-school"><font color="white">Next >></font></button></td>
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

