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
            <h3>Fill In Movie Info</h3>
            <form action="movies.php">
                    <input type="submit" value="Back to Admin Movies">
            </form>
            <hr width="60%"/>
            
            <div class="textDiv">
                <?php
                    
                    include '../../database.php';
                    $conn = getDatabaseConnection();
                    
                ?>
                <form method='post'>
                    Title: <input name="movie-title" type="text" value='Movie Title'> <br/>
                    Director: <input name="movie-director" type="text" value='Director'> <br/>
                    Len(Min): <input name="movie-length" type="text" value='120'> <br/>
                    Genre: <input name="movie-genre" type="text" value='Genre'> <br/>
                    Summary: <br />
                    130 Characters Only <br/>
                    <textarea name="movie-summary" rows="10" cols="30">Don't Exceed 130 Characters Please</textarea> <br/>
                    
                    <input type="submit" name="addBtn" value="Add Movie"/>
                    
                </form>
            </div>
        </div>
    </body>
</html>

<?php

if (isset($_POST['addBtn']))
{
     $sql2 = "INSERT INTO `movies`(`Name`, `LengthMin`, `Genre`, `Director`, `Price`, `Summary`) VALUES (:mtitle,:mlength,:mgenre,:mdirector,:mprice,:msummary)";


     $np = array();
     
     $np[':mtitle'] = $_POST['movie-title'];
     $np[':mlength'] = $_POST['movie-length'];
     $np[':mgenre'] = $_POST['movie-genre'];
     $np[':mdirector'] = $_POST['movie-director'];
     $np[':msummary'] = $_POST['movie-summary'];
     $np[':mprice'] = 9.99;

     
     $stmt2 = $conn->prepare($sql2);
     $stmt2->execute($np);
     
     header("Location: movies.php");
}

?>