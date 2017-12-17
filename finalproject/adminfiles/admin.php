<?php
session_start();

if (!isset($_SESSION['username'])) {  //checks whether the admin is logged in
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <title>Admin Main Page </title>
        <script>
            function confirmDelete() {
                
                return confirm("Are you sure you want to delete this user?");
            }
        </script>
    </head>
    <body class="main">
        <div class="homecontainer">
            <h1> Admin Main </h1>
            <h2> Welcome <?=$_SESSION['adminName']?>!</h2>
            
            <hr width="60%"/>
            <div class="formDiv">
                <form action="movies/movies.php">
                    <input type="submit" value="Movies">
                </form>
                
                <form action="music/music.php">
                    <input type="submit" value="Music">
                </form>
                
                <form action="tvshows/tv.php">
                    <input type="submit" value="Tv Shows">
                </form>
            </div>
            
            <hr width="60%"/>
            <form action="logout.php">
                <input type="submit" value="Logout!" />
            </form>
        </div>
    </body>
</html>