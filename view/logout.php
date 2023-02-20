<?php 

include_once('../app/classes/Redirect.php');

session_start();
session_destroy();

Redirect::to('home.php');

?>