<?php






// class HomeController{

//     public function index($page){
//         include('view/'.$page.'.php');
//     }
// }


class HomeController {
    public function index() {
        // Display the home page content here
        echo "Welcome to my website!";
        View::load('home');
    }
    public function index2() {
        // Display the home page content here
        echo "Welcome to my website!";
        View::load('test2');
    }
}