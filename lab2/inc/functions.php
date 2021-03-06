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
    
    function displayPoints($img1, $img2, $img3) {
        echo "<div id='output'>";
        if($img1 == $img2 && $img2 == $img3) {
            switch ($img1) {
                case "./img/cherry.png":
                    $totalPoints = 100;
                    break;
                case "./img/grapes.png":
                    $totalPoints = 100;
                    break;
                case "./img/lemon.png":
                    $totalPoints = 100;
                    break;
                case "./img/orange.png":
                    $totalPoints = 250;
                    break;
                case "./img/seven.png":
                    echo "<h1>Jackpot!</h1>";
                    $totalPoints = 1000;
                    break;
                case "./img/bar.png":
                    $totalPoints = 250;
                break;
            }
            echo "<h2>You Won $totalPoints points!</h2>";
        }
        else {
                echo "<h3>Try Again</h3>";
            }
        echo "</div>";
    }
    
    function play() {
        $imgUrl1 = getRandomImgUrl();
        $imgUrl2 = getRandomImgUrl();
        $imgUrl3 = getRandomImgUrl();
        
        echo "<img id='reel1' src='" .$imgUrl1."'>";  
        echo "<img id='reel2' src='" .$imgUrl2."'>";  
        echo "<img id='reel3' src='" .$imgUrl3."'>";  
        
        displayPoints($imgUrl1, $imgUrl2, $imgUrl3);
    }

?>