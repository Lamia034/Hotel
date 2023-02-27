<?php


  class connection{
    
    public static function connect() {
        $dsn = "mysql:host=localhost; dbname=hotel";
        $options = array(PDO::ATTR_PERSISTENT => true);

        try {
            $connection = new PDO($dsn, "root", "", $options);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }catch(PDOException $error) {
            echo "Connection failed: " . $error->getMessage();
        }
    }




    // public static function connect(){
    //     $servername='localhost:3306';
    //     $username='root';
    //     $password='';
    //     $dbname='hotel';

    //     $db = new mysqli($servername,$username, $password,$dbname); 

    //     return $db;
    // }





}

?>