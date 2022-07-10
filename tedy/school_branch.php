<?php
  
require('controller/auth.php');

   $school_id = $_POST["school_id"];
   $result = mysqli_query($con,"SELECT * FROM school_branches where school_id = $school_id ");
?>
<option value=""disabled selected>Select Branch</option>
<?php
   while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["school_branch_id"];?>"><?php echo $row["branch_name"];?></option>
<?php
}