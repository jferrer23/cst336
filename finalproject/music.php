<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body class="main">
        <div class="container">
            <h1>Hottest Music</h1>
            <div class="formDiv">
                <form >
                    Available Filters: <br />
                    Genre: 
                    <select id="dropdown" name="genrefilter">
                        <option value=""></option>
                        <option value='Alternative'>Alternative</option>
                        <option value='Alternative Rock'>Alternative Rock</option>
                        <option value='Classic Rock'>Classic Rock</option>
                        <option value='Electronic'>Electronic</option>
                        <option value='Hard Rock'>Hard Rock</option>
                        <option value='Indie Rock'>Indie Rock</option>
                        <option value='Pop'>Pop</option>
                        <option value='Rock'>Rock</option>
                    </select> <br />
                    
                    <input type="radio" name="order" value="ASC">Asc
                    <input type="radio" name="order" value="DESC">Desc
                    <input type="submit" value="Search" name="submit">
                </form>
                
                <form action="home.php">
                    <input type="submit" value="Back to home">
                </form>
            </div>
            
            <div class="textDiv">
                <?php
                    include 'database.php';
                    
                    $conn = getDatabaseConnection();
                    
                    $sql = "SELECT * FROM music";
                    if(isset($_GET['submit'])){
                        if(!empty($_GET['genrefilter']))
                        {
                            $sql .= " WHERE Genre = '" . $_GET['genrefilter'] . "'";
                        }
                        
                        if(isset($_GET['order']))
                        {
                            $sql .= " ORDER BY Name " . $_GET['order'];
                        }
                        else
                        {
                            $sql .= " ORDER BY Name Asc";
                        }
                    }
                    else{
                        $sql .= " ORDER BY Name Asc";
                    }
                    
                    
                    
                    //echo $sql;
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Title</th>";
                    echo "<th>Genre</th>";
                    echo "<th>Artist</th>";
                    echo "</tr>";
                    
                    foreach($records as $record) {
                        echo "<tr>";
                        echo "<td><button class='accordion'>". $record["Name"] ."</button>";
                        echo "<div class='panel'>";
                        
                        echo "<p>";
                        echo "Album Name: ". $record["Album"];
                        echo "</p>";
                        echo "<p>";
                        echo "Length: " . $record["LengthMin"] . " minutes";
                        echo "</p>";
                        
                        echo "</div>";
                        echo "</td>";
                        echo "<td>". $record["Genre"] ."</td>";
                        echo "<td>". $record["Artist"] ."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    
                    // foreach($records as $rec)
                    // {
                    //     echo $rec['Name']."<br>";
                    // }
                ?>
            </div>
        </div>
    <script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function(){
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        }
    }
    </script>
    </body>
</html>
