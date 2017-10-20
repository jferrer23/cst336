<?php
    include "functions.php";
?>

<html>
    <head>
        <title>Device Filter Search</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    
    <body>
        <div class="outerBorder" id="appTitle">
            <h1>Rentable Devices App</h1>
        </div>
        
        <div class="outerBorder" id="filters">
            <form>
            Device Name: <input type="text" name="device-name">
            
            <br/>
            
            Device Type:  
            <select name="device-type">
                <option value=""></option>
                <?php getDeviceTypes()?>
            </select>
            
            <input type="checkbox" name="available"> Available
            
            <p>Sort by:</p> 
            <input type="radio" name="order-by" value="deviceName"> Name
            <input type="radio" name="order-by" value="price"> Price
            <br/> <br />

            <input type="submit" value="Search" name="submit">

        </form>
        </div>
        
        <div class="outerBorder" id="deviceTable">
            <?php
                displayDeviceList();
            ?>
        </div>
        
    </body>
</html>
