<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <link rel="stylesheet" type="text/css" href="./css/styles.css"/>
    </head>
    <body>
        
        <?php
            
            function getRandomImgUrl() 
            {
                $randVal = rand(0, 5);
                $imgUrl;
                switch($randVal) {
                    case 0:
                        $imgUrl = "./img/cherry.png"; 
                        break;
                    case 1:
                        $imgUrl = "./img/grapes.png"; 
                        break;
                    case 2:
                        $imgUrl = "./img/lemon.png"; 
                        break;
                    case 3:
                        $imgUrl = "./img/orange.png"; 
                        break;
                    case 4:
                        $imgUrl = "./img/seven.png"; 
                        break;
                    case 5:
                        $imgUrl = "./img/bar.png"; 
                        break;
                }
                return $imgUrl;
            }
            
            $imgUrl1 = getRandomImgUrl();
            $imgUrl2 = getRandomImgUrl();
            $imgUrl3 = getRandomImgUrl();
            
            echo "<img class='random-img' src='" .$imgUrl1."'>";
            echo "<img class='random-img' src='" .$imgUrl2."'>";
            echo "<img class='random-img' src='" .$imgUrl3."'>";
            
        

        ?>
        
    </body>
</html>