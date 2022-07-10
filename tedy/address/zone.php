<?php
  // require_once "db.php";
//   $conn = mysqli_connect('localhost', 'root', '', 'ss');
require('../dbconnection.php');

   $region_id = $_POST["region_id"];
   $result = mysqli_query($con,"SELECT * FROM zones where region_id = $region_id order by zone_name");
?>
<option value=""disabled selected>Select Zone</option>
<?php
   while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["zone_id"];?>"><?php echo $row["zone_name"];?></option>
<?php
}