<?php

function createCombatants()
{
    $fighters = array();
    
    for($i = 1; $i <= 16; $i++)
    {
        array_push($fighters, "fighter-".$i.".jpg");
    }
    
    shuffle($fighters);
    
    return $fighters;
}

function getName($fighter)
{
    switch($fighter)
    {
        case "fighter-1.jpg":
            return "Cloud";
            break;
        case "fighter-2.jpg":
            return "Link";
            break;
        case "fighter-3.jpg":
            return "Mario";
            break;
        case "fighter-4.jpg":
            return "Samus";
            break;
        case "fighter-5.jpg":
            return "Guts";
            break;
        case "fighter-6.jpg":
            return "Red Ranger";
            break;
        case "fighter-7.jpg":
            return "Son Goku";
            break;
        case "fighter-8.jpg":
            return "Batman";
            break;
        case "fighter-9.jpg":
            return "Spiderman";
            break;
        case "fighter-10.jpg":
            return "Black Widow";
            break;
        case "fighter-11.jpg":
            return "Sailor Moon";
            break;
        case "fighter-12.jpg":
            return "Catwoman";
            break;
        case "fighter-13.jpg":
            return "Sakura Haruno";
            break;
        case "fighter-14.jpg":
            return "Princess Leia";
            break;
        case "fighter-15.jpg":
            return "Arturia Pendragon";
            break;
        case "fighter-16.jpg":
            return "Asuna Yuuki";
            break;
    }
}

function selectFighters()
{
    $fighters = createCombatants();
    $selectedFighters = array();
    
    array_push($selectedFighters, array_pop($fighters));
    array_push($selectedFighters, array_pop($fighters));

    return $selectedFighters;
}

function fight()
{
    $leftScore = 0;
    $rightScore = 0;

    for($i = 0; $i < 20; $i++)
    {
        $leftAttackVal = rand(0,20);
        $rightAttackVal = rand(0,20);
        if($leftAttackVal < $rightAttackVal)
            $rightScore++;
        else if($leftAttackVal > $rightAttackVal)
            $leftScore++;
    }
    
    if($leftScore > $rightScore)
        return 1;
    else if($leftScore < $rightScore)
        return 2;
    else
        return 0;
}

function winner(){
    $fighters = selectFighters();
        echo "<h1 id='Fighter1'>".getName($fighters[0])."<h1>";
        echo "<div class='leftFighter'>";
        echo "<img class='pic' src='img/".$fighters[0]."'/>";
        echo "</div>";
        
        echo "<h1 id='Fighter2'>".getName($fighters[1])."<h1>";
        echo "<div class='rightFighter'>";
        echo "<img class='pic' src='img/".$fighters[1]."'/>";
        echo "</div>";
        
        switch(fight()){
            case 0:
                echo "<div id='tieGame'>";
                echo "<h1>TIE</h1>";
                echo "</div>";
                break;
            case 1:
                echo "<div id='leftWon'>";
                echo "<img class='award' src='img/winner-tag.png'/>";
                echo "</div>";
                break;
            case 2:
                echo "<div id='rightWon'>";
                echo "<img class='award' src='img/winner-tag.png'/>";
                echo "</div>";
                break;
        }
}

?>