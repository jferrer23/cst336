    var selectedWord = "";
    var selectedHint = "";
    var board = "";
    var remainingGuesses = 6;
    var words = ["snake", "monkey", "beetle"];
    
    function startGame() {
        pickWord();
        initBoard();
        updateBoard();
        generateLetters()
    }
    
    var randomNum = Math.floor(Math.random() * 11) + 10;
    
    function pickWord() {
        var randomIndex = Math.floor(Math.random()*words.length);
        selectedWord = words[randomIndex];
    }
    
    function initBoard() {
        for (var letter in selectedWord) {
            board += '_';
        }
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
    }
    
    window.onload = startGame;

    
    