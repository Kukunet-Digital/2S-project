<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Students</title>
    <style>
        table{
            border-collapse:collapse;
            width: 1000px;
        }
        th{
            padding-right: 10px;
            /* width: 200px; */
            padding-bottom:5px;
        }
        td{
            padding-right: 10px;
            padding-bottom: 5px;
            /* width: 200px */
        }
        tr: nth-child(even){
            background-color: lightgray;
        }
        select{
            padding: 10px;
            width: 300px;
            border-radius: 3px;
            border-color: lightblue;
        }
        input[type="text"]{
            padding: 10px;
            width: 150px;
            border-radius: 3px;
            border-color: lightblue;
        }
    </style>
</head>
<body>
    <form action="grade_subject_1.php" method="post" enctype="multipart/form-data">
        <?php
            $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
            $r_me = mysqli_query($con, $me);
            $row_me = mysqli_fetch_assoc($r_me);

            $school = "SELECT * FROM school_basic_info where school_id = '".$row_me['school_id']."'";
            $r_school = mysqli_query($con, $school);
            $row_school = mysqli_fetch_assoc($r_school);

            $sb = "SELECT * FROM school_branches where school_branch_id = '".$row_me['school_branch_id']."'";
            $r_sb = mysqli_query($con, $sb);
            $row_sb = mysqli_fetch_assoc($r_sb);

            echo '<div align="center">';
            echo '<font size="4" color="blue">';
            echo $row_school['school_name'];
            echo ' | ';
            echo $row_sb['branch_name'];
            echo '</font>';
            echo '</div>';
        ?>
        <input type="hidden" name="school_id" value="<?php echo $row_me['school_id']; ?>">
        <input type="hidden" name="school_branch_id" value="<?php echo $row_me['school_branch_id']; ?>">
        <input type="hidden" name="registered_by" value="<?php echo $_SESSION['admin']; ?>">
        <table>
            <tr>
                <th style="text-align:right">Select grade</th>
                <td>
                    <select name="grade_id" id="">
                        <option value=""disabled selected>Select here</option>
                        <?php
                            $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
                            $rme = mysqli_query($con, $me);
                            $row = mysqli_fetch_assoc($rme);

                            $sbid = $row['school_branch_id'];

                            $gr = "SELECT * FROM school_grade where school_branch_id = '$sbid'";
                            $result_gr = mysqli_query($con, $gr);
                            while($row_gr = mysqli_fetch_array($result_gr)){?>
                        <option value="<?php echo $row_gr['grade_id']; ?>"><?php echo $row_gr['grade_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <?php
                    $sub = "SELECT * FROM subjects where school_branch_id = '$sbid'";
                    $r_sub = mysqli_query($con, $sub);
                    while($row_sub = mysqli_fetch_array($r_sub)){?>
                <tr>
                    <th></th>
                    <td>
                        <input type="checkbox" name="subject_id[]" value="<?php echo $row_sub['subject_id']; ?>">  <?php echo $row_sub['subject_name']; ?>

                    </td>
                </tr>
                <?php
                }
                ?>
            </tr>
            <tr>
                <th></th>
                <td><button name="btn-grade-subject">Select</button></td>
            </tr>
        </table>
    </form>

    <br><br>
   
        
</body>
</html>
