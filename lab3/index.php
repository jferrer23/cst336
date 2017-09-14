<!DOCTYPE html>
<html>
    <head>
        <title> SilverJack </title>
    </head>
    
    <body>
        <h1>Lab3</h1>
        
        <?php
            echo "Hurrah!";
            
            $person = array(
                "name" => "Mario",
                "imgUrl" => "./img/players/Mario.png",
                "cards" => array(
                    array(
                        "suit" => "hearts",
                        "value" => "4"
                        ),
                    array(
                        "suit" => "spades",
                        "value" => "10"
                        ), 
                    array(
                        "suit" => "clubs",
                        "value" => "7"
                        ),  
                    array(
                        "suit" => "diamonds",
                        "value" => "15"
                        )    
                    )
                );
        ?>
    </body>
</html>