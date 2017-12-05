<?php

//connect to mySQL server
function getDatabaseConnection() {
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $usename = "b5ef0ff978a3a9";
    $password = "b7e9923b";
    $dbname = "heroku_79a2980329c7868";
    
    //Creacte Connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $usename, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

function getUsersThatMatchUsername() {
    $username = $_GET['username'];
    
    $dbConn = getDatabaseConnection();
    
    $sql = "SELECT * from user WHERE username='$username'";
    $statement = $dbConn->prepare($sql);
    
    $statement->execute();
    $records = $statement->fetchAll();
    
    json_encode($records);
}

function validatePassword() {
    $username = $_GET['username'];
    $password = $_GET['password'];
}

if($_GET['action']=='validate-username'){
    getUsersThatMatchUsername();
} else if ($_GET['action']=='validate-password')

?>