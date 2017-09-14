<?php
    include 'inc/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <link rel="stylesheet" type="text/css" href="./css/styles.css"/>
    </head>
    <body>
        <div id="info">
            <h1>Generic Slot Machine</h1>
            <br />
            <h3>Prizes</h3>
            <h4>3cherries= 100pts     3grapes= 100pts     3lemons= 100pts</h4>
            <h4>3oranges= 250pts     3bars= 250pts</h4>
            <h4>JACKPOT 3sevens= 1000pts<h4>
        </div>
        
        <div id="main">
            <?php
            play();
            ?>
        
            <form>
                <input type="submit" value="Spin!"/>
            </form>
        </div>
        
    </body>
</html>