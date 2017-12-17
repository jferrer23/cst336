<?php
session_start();

if (!isset($_SESSION['username'])) {  //checks whether the admin is logged in
    header("Location: ../login.php");
}

if (isset($_POST['backBtn'])) {
    unset($_SESSION['id']);
    header("Location: movies.php");
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
            <input type="submit" name="backBtn" value="Back to Admin Movies"/>
            </form>
            <hr width="60%"/>
            
            <div class="textDiv">
                <?php
                    
                    include '../../database.php';
                    
                    $conn = getDatabaseConnection();
                    
                    $sql = "SELECT * FROM movies WHERE id = '" . $_SESSION['id']. "'";
                
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    $record = $records[0];
                ?>
                <form method='post'>
                    Title: <input name="movie-title" type="text" value='<?=$record["Name"]?>'> <br/>
                    Director: <input name="movie-director" type="text" value='<?=$record["Director"]?>'> <br/>
                    Len(Min): <input name="movie-length" type="text" value='<?=$record["LengthMin"]?>'> <br/>
                    Genre: <input name="movie-genre" type="text" value='<?=$record["Genre"]?>'> <br/>
                    Summary: <br />
                    130 Characters Only <br/>
                    <textarea name="movie-summary" rows="10" cols="30"><?=$record["Summary"]?></textarea> <br/>
                    
                    <input type="submit" name="updateBtn" value="Update Movie"/>
                    
                </form>
            </div>
        </div>
    </body>
</html>

<?php

if (isset($_POST['updateBtn']))
{
    $sql2 = "UPDATE movies
             SET Name = :mtitle,
                 LengthMin  = :mlength,
                 Genre = :mgenre,
                 Director = :mdirector,
                 Summary = :msummary
             WHERE movies.id = :mid";
     $np = array();
     
     $np[':mtitle'] = $_POST['movie-title'];
     $np[':mlength'] = $_POST['movie-length'];
     $np[':mgenre'] = $_POST['movie-genre'];
     $np[':mdirector'] = $_POST['movie-director'];
     $np[':msummary'] = $_POST['movie-summary'];
     $np[':mid'] = $record["id"];

     
     $stmt2 = $conn->prepare($sql2);
     $stmt2->execute($np);
     
     unset($_SESSION['id']);
     header("Location: movies.php");
}

?>