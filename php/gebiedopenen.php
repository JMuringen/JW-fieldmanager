<?php

class Polygon
{
    static $_dbHost     = 'localhost'; 
    static $_dbName     = 'jwtdv';   
    static $_dbUserName = 'root';  
    static $_dbUserPwd  = '1234';
     
    // get coordinates
    static public function getCoords()
    {
        return self::get();
    }
     
    // save coordinates
    static public function saveCoords($rawData)
    {
        self::save($rawData);
    }
     
    // save lat/lng to database
    static public function save ($data)
    {
        $con = mysql_connect(self::$_dbHost, self::$_dbUserName, self::$_dbUserPwd);
         
        // connect to database
        if (!$con) {
            die('Could not connect: ' . mysql_error());
        }
         
        mysql_select_db(self::$_dbName, $con);
         
        // delete old data
        mysql_query("DELETE FROM gebied");
         
        // insert data
        mysql_query("INSERT INTO gebied (Code) VALUES ($data)");
         
        // close connection
        mysql_close($con);
    }  
     
    // get lat/lng from database
    static private function get()
    {  
        $con = mysql_connect(self::$_dbHost, self::$_dbUserName, self::$_dbUserPwd);
         
        // connect to database
        if (!$con) {
            die('Could not connect: ' . mysql_error());
        }
         
        mysql_select_db(self::$_dbName, $con);
         
        $result = mysql_query("SELECT * FROM gebied");
                 
        $data   = false;
         
        while($row = mysql_fetch_array($result,MYSQL_ASSOC))
        {
            $data = $row['Code'];
        }
         
        // close connection
        mysql_close($con);     
         
        return $data;
    }
     
}

?>