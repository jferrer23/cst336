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
        
        
        foreach($records as $record) {
            echo $record["deviceName"]." $".$record["price"]."<br/>";
        }
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