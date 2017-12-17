<?php
session_start();

if (!isset($_SESSION['username'])) {  //checks whether the admin is logged in
    header("Location: ../login.php");
}

if (isset($_POST['backBtn'])) {
    unset($_SESSION['id']);
    header("Location: tv.php");
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
            <input type="submit" name="backBtn" value="Back to Admin TV Shows"/>
            </form>
            <hr width="60%"/>
            
            <div class="textDiv">
                <?php
                    
                    include '../../database.php';
                    
                    $conn = getDatabaseConnection();
                    
                    $sql = "SELECT * FROM tvshows WHERE id = '" . $_SESSION['id']. "'";
                
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    $record = $records[0];
                ?>
                <form method='post'>
                    Title: <input name="tv-title" type="text" value='<?=$record["Name"]?>'> <br/>
                    Creator: <input name="tv-creator" type="text" value='<?=$record["Program Creator"]?>'> <br/>
                    Seasons: <input name="tv-seasons" type="text" value='<?=$record["Seasons"]?>'> <br/>
                    Genre: <input name="tv-genre" type="text" value='<?=$record["Genre"]?>'> <br/>
                    Summary: <br />
                    130 Characters Only <br/>
                    <textarea name="tv-summary" rows="10" cols="30"><?=$record["Summary"]?></textarea> <br/>
                    
                    <input type="submit" name="updateBtn" value="Update TV Show"/>
                    
                </form>
            </div>
        </div>
    </body>
</html>

<?php

if (isset($_POST['updateBtn']))
{
    $sql2 = "UPDATE tvshows
             SET Name = :mtitle,
                 Seasons  = :mseasons,
                 Genre = :mgenre,
                 `Program Creator` = :mcreator,
                 Summary = :msummary
             WHERE tvshows.id = :mid";
     $np = array();
     
     $np[':mtitle'] = $_POST['tv-title'];
     $np[':mseasons'] = $_POST['tv-seasons'];
     $np[':mgenre'] = $_POST['tv-genre'];
     $np[':mcreator'] = $_POST['tv-creator'];
     $np[':msummary'] = $_POST['tv-summary'];
     $np[':mid'] = $record["id"];

     
     $stmt2 = $conn->prepare($sql2);
     $stmt2->execute($np);
     
     unset($_SESSION['id']);
     header("Location: tv.php");
}

?>