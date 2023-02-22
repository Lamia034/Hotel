<?php


  class connection{





    public function connect(){
        $servername='localhost:3308';
        $username='root';
        $password='';
        $dbname='hotel';

        $db = new mysqli($servername,$username, $password,$dbname); 

        return $db;
    }





}

?>