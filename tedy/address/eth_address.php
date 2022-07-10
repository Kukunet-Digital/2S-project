
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Address</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    <body>
    <table>
        <tr>
            <th></th>
            <td>Please complete the address below</td>
        </tr>
    <tr>
        <td width="150" align="right" style="padding-right:20px"><b></b></td>
            <td width="150">
                <select name="region" id="region" style="padding:12px; border-radius:5px; width:300px">
                <option value="" disabled selected>Select the region</option>
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'ss');
                        $sql = "SELECT * FROM regions where region_id = 1";
                        $result = mysqli_query($conn, $sql);
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
            <select name="zone" id="zone" style="padding:12px; border-radius:5px;  width:300px" placeholder="Zone">
                <option value="" disabled selected>Select zone</option>        
            </select>
        </td>
    </tr>
                
    <tr>
        <td width="150" align="right" style="padding-right:20px"><b></b></td>
        <td>
                <select name="subcity" id="subcity" style="padding:12px; border-radius:5px; margin-right:20px; width:300px">
                    <option value="" disabled selected>Select Subcity</option>
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'ss');
                        $sub = "SELECT * FROM subcities order by subcity";
                        $r_subcity = mysqli_query($conn, $sub);
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
            <select name="woreda" id="woreda" style="padding:12px; border-radius:5px; margin-right:20px; width:300px">
                <option value="" disabled selected>Select Woreda</option>      
            </select><br>
    </tr>
    <tr>
        <td width="200" align="right" style="padding-right:20px"><b></b></td>
        <td>
            <input type="text" name="woreda_1" id="woreda1" placeholder="ወረዳ ይጻፉ/ Write Woreda"  style="padding:12px; border-radius:5px; margin-right:20px; width:300px">
        </td>
    <tr>

    </table>
    </body>
    </html>

    <script>
        $(document).ready(function(){
            $('#region').on('change', function(){
                var region_id = this.value;
                $.ajax({
                    url: "zone.php",
                    type: "POST",
                    data: {
                        region_id: region_id
                    },
                    cache: false,
                    success: function(result){
                        $("#zone").html(result);
                        $('#woreda-dropdown').html('<optionvalue="">Select zone first</option>');
                    }
                });
            });
            $('#zone').on('change', function(){
                var zone_id = this.value;
                $.ajax({
                    url: "woreda.php",
                    type: "post",
                    data: {
                        zone_id: zone_id
                    },
                    cache: false,
                    success:function(result){
                        $('#woreda').html(result);
                    }
                });
            });

            $('#region').change(function(){
                if($('#region').val() == '1'){
                    $('#subcity').show();
                    $('#woreda').hide();
                    $('#woreda1').show();
                    $('#zone').hide();
                }
                else{
                    $('#subcity').hide();
                    $('#woreda').show();
                    $('#woreda1').hide();
                    $('#zone').show();
                }
            });
        });

</script>