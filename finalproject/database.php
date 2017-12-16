<?php

function getDatabaseConnection()
    {
    
        $host = "us-cdbr-iron-east-05.cleardb.net";
        $usename = "b5ef0ff978a3a9";
        $password = "b7e9923b";
        $dbname = "heroku_79a2980329c7868";
    
        //Creacte Connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $usename, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConn;
    
    }


?>