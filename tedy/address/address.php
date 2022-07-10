
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Address</title>
       

    </head>
    <body>
    <table>
        <tr>
            <th></th>
            <td>Please complete the address below</td>
        </tr>
    <tr>
        <td align="right" style="padding-right:20px"><b></b></td>
            <td>
                <select name="region" id="region" style="padding:12px; border-radius:5px; width:150px">
                <option value="" disabled selected>Select the region</option>
                    <?php
                        // $conn = mysqli_connect('localhost', 'root', '', 'ss');
                        $sql = "SELECT * FROM regions where region_id == 1 order by region_name_e";
                        $result = mysqli_query($con, $sql);
                        while($row_region = mysqli_fetch_array($result)){?>
                <option value="<?php echo $row_region['region_id']; ?>"><?php echo $row_region['region_name_e']; ?></option>        
                    <?php
                    }
                    ?>
            </select>
        </td>
    </tr>
    <tr>
        <td width="150" align="right" style="padding-right:20px"><b></b></td>
        <td width="150">
            <select name="zone" id="zone" style="padding:12px; border-radius:5px;  width:150px" placeholder="Zone">
                <option value="" disabled selected>Select zone</option>        
            </select>
        </td>
    </tr>
                
    <tr>
        <td width="150" align="right" style="padding-right:20px"><b></b></td>
        <td>
                <select name="subcity" id="subcity" style="padding:12px; border-radius:5px; margin-right:20px; width:150px">
                    <option value="" disabled selected>Select Subcity</option>
                    <?php
                        // $conn = mysqli_connect('localhost', 'root', '', 'ss');
                        $sub = "SELECT * FROM subcities order by subcity";
                        $r_subcity = mysqli_query($con, $sub);
                        while($row_subcity = mysqli_fetch_array($r_subcity)){?>
                    <option value="<?php echo $row_subcity['subcity']; ?>"><?php echo $row_subcity['subcity']; ?></option>
                    <?php    
                    }
                    ?>
                </select>
        </td>          
    </tr>
    <tr>
        <td width="200" align="right" style="padding-right:20px"><b></b></td>
        <td>
            <select name="woreda" id="woreda" style="padding:12px; border-radius:5px; margin-right:20px; width:150px">
                <option value="" disabled selected>Select Woreda</option>      
            </select><br>
    </tr>
    <tr>
        <td width="200" align="right" style="padding-right:20px"><b></b></td>
        <td>
            <input type="text" name="woreda_1" id="woreda1" placeholder="Write Woreda"  style="padding:12px; border-radius:5px; margin-right:20px; width:150px">
        </td>
    <tr>

    </table>
    </body>
    </html>

    