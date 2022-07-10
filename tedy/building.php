<?php
  
require('dbconnection.php');

   $grade_id = $_REQUEST["grade_id"];

   $sg = "SELECT * FROM school_grade where grade_id = '$grade_id'";
   $rsg = mysqli_query($con, $sg);
   $row_sg = mysqli_fetch_assoc($rsg);
   $grade_name = $row_sg['grade_name'];

   $sql = "SELECT * FROM class_grade where grade_assigned = $grade_name";
   $result = mysqli_query($con,$sql);
   
?>
<option value=""disabled selected>Select Class below</option>
<?php
   while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["building_id"];?>"><?php // echo $row["building_id"];?></option>
<?php
}