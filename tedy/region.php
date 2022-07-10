<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regions</title>
    <style>
        table{
            border-collapse:collapse;
            width: 400px;
        }
        th{
            padding-right: 10px;
            width: 200px;
            padding-bottom:5px;
        }
        td{
            padding-right: 10px;
            width: 200px
        }
        tr:nth-child(even){
            background-color: lightgray;
        }
    </style>
</head>
<body>
        <table>
                <tr>
                    <th>SNo.</th>
                    <th>English name</th>
                    <th colspan='2' style="text-align:center">Actions</th>
                </tr>
                    <?php
                        $sno = 1;
                        $a = "SELECT * FROM regions order by region_name_e";
                        $b = mysqli_query($con, $a);
                        while($c = mysqli_fetch_array($b)){?>
                <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $c['region_name_e']; ?></td>
                    <td style="text-align:right"><a href="moa_edit_region.php?region_id=<?php echo $c['region_id']; ?>">Edit</a></td>
                    <td><a href="moa_delete_conformation.php?region_id=<?php echo $c['region_id']; ?>">Delete</a></td>

                </tr>
                    <?php
                    $sno++;
                    }
                    ?>
            </table>
</body>
</html>