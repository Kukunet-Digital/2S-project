<?php
//   $conn = mysqli_connect('localhost', 'root', '', 'ss');
include('../dbconnection.php');
    
  $zone_id = $_REQUEST['zone_id'];

   $resulta = mysqli_query($con,"SELECT * FROM woreda where zone_id = '$zone_id'");
?>
<option value=""disabled selected>Select Woreda</option>
<?php
   while($rowa = mysqli_fetch_array($resulta)) {
?>
<option value="<?php echo $rowa["woreda_id"];?>"><?php echo $rowa["woreda_name"];?></option>
<?php
}
?>
