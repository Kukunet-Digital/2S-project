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

      <?php
        include('left_nav_bar.php');
      ?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Assign Role for the employee</h3>
              <div class="col-md-12">
                      <div class="content-panel">
                        <div style="margin-left: 100px; marigin-top: 50px; padding: 40px">
                          <?php
                            $uid = $_REQUEST['uid'];
                            
                            $role = "SELECT * FROM users where id = '$uid'";
                            $result = mysqli_query($con, $role);
                            $row = mysqli_fetch_assoc($result);                                                       
                            ?>
                          <form action="update-assign_role.php" method="post">


                            <?php
                                                            
                            if(isset($_POST['new']) && $_POST['new']){
                                $role_id = $_REQUEST['role_id'];
                                $uid = $_POST['id'];

                                                                
                                $update = "UPDATE users set role_id = '$role_id' where id='$uid'";
                                mysqli_query($con, $update);
                                echo 'You have successfully assigned';
                                ?>
                                    <a href="assign-role.php"><font color="red">Go back</font></a>
                                <?php
                                
                            
                            }else{?>
                            <input type="hidden" name="id" value="<?php echo $uid; ?>">
                            <input type="hidden" name="new" value="1">
                            <?php echo 'Assign: '; ?><br>
                            <?php echo $row['fname']; ?> <?php echo $row['lname']; ?><br><br>
                            
                            <select name="role_id" id="" style="width: 400px; border-radius: 3px; border-width: thin; border-color:lightgray; padding: 10px">
                                <option value="<?php
                                        $roleid = $row['role_request']; 
                                        $rolename = "SELECT * FROM role where role_id = '$roleid'";
                                        $r_rn = mysqli_query($con, $rolename);
                                        $row_rn = mysqli_fetch_assoc($r_rn); 
                                        echo $roleid;
                                        
                                        ?>"><?php echo $row_rn['role']; ?>
                                </option>
                                    <?php
                                    $ra = "SELECT * FROM role";
                                    $result_a = mysqli_query($con, $ra);
                                    while($row_a = mysqli_fetch_array($result_a)){?>
                                <option value="<?php echo $row_a['role_id']; ?>"><?php echo $row_a['role']; ?></option>
                                <?php
                                }
                                ?>
                            </select><br><br>
                                              
                            

                            <button class="buttons" style="border-radius: 3px; border-color: green; border-width: thin; padding: 10px; background-color: lightgreen">Finish</button>
                        
                        <?php
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
