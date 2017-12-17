<?php
session_start();   //starts or resumes a session

include '../../database.php';
                    
$conn = getDatabaseConnection();

if (isset($_POST['editBtn']))
{
    $_SESSION['id'] = $_POST['editBtn'];
    header("Location: edit.php");
}

if (isset($_POST['deleteBtn']))
{
    $sql2 = "DELETE FROM `movies` WHERE id = '".$_POST['deleteBtn']."'";
                
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
}

?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    </head>
    <body class="main">
        <div class="homecontainer">
            <h1>Movies Admin Section</h1>

            <h3>Statistics</h3>
            <?php 
            
            $sql = "SELECT COUNT(id) FROM movies;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo "Number of Movies: " .$records[0]["COUNT(id)"];
            echo "<br/>";
            
            $sql = "SELECT MAX(LengthMin) AS LongestTime FROM movies;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo "Longest Run Time: " .$records[0]["LongestTime"]. " Minutes";
            echo "<br/>";
            
            $sql = "SELECT AVG(LengthMin) FROM movies;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo "Average Run Time: " .round($records[0]["AVG(LengthMin)"], 2). " Minutes";
            echo "<br/>";
            ?>

            <hr width="60%"/>
            <h3>Entries</h3>
            
            <form action="../admin.php">
                    <input type="submit" value="Back to Admin Home">
            </form>
            
            <form action="add.php">
                    <input type="submit" value="Add Entry">
            </form>

            <hr width="60%"/>
            <div class="textDiv">
                <?php
                    
                    $sql = "SELECT * FROM movies WHERE 1 ORDER BY Name Asc";
                
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Title</th>";
                    echo "</tr>";
                    
                    foreach($records as $record) {
                        echo "<tr>";
                        echo "<td style='text-align:left;'>". $record["Name"] ."</td>";
                        echo "<td>";
                        echo "<form method='post'><button type='submit' name='editBtn' value='".$record["id"]."'>Edit</button>";
                        echo "</td>";
                        echo "<td>";
                        echo "<button type='submit' name='deleteBtn' value='".$record["id"]."'>Delete</button></form>";
                        echo "</td>";
                    }
                    echo "</table>";
                    
                    // foreach($record as $rec)
                    // {
                    //     echo $rec['Name']."<br>";
                    // }
                ?>
            </div>
        </div>
    </body>
</html>
