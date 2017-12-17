<?php
session_start();   //starts or resumes a session

function loginProcess() {

    if (isset($_POST['loginForm'])) {  //checks if form has been submitted
    
        include '../database.php';
        $conn = getDatabaseConnection();
      
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            
            $sql = "SELECT *
                    FROM   admin
                    WHERE  userName = :username 
                    AND    password = :password ";
            
            $namedParameters = array();
            $namedParameters[':username'] = $username;
            $namedParameters[':password'] = $password;

            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $record = $stmt->fetch();
            
            if (empty($record)) {
                
                echo "Wrong Username or password";
                
            } else {
                
               $_SESSION['username'] = $record['userName'];
               $_SESSION['adminName'] = $record['firstName'] . "  " . $record['lastName'];
               //echo $record['firstName'];
               header("Location: admin.php"); //redirecting to admin.php
                
            }
            //print_r($record);
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body class="main">
        <div class="homecontainer">
            <h1> Admin Login </h1>
            
            <form method="post">
                
                Username: <input onchange="validateUserName();" id="username" type="text" name="username"/> <br/><span id="username-valid"></span><span id="username-invalid"></span><br />
                
                Password: <input type="password" name="password" /> <br />
                
                <input type="submit" name="loginForm" value="Login!"/>
                
            </form>

            <br />
            
            <?=loginProcess()?>
        </div>
        <script src="js/script.js"></script>

    </body>
</html>
