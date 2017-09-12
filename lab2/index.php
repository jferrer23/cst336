<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        
        <?php
        
            $cherryUrl = "./img/cherry.png";
            $grapeUrl = "./img/grapes.png";
            $lemonUrl = "./img/lemon.png";
            $orangeUrl = "./img/orange.png";
            $sevenUrl = "./img/seven.png";
            $barUrl = "./img/bar.png";
            
            $randVal = rand(0, 5);
            
            switch($randVal) {
                case 0:
                    echo "<img src='$cherryUrl'>";
                    break;
                case 1:
                    echo "<img src='$grapeUrl'>";
                    break;
                case 2:
                    echo "<img src='$lemonUrl'>";
                    break;
                case 3:
                    echo "<img src='$orangeUrl'>";
                    break;
                case 4:
                    echo "<img src='$sevenUrl'>";
                    break;
                case 5:
                    echo "<img src='$barUrl'>";
                    break;
            }

            echo "<img src='$imgUrl'>";
        
        ?>
        
    </body>
</html>