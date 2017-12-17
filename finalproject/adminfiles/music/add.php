<?php
session_start();

if (!isset($_SESSION['username'])) {  //checks whether the admin is logged in
    header("Location: ../login.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    </head>
    <body class="main">
        <div class="homecontainer">
            <h3>Fill In Music Info</h3>
            <form action="music.php">
                    <input type="submit" value="Back to Admin Music">
            </form>
            <hr width="60%"/>
            
            <div class="textDiv">
                <?php
                    
                    include '../../database.php';
                    $conn = getDatabaseConnection();
                    
                ?>
                <form method='post'>
                    Title: <input name="music-title" type="text" value='Music Title'> <br/>
                    Artist: <input name="music-artist" type="text" value='Artist'> <br/>
                    Len(Min): <input name="music-length" type="text" value='4'> <br/>
                    Genre: <input name="music-genre" type="text" value='Genre'> <br/>
                    Album: <input name="music-album" type="text" value='Album'> <br/>
                    
                    <input type="submit" name="addBtn" value="Add Song"/>
                    
                </form>
            </div>
        </div>
    </body>
</html>

<?php

if (isset($_POST['addBtn']))
{
     $sql2 = "INSERT INTO `music`(`Name`, `LengthMin`, `Genre`, `Artist`, `Album`, `Price`) VALUES (:mtitle,:mlength,:mgenre,:martist,:malbum,:mprice)";


     $np = array();
     
     $np[':mtitle'] = $_POST['music-title'];
     $np[':mlength'] = $_POST['music-length'];
     $np[':mgenre'] = $_POST['music-genre'];
     $np[':martist'] = $_POST['music-artist'];
     $np[':malbum'] = $_POST['music-album'];
     $np[':mprice'] = 5.99;

     
     $stmt2 = $conn->prepare($sql2);
     $stmt2->execute($np);
     
     header("Location: music.php");
}

?>