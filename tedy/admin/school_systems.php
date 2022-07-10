<?php
    include('controller/auth.php');
    $usr = "SELECT * FROM admin a inner join school_basic_info sbi on a.school_id=sbi.school_id inner join school_branches sb on a.school_id=sb.school_id where username = '".$_SESSION['admin']."'";
    $rusr = mysqli_query($con, $usr);
    $rowusr = mysqli_fetch_assoc($rusr);
    $school_id = $rowusr['school_id'];
    $school_branch_id = $rowusr['school_branch_id'];
    echo '<font size="5"><div align="center">';
    echo $rowusr['school_name'];
    echo '  |  ';
    echo $rowusr['branch_name'];
    echo '<br></div></font>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | basic info</title>
    <style>
        input[type="text"]{
            padding:10px;
            border-radius:5px;
            margin-bottom:3px;
        }
        input[type="number"]{
            padding:10px;
            border-radius:5px;
            margin-bottom:3px;
        }
        .btn{
            padding:10px;
            border-radius: 5px;
            border-color:green;
            background-color: green;
            color:white;
            width: 100px;
        }
        select{
            padding:10px;
            border-radius:5px;
            margin-bottom:3px;
            width: 190px
        }
    </style>
</head>
<body style="background-color:lightgray">
    <form action="school_systems.php" method="post">
        <?php
            $system = $_REQUEST['system'];
            // echo $system;
        ?>
                <div style="margin-left: 10px; margin-top:10px; float:left; border-style:solid;  
                <?php
                    if($system == 1){
                ?>
                border-color:red; 
                border-width:thick;
                background-color:pink;
                <?php
                   }else{
                ?>
                border-color:green;
                border-width:thin;
                
                <?php
                   }?>
                border-radius: 5px; width: 250px;" align="center">
                    <h2>Subject registration</h2>
            
                    <input type="hidden" name="school_id" value="<?php echo $school_id; ?>">
                    <input type="hidden" name="school_branch_id" value="<?php echo $school_branch_id; ?>">
                    <input type="text" name="subject_name" placeholder="Write subject"><br>
                    <button class="btn" name="btn-subject">Save</button>
                <br><br>
                </div>
            
            <div style="margin-left: 10px; margin-top:10px; float:left; border-style:solid;  
                <?php
                    if($system == 2){?>
                    border-color:red; 
                    border-width:thick;
                    background-color:pink;
                <?php    
                }else{?>
                    border-color:green;
                    border-width:thin;
            <?php
                }
                ?>
            border-radius: 5px; width: 250px;" align="center">
                <h2>Grade registration</h2>
            
                <input type="hidden" name="school_id" value="<?php echo $school_id; ?>">
                
                <input type="hidden" name="school_branch_id" value=<?php echo $school_branch_id; ?>>
                <input type="text" name="grade_name" placeholder="Write grade"><br>
                <button class="btn" name="btn-grade">Save</button>
            <br><br>
            </div>
    
            <div style="margin-left: 10px; margin-top:10px; float:left; border-style:solid;
                <?php
                    if($system == 3){?>
                    border-color:red; 
                    border-width:thick;
                    background-color:pink;
                <?php    
                }else{?>
                    border-color:green;
                    border-width:thin;
            <?php
                }
                ?>
             border-radius: 5px; width: 250px;" align="center">
            <h2>School Building</h2>
            <table>
                <input type="hidden" name="school_id" value="<?php echo $school_id; ?>">
                <input type="hidden" name="school_branch_id" value="<?php echo $school_branch_id; ?>">
                <input type="text" name="building_name" placeholder="Write building name"><br>
                <input type="number" name="no_of_floors" placeholder="Write number of floor"><br>
                <input type="number" name="no_of_rooms" placeholder="Write number of rooms"><br>
                <button class="btn" name="btn-building">Save</button>
            </table><br><br>
            </div>

    
            <div style="margin-left: 10px; margin-top:10px; float:left; border-style:solid;
                <?php
                    if($system == 4){?>
                    border-color:red; 
                    border-width:thick;
                    background-color:pink;
                <?php    
                }else{?>
                    border-color:green;
                    border-width:thin;
            <?php
                }
                ?>
             border-radius: 5px; width: 350px;" align="center">
            <h2>School Class</h2>
            <div style="float:right">
                <a href="subjects.php" style="text-decoration:none; margin-right:4px">Go back</a>
            </div>
            <table>
                <input type="hidden" name="school_id" value="<?php echo $school_id; ?>">
                <input type="hidden" name="school_branch_id" value="<?php echo $school_branch_id; ?>">
                <select name="building_id" id="" style="margin-right: 10px">
                    <option value="" disabled selected>Choose building no.</option>
                        <?php
                            $bld = "SELECT * FROM school_buildings order by building_name";
                            $rbld = mysqli_query($con, $bld);
                            while($rowbld = mysqli_fetch_array($rbld)){?>
                    <option value="<?php echo $rowbld['building_id']; ?>"><?php echo $rowbld['building_name']; ?></option>
                        <?php
                        }
                        ?>
                </select>
                <button style="width: 50px" class="btn" name="btn-bld">OK</button><br>

                        <?php
                            if(isset($_POST['btn-bld'])){
                                $BB = $_REQUEST['building_id'];
                               // echo $BB;
                               $bl = "SELECT * FROM school_buildings where school_id='$school_id' and building_id = '$BB'";
                               $rbl = mysqli_query($con, $bl);
                               $cb = mysqli_fetch_assoc($rbl);
                               $bname = $cb['building_name'];
                                $total_class_no = $cb['no_of_rooms'];
                             //  echo $cb['no_of_rooms'];
                               echo '<br>';

                               $cl = "SELECT *, count(class_id) FROM school_class where school_id = '$school_id' and building_id = '$BB' group by building_id ";
                               $rcl = mysqli_query($con, $cl);
                               $rowrcl = mysqli_fetch_assoc($rcl);
                               $no_of_assigned_classes = $rowrcl['count(class_id)'];
                             // echo $no_of_assigned_classes;
                               echo '<br>';

                               if($no_of_assigned_classes < $total_class_no){?>
                                    <font color="blue"><b>
                                   Bld name: </font></b> <?php echo $bname; ?><br>
                                   <font color="blue"><b>
                                        Remaining class (unassigned):
                                        </b>
                                   </font>
                                <?php
                                    $diff = $total_class_no - $no_of_assigned_classes;
                                    echo $diff;
                                ?>
                                    <br>
                                    <input type="hidden" name="building_id" value="<?php echo $BB; ?>"><br>
                                    <input type="text" name="class_name" placeholder="Write class name"><br>
                                    <input type="number" name="carying_capacity" placeholder="Write class capacity (#)"><br>

                                    <button class="btn" name="btn-class">Save</button>
                        <?php
                               }else{
                                echo 'All classes are assigned fot this building';
                               }
                            }
                        ?>
                
            </table><br><br>
            </div>
       

        

        
                
                
            
       
        
    </form>
</body>
</html>