<?php 
require_once('controller/auth.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>Login System</title>

<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegent Tab Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="js/jquery.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default',       
							width: 'auto', 
							fit: true 
						});
					});
				   </script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
<style>
	select{
		width: 100%;
		padding:10px;
		border-style:solid;
		border-color:#C0392B;
		background-color:#E74C3C;
		font: 14px;
		color: white;

	}
</style>
</head>
<body>
<div class="main">
		<h1>Registration and Login System</h1>
	 <div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
			  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><div class="top-img"><img src="images/top-note.png" alt=""/></div><span>Register</span>
			  	  	
				</li>
				  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><div class="top-img"><img src="images/top-lock.png" alt=""/></div><span>Login</span></li>
				  <li class="resp-tab-item lost" aria-controls="tab_item-2" role="tab"><div class="top-img"><img src="images/top-key.png" alt=""/></div><span>Forgot Password</span></li>
				  <div class="clear"></div>
			  </ul>		
			  	 
			<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
					<div class="facts">
					
						<div class="register">
							<form name="registration" method="post" action="" enctype="multipart/form-data">
								<p>School Name </p>
								<select name="school_id" id="school">
									<option value=""disabled selected>Choose your school</option>
									<?php
										$school = "SELECT * FROM school_basic_info order by school_name";
										$r_sch = mysqli_query($con, $school);
										while($row_sch = mysqli_fetch_array($r_sch)){?>
									<option value="<?php echo $row_sch['school_id']; ?>"><?php echo $row_sch['school_name']; ?></option>
									<?php
									}
									?>
								</select>
								<p>School Branch</p>
									<select name="school_branch_id" id="branch">
										<option value=""disabled selected>Select branch name</option>

									</select>
								<p>You want to register as </p>
									<select name="role_request" id="">
									<option value=""disabled selected>Choose your role</option>
									<?php
										$rolea = "SELECT * FROM role";
										$r_role = mysqli_query($con, $rolea);
										while($row_role = mysqli_fetch_array($r_role)){?>
									<option value="<?php echo $row_role['role_id']; ?>"><?php echo $row_role['role']; ?></option>
									<?php
									}
									?>
								</select>
								<p>First Name </p>
								<input type="text" class="text" value=""  name="fname" required >
								<p>Father Name </p>
								<input type="text" class="text" value=""  name="fathername" required >
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
							</form>

						</div>
					</div>
				</div>		
			 <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							 <div class="login">
							<div class="buttons">
								
								
							</div>
							<form name="login" action="" method="post">
								<input type="text" class="text" name="uemail" value="" placeholder="Enter your registered email"  ><a href="#" class=" icon email"></a>

								<input type="password" value="" name="password" placeholder="Enter valid password"><a href="#" class=" icon lock"></a>

								<div class="p-container">
								
									<div class="submit two">
									<input type="submit" name="login" value="LOG IN" >
									</div>
									<div class="clear"> </div>
								</div>

							</form>
					</div>
				</div> 
			</div> 			        					 
				 <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							 <div class="login">
							<div class="buttons">
								
								
							</div>
							<form name="login" action="" method="post">
								<input type="text" class="text" name="femail" value="" placeholder="Enter your registered email" required  ><a href="#" class=" icon email"></a>
									
										<div class="submit three">
											<input type="submit" name="send" onClick="myFunction()" value="Send Email" >
										</div>
									</form>
									</div>
				         	</div>           	      
				        </div>	
				     </div>	
		        </div>
	        </div>
	     </div>

</body>
</html>
<script>
	$(document).ready(function(){
            $('#school').on('change', function(){
                var school_id = this.value;
                $.ajax({
                    url: "school_branch.php",
                    type: "POST",
                    data: {
                        school_id: school_id
                    },
                    cache: false,
                    success: function(result){
                        $("#branch").html(result);
                        $('#woreda-dropdown').html('<optionvalue="">Select zone first</option>');
                    }
                });
            });
            
            });
</script>