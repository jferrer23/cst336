<?php

function getDatabaseConnection()
{
    
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b27252d3fdf511";
    $password = "0f2a27bd";
    $dbname= "heroku_802607ade1b72d2";

// Create connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    return $conn;
    
  }

?>