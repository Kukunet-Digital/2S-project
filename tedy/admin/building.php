<?php
  
require('controller/dbconnection.php');

   $grade_id = $_REQUEST["grade_id"];

   $sql = "SELECT * FROM class_grade where grade_id = $grade_id";
   $result = mysqli_query($con,$sql);
   
?>
<option value=""disabled selected>Select Class below</option>
<?php
   while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["class_id"];?>"><?php echo $row["class_id"];?></option>
<?php
}
   ?>