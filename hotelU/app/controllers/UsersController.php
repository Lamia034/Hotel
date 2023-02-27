<?php



class UsersController {

  

    public function auth(){
     
        if(isset($_POST['submit'])){
           
            $data['Email'] = $_POST['Email'];
            $result = user::login($data);
            // var_dump($result->ClientName);
            $hashed_password = $result->Password;
        //    $hash_pass = $_POST['Password'];
       
            // $hashed_password = $result->Password;
            if( $result->Email === "lamia@gmail.com" &&  password_verify($_POST['Password'], $hashed_password)){   
                //  password_verify($result->password, $hashed_password)
                $_SESSION['logged'] = true;
                $_SESSION['ClientName'] = $result->ClientName;
                $_SESSION['ClientId'] = $result->ClientId;
               
                header('location: ' . BaseUrl . 'home/dashboard');
            } else if( $result->Email === $_POST['Email'] &&  password_verify($_POST['Password'], $hashed_password)){   
                //  password_verify($result->password, $hashed_password)
                $_SESSION['logged'] = true;
                $_SESSION['ClientName'] = $result->ClientName;
                $_SESSION['ClientId'] = $result->ClientId;
               
                header('location: ' . BaseUrl . 'home/profil');
            } else {
                $_SESSION['logged'] = false;

                header('location: ' . BaseUrl . 'home/login');
            }
        }
    }
    public function register(){
        if(isset($_POST['submit'])){
            $Password = $_POST['Password'];
            $hashed_password = password_hash($Password, PASSWORD_BCRYPT);
      
            //   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
           
            $data = array(
                'ClientName' => $_POST['ClientName'],
                'Email' => $_POST['Email'],
                // 'Password' => $_POST['Password'],
                'Password' => $hashed_password,
                
            );
            $result = User::createUser($data);
            if($result === 'ok'){

                header('location: ' . BaseUrl .'home/login');
            }else{
                echo $result;
            }
        }
    }
    static public function logout(){
        session_destroy();
    }
}