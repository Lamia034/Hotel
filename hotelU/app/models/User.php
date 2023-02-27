<?php

class User{

    
    public static function login($data){
        $Email = $data['Email'];
        try{
            $query = 'SELECT * FROM clients WHERE Email = :Email';  
            $stmt = connection::connect()->prepare($query);
            // $stmt->execute(array(":Email" => $Email));
          
            if($stmt->execute(array(":Email" => $Email))){
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                return $user;
            }
        }catch(PDOException $ex){
            echo 'error' . $ex->getMessage();
        }
      }
    
    static public function createUser($data){
        try{
        $stmt = connection::connect()->prepare('INSERT INTO clients (ClientName,Email,Password) VALUES (:ClientName,:Email,:Password)');
        $stmt->bindParam(':ClientName',$data['ClientName']);
        $stmt->bindParam(':Email',$data['Email']);
        $stmt->bindParam(':Password',$data['Password']);
        if($stmt->execute()){
            return 'ok';
        }
        }catch(PDOException $ex){
            echo 'error' . $ex->getMessage();
        }

        $stmt = null;
    }
}
?>