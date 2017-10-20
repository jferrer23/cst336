<?php
    include "functions.php";
?>

<html>
    <head>
        <title>Device Filter Search</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    
    <body>
        <form>
            Device Name: <input type="text" name="device-name">
            
            <br/>
            
            Device Type:  
            <select name="device-type">
                <option value=""></option>
                <?php getDeviceTypes()?>
            </select>
            
            <input type="checkbox" name="available"> Available
            <br/>
            
            <input type="radio" name="order-by" value="deviceName"> Name
            <input type="radio" name="order-by" value="price"> Price
            <br/>

            <input type="submit" value="Search" name="submit">

        </form>
        <?php
        displayDeviceList();
        ?>
    </body>
</html>
