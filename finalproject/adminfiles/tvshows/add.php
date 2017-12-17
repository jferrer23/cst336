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
            <h3>Fill In TV Show Info</h3>
            <form action="tv.php">
                    <input type="submit" value="Back to Admin TV Shows">
            </form>
            <hr width="60%"/>
            
            <div class="textDiv">
                <?php
                    
                    include '../../database.php';
                    $conn = getDatabaseConnection();
                    
                ?>
                <form method='post'>
                    Title: <input name="tv-title" type="text" value='TV Show Title'> <br/>
                    Creator: <input name="tv-creator" type="text" value='Program Creator'> <br/>
                    Seasons: <input name="tv-seasons" type="text" value='10'> <br/>
                    Genre: <input name="tv-genre" type="text" value='Genre'> <br/>
                    Summary: <br />
                    130 Characters Only <br/>
                    <textarea name="tv-summary" rows="10" cols="30">Don't Exceed 130 Characters Please</textarea> <br/>
                    
                    <input type="submit" name="addBtn" value="Add TV Show"/>
                    
                </form>
            </div>
        </div>
    </body>
</html>

<?php

if (isset($_POST['addBtn']))
{
     $sql2 = "INSERT INTO `tvshows`(`Name`, `Seasons`, `Genre`, `Program Creator`, `Price`, `Summary`) VALUES (:mtitle,:mseasons,:mgenre,:mcreator,:mprice,:msummary)";


     $np = array();
     
     $np[':mtitle'] = $_POST['tv-title'];
     $np[':mseasons'] = $_POST['tv-seasons'];
     $np[':mgenre'] = $_POST['tv-genre'];
     $np[':mcreator'] = $_POST['tv-creator'];
     $np[':msummary'] = $_POST['tv-summary'];
     $np[':mprice'] = 9.99;

     
     $stmt2 = $conn->prepare($sql2);
     $stmt2->execute($np);
     
     header("Location: tv.php");
}

?>