<!DOCTYPE html>
<html>
    <head>
        <title> SilverJack </title>
    </head>
    
    <body>

        <?php
            function mapNumbertoCard($num) {
                $cardValue = ($num % 13) + 1;
                $cardSuit = floor($num / 13);
                $suitStr = "";
                
                switch($cardSuit){
                    case 0:
                        $suitStr = "clubs";
                        break;
                    case 1:
                        $suitStr = "hearts";
                        break;
                    case 2:
                        $suitStr = "diamonds";
                        break;
                    case 4:
                        $suitStr = "spades";
                        break;
                }
                
                $card = array(
                    "num" => $cardValue,
                    "suit" => $cardSuit,
                    "imgURL" => "./img/cards/".$suitStr."/".$cardValue.".png"
                    );
                    
                    return $card;
            }
        
            function generateDeck() {
                $cards = array();
                
                for ($i = 0; $i < 52; $i++)
                {
                    array_push($cards, $i);
                    mapNumbertoCard($i);
                }
                
                shuffle($cards);
                
                return $cards;
            }
            
            //return specific number of cards
            function generateHand($deck) {
                $hand = array();
                
                for($i = 0; $i < 3; $i++)
                {
                    $cardNum = array_pop($deck);
                    $card = mapNumbertoCard($cardNum);
                    array_push($hand, $card);
                }
                
                return $hand;
            }
            
            function displayPerson($person)
            {
                echo "<img src='".$person["profilePicUrl"]."'>";
                
                //iterate through person's cards
                    for($i = 0; $i < count($person["cards"]); $i++){
                    $card = $person["cards"][$i];
                    //echo $card["value"]." of ".$card["suit"];
    
                    //construct the imgURL for each card

                    //translate this to HTML
                    echo "<img src='".$imgUrl."'>";
                    }
                    echo calculateHandValue($person["cards"]);

            }
            
            function calculateHandValue($cards){
                $sum = 0;
                
                foreach($cards as $card) {
                    $sum += $card["value"];
                }
                
                return $sum;
            }
            
        
            $person = array(
                "name" => "Mario",
                "profilePicUrl" => "./img/players/Mario.png",
                "cards" => array(
                    array(
                        "suit" => "hearts",
                        "value" => "4"
                        ),
                    array(
                        "suit" => "clubs",
                        "value" => "10"
                        )
                    )
            );
            
            displayPerson($person);
        ?>
    </body>
</html>