<?php
    include "database.php";
    
    function displayDeviceList()
    {
        $dbConn = getDatabaseConnection();
        $sql = "SELECT * from device WHERE 1";
        $named_parameters = array();
        
        if(isset($_GET['submit'])){
            if(!empty($_GET['device-name'])){
                //construct our sql query accordingly
                $sql .= " AND deviceName LIKE :deviceName";
                $named_parameters[':deviceName'] = "%" . $_GET['device-name'] . "%";
            }
            
            if(!empty($_GET['device-type'])){
                //construct our sql query accordingly
                $sql .= " AND deviceType = '". $_GET['device-type'] . "'";
            }
            
            if(isset($_GET['available'])){
                //construct our sql query accordingly
                $sql .= " AND status = 'available'";
            }
            
            if(isset($_GET['order-by'])){
                //construct our sql query accordingly
                $sql .= " ORDER BY " . $_GET['order-by'];
            }
            else{
                $sql .= " ORDER BY deviceName";
            }
           
        }
        else
        {
            $sql .= " ORDER BY deviceName";
        }
        
        $statement = $dbConn->prepare($sql);
        $statement->execute($named_parameters);
        
        $records = $statement->fetchAll();
        
        echo "<table>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Type</th>";
        echo "<th>Price</th>";
        echo "<th>Status</th>";
        echo "</tr>";
        foreach($records as $record) {
            echo "<tr>";
            echo "<td>". $record["deviceName"] ."</td>";
            echo "<td>". $record["deviceType"] ."</td>";
            echo "<td>$". $record["price"] ."</td>";
            echo "<td>". $record["status"] ."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
    
   
    function getDeviceTypes()
    {
        $dbConn = getDatabaseConnection();
        $sql = "SELECT DISTINCT(deviceType) from device;";
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        
        $records = $statement->fetchAll();
        
        foreach($records as $record) {
            echo "<option value='" . $record["deviceType"] . "'>" . $record["deviceType"] . "</option>";
        }
    }

?><?php
    include "database.php";
    
    function displayDeviceList()
    {
        $dbConn = getDatabaseConnection();
        $sql = "SELECT * from device WHERE 1";
        $named_parameters = array();
        
        if(isset($_GET['submit'])){
            if(!empty($_GET['device-name'])){
                //construct our sql query accordingly
                $sql .= " AND deviceName LIKE :deviceName";
                $named_parameters[':deviceName'] = "%" . $_GET['device-name'] . "%";
            }
            
            if(!empty($_GET['device-type'])){
                //construct our sql query accordingly
                $sql .= " AND deviceType = '". $_GET['device-type'] . "'";
            }
            
            if(isset($_GET['available'])){
                //construct our sql query accordingly
                $sql .= " AND status = 'available'";
            }
            
            if(isset($_GET['order-by'])){
                //construct our sql query accordingly
                $sql .= " ORDER BY " . $_GET['order-by'];
            }
            else{
                $sql .= " ORDER BY deviceName";
            }
           
        }
        else
        {
            $sql .= " ORDER BY deviceName";
        }
        
        $statement = $dbConn->prepare($sql);
        $statement->execute($named_parameters);
        
        $records = $statement->fetchAll();
        
        echo "<table>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Type</th>";
        echo "<th>Price</th>";
        echo "<th>Status</th>";
        echo "</tr>";
        foreach($records as $record) {
            echo "<tr>";
            echo "<td>". $record["deviceName"] ."</td>";
            echo "<td>". $record["deviceType"] ."</td>";
            echo "<td>$". $record["price"] ."</td>";
            echo "<td>". $record["status"] ."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
    
   
    function getDeviceTypes()
    {
        $dbConn = getDatabaseConnection();
        $sql = "SELECT DISTINCT(deviceType) from device;";
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        
        $records = $statement->fetchAll();
        
        foreach($records as $record) {
            echo "<option value='" . $record["deviceType"] . "'>" . $record["deviceType"] . "</option>";
        }
    }

?>