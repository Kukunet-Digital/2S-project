<?php
    include('controller/auth.php');

    $me = $_SESSION['admin'];
    $admin = "SELECT * FROM admin where username='$me'";
    $r_admin = mysqli_query($con, $admin);
    $row_admin = mysqli_fetch_assoc($r_admin);
    $school_id = $row_admin['school_id'];
    $school_branch_id = $row_admin['school_branch_id'];

    $school = "SELECT * FROM school_basic_info where school_id = '".$row_admin['school_id']."'";
    $r_school = mysqli_query($con, $school);
    $row_school = mysqli_fetch_assoc($r_school);

    $school_name = $row_school['school_name'];

    $branch = "SELECT * FROM school_branches where school_branch_id='$school_branch_id'";
    $r_branch = mysqli_query($con, $branch);
    $row_branch = mysqli_fetch_assoc($r_branch);

    $branch_name = $row_branch['branch_name'];
    // echo $branch_name;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic time setup</title>
    <style>
        select{
            padding: 8px;
            width: 120px;
            border-radius: 4px;
        }
        input[type="text"]{
            padding: 8px;
            width: 200px;
            border-radius: 4px;
        }
        input[type="time"]{
            padding: 8px;
            width: 100px;
            border-radius: 4px;
        }
        input[type="date"]{
            padding: 8px;
            width: 100px;
            border-radius: 4px;
        }
        input[type="number"]{
            padding: 8px;
            width: 100px;
            border-radius: 4px;
        }
        table{
            border-collapse:collapse
        }
        th{
            text-align:right;
            padding-right: 20px
        }
    </style>
</head>
<body>
    <form action="basic_time_setup.php" method="post" style="margin-top: 100px; margin-left: 200px">
            <input type="hidden" name="school_id" value="<?php echo $school_id; ?>" id="">
            <input type="hidden" name="school_branch_id" value="<?php echo $school_branch_id; ?>" id="">
        <table>
            <tr>
                <th>Schedule category</th>
                <td>
                    <select name="schedule_category" id="">
                        <option value=""disabled selected>Choose the schedule type</option>
                        <option>Regular</option>
                        <option>Evening program</option>
                        <option>Special program</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Date when</th>
                <td>
                    <input type="date" name="date_when">
                </td>
            </tr>
            <tr>
                <th>Morning period (from)</th>
                <td><input type="time" name="morningPeriodFrom"></td>
            </tr>
            <tr>
                <th>Morning period (to)</th>
                <td><input type="time" name="morningPeriodTo"></td>
            </tr>
            <tr>
                <th>Afternoon period (from)</th>
                <td><input type="time" name="afternoonPeriodFrom"></td>
            </tr>
            <tr>
                <th>Afternoon perioud (to)</th>
                <td><input type="time" name="afternoonPeriodTo"></td>
            </tr>
            <tr>
                <th>Time per class (in minute)</th>
                <td><input type="number" name="timePerClass"></td>
            </tr>
            <tr>
                <th>Morning break time (from)</th>
                <td><input type="time" name="morningBreakTimeFrom"></td>
            </tr>
            <tr>
                <th>Morning break time (to)</th>
                <td><input type="time" name="morningBreakTimeTo"></td>
            </tr>
            <tr>
                <th>Afternoon break time (from)</th>
                <td><input type="time" name="afternoonBreakTimeFrom"></td>
            </tr>
            <tr>
                <th>Afternoon break time (to)</th>
                <td><input type="time" name="afternoonBreakTimeTo"></td>
            </tr>
            <tr>
                <th></th>
                <td><button style="padding: 10px; border-style:solid; border-width: thin; background-color:green; border-color:green; width: 120px; color:white; border-radius:4px" name="btn-basic-time">Save</button></td>
            </tr>
            
        </table>
    </form>
</body>
</html>