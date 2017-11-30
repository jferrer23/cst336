    var selectedWord = "";
    var selectedHint = "";
    var board = "";
    var remainingGuesses = 6;
    var words = ["snake", "monkey", "beetle"];
    
        
    window.onload = startGame;

    
    function startGame() {
        pickWord();
        initBoard();
        updateBoard();
        generateLetters()
    }
    
     function initBoard() {
        for (var letter in selectedWord) {
            board += '_';
        }
    }
    
    function pickWord() {
        var randomIndex = Math.floor(Math.random()*words.length);
        selectedWord = words[randomIndex].toUpperCase();
    }
    
    function updateBoard() {
        for (var letter of board) {
            //document.getElementById("word").innerHTML += letter + " ";
            $("#word").append(letter + " ");
        }
    }
    
    function generateLetters() {
        var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        
        for(var letter in alphabet) {
            $("#letters").append("<button class='letter' id='" + alphabet[letter] + "'>" + alphabet[letter] + "</button>");
        }
        
        $(".letter").click(function() {
            console.log($(this).attr("id"));
        });
    }
    
    
    
    function checkLetter(letter) {
        var positions = new Array();
        
        for( var i = 0; i < selectedWord.length; i++) {
            console.log(selectedWord);
            if(letter == selectedWord[i]) {
                positions.push(i);
            }
            
            if(positions.length > 0) {
                updateWord(positions, letter);
            } else {
                remainingGuesses -= 1;
            }
        }
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    