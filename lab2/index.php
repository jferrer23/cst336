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
            <h4>3 cherries = 100pts     3 grapes = 100pts     3 lemons = 100pts</h4>
            <h4>3 oranges  = 250pts     3 bars   = 250pts</h4>
            <h4>JACKPOT 3 sevens = 1000pts<h4>
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