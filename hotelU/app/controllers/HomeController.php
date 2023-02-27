<?php


class HomeController {
    public function index() {
        // echo "Welcome to my website!";
        View::load('home');
    }
    public function reservation() {
        // echo "Welcome to my website!";
        View::load('reservation');
    }
    public function profil() {
        if(isset($_SESSION['ClientId'])){
            View::load('profil');
        }else{
            View::load('login');
        }
       
    }
    public function dashboard() {
        if(isset($_SESSION['ClientName'])&& $_SESSION['ClientName']==='admin'){
            View::load('dashboard');
        }else{
            View::load('login');
        }
       
    }
    public function aboutus() {
  
        View::load('aboutus');
    }
    public function login() {

        View::load('login');
    }
    public function register() {
 
        View::load('register');
    }
    public function logout() {

        View::load('logout');
    }

    public function add() {

        View::load('add');
    }

    public function update() {

        View::load('update');
    }

    // public function index2() {
    //     // Display the home page content here
    //     echo "Welcome to my website!";
    
    // }
}