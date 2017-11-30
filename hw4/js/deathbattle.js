    window.onload = winner();

    
    function createCombatants()
    {
        var fighters = new Array();
        
        for(var i = 1; i <= 16;  i++)
        {
            fighters.push("fighter-" + i + ".jpg");
        }
        
        shuffle(fighters);
        
        return fighters;
    }
    
    function shuffle(a) {
        var j, x, i;
        for (i = a.length - 1; i > 0; i--) {
            j = Math.floor(Math.random() * (i + 1));
            x = a[i];
            a[i] = a[j];
            a[j] = x;
        }
    }
    
    function getName(fighter)
    {
        switch(fighter)
        {
            case "fighter-1.jpg":
                return "Cloud";
            case "fighter-2.jpg":
                return "Link";
            case "fighter-3.jpg":
                return "Mario";
            case "fighter-4.jpg":
                return "Samus";
            case "fighter-5.jpg":
                return "Guts";
            case "fighter-6.jpg":
                return "Red Ranger";
            case "fighter-7.jpg":
                return "Son Goku";
            case "fighter-8.jpg":
                return "Batman";
            case "fighter-9.jpg":
                return "Spiderman";
            case "fighter-10.jpg":
                return "Black Widow";
            case "fighter-11.jpg":
                return "Sailor Moon";
            case "fighter-12.jpg":
                return "Catwoman";
            case "fighter-13.jpg":
                return "Sakura Haruno";
            case "fighter-14.jpg":
                return "Princess Leia";
            case "fighter-15.jpg":
                return "Arturia Pendragon";
            case "fighter-16.jpg":
                return "Asuna Yuuki";
        }
    }

    function selectFighters()
    {
        var fighters = createCombatants();
        var selectedFighters = new Array();
        
        selectedFighters.push(fighters.pop());
        selectedFighters.push(fighters.pop());
    
        return selectedFighters;
    }
    
    function fight()
    {
        var leftScore = 0;
        var rightScore = 0;
    
        for(var i = 0; i < 20; i++)
        {
            var leftAttackVal = Math.floor(Math.random()*20);
            var rightAttackVal = Math.floor(Math.random()*20);
            if(leftAttackVal < rightAttackVal)
                rightScore++;
            else if(leftAttackVal > rightAttackVal)
                leftScore++;
        }
        
        if(leftScore > rightScore)
            return 1;
        else if(leftScore < rightScore)
            return 2;
        else
            return 0;
    }
    
    function winner(){
        var fighters = selectFighters();
            $("#characters").append("<h1 id='Fighter1'>" + getName(fighters[0]) + "</h1>")
            $("#characters").append("<img class='pic' id='leftFighter' src='img/" + fighters[0] + "'/>")

            $("#characters").append("<h1 id='Fighter2'>" + getName(fighters[1]) + "<h1>")
            $("#characters").append("<img class='pic' id='rightFighter' src='img/" + fighters[1] + "'/>")

            switch(fight()){
                case 0:
                    $("#tieGame").show();
                    break;
                case 1:
                    $("#leftWon").show();
                    break;
                case 2:
                    $("#rightWon").show();
                    break;
            }
}
    