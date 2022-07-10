<?php
  // require_once "db.php";
   //$con = mysqli_connect('localhost', 'root', '', 'ss');
require('controller/dbconnection.php');

   $building_id = $_REQUEST["building_id"];
   $sql = "SELECT * FROM school_class where building_id = $building_id order by class_name";
   $result = mysqli_query($con,$sql);

?>
<option value=""disabled selected>Select Class below</option>
<?php
   while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["class_id"];?>"><?php echo $row["class_name"];?></option>
<?php
}