<?php
session_start();

if (!isset($_SESSION['username'])) {  //checks whether the admin is logged in
    header("Location: ../login.php");
}

if (isset($_POST['backBtn'])) {
    unset($_SESSION['id']);
    header("Location: music.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    </head>
    <body class="main">
        <div class="homecontainer">
            <h3>Edit</h3>
            <form method='post'>
            <input type="submit" name="backBtn" value="Back to Admin Music"/>
            </form>
            <hr width="60%"/>
            
            <div class="textDiv">
                <?php
                    
                    include '../../database.php';
                    
                    $conn = getDatabaseConnection();
                    
                    $sql = "SELECT * FROM music WHERE id = '" . $_SESSION['id']. "'";
                
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    $record = $records[0];
                ?>
                <form method='post'>
                    Title: <input name="music-title" type="text" value='<?=$record["Name"]?>'> <br/>
                    Artist: <input name="music-artist" type="text" value='<?=$record["Artist"]?>'> <br/>
                    Len(Min): <input name="music-length" type="text" value='<?=$record["LengthMin"]?>'> <br/>
                    Genre: <input name="music-genre" type="text" value='<?=$record["Genre"]?>'> <br/>
                    Album: <input name="music-album" type="text" value='<?=$record["Album"]?>'> <br/>
                    
                    <input type="submit" name="updateBtn" value="Update Song"/>
                    
                </form>
            </div>
        </div>
    </body>
</html>

<?php

if (isset($_POST['updateBtn']))
{
    $sql2 = "UPDATE music
             SET Name = :mtitle,
                 LengthMin  = :mlength,
                 Genre = :mgenre,
                 Artist = :martist,
                 Album = :malbum
             WHERE music.id = :mid";
     $np = array();
     
     $np[':mtitle'] = $_POST['music-title'];
     $np[':mlength'] = $_POST['music-length'];
     $np[':mgenre'] = $_POST['music-genre'];
     $np[':martist'] = $_POST['music-artist'];
     $np[':malbum'] = $_POST['music-album'];
     $np[':mid'] = $record["id"];

     
     $stmt2 = $conn->prepare($sql2);
     $stmt2->execute($np);
     
     unset($_SESSION['id']);
     header("Location: music.php");
}

?>