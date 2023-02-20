
<?php
require_once('../controller/usersController.php');

if(isset($_POST['submit'])){
    $registerUser = new UsersController();
    $registerUser->register();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- font awsome library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lustrio Hotel</title>
</head>
<body class="bg">
<!-- navbra -->
<nav class=" flex fixed  bg-black justify-center items-center text-center   pr-20 w-full sticky top-0 ">
      <!-- Left Navigation -->
      <div class="hidden sm:flex">
      <a href="home.php" class="mx-2 text-white hover:bg-gray-700 hover:text-white px-3 py-4 rounded-md text-sm font-medium" >Reception</a>
  
  <a href="aboutus.php" class="mx-2  text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-4 rounded-md text-sm font-medium">About Us</a>
  <a href="reservation.php" class="mx-2  text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-4 rounded-md text-sm font-medium">Reservation</a>
        <!-- <a class="mx-2">LINK ONE</a>
        <a class="mx-2">LINK TWO</a> -->
      </div>
      <!-- Logo -->
      
      <div class="mx-12  ">   <img class="hidden h-16  w-auto lg:block cursor-pointer " src="img/logo.png" alt="Your Company"></div>
      <!-- Right Navigation -->
      <div class="hidden sm:flex">
      <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['ClientName'] === 'admin'): ?>
        <a class="mx-2 hover:bg-gray-700 text-white hover:text-white px-3 py-4" href="./dashboard.php">Welcome,<?php echo $_SESSION['ClientName']; ?>!</a>
        <a class="mx-2 hover:bg-gray-700 text-white hover:text-white px-3 py-4" href="./logout.php">Log Out</a>
        <?php elseif(isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['ClientName'] !== 'admin'): ?>
          <a class="mx-2 hover:bg-gray-700 text-white hover:text-white px-3 py-4" href="./profil.php">Welcome,<?php echo $_SESSION['ClientName']; ?>!</a>
        <a class="mx-2 hover:bg-gray-700 text-white hover:text-white px-3 py-4" href="./logout.php">Log Out</a>
        <?php else: ?>
          <a class="mx-2 hover:bg-gray-700 text-white hover:text-white px-3 py-4" href="./register.php">Sign Up</a>
          <a class="mx-2 hover:bg-gray-700 text-white hover:text-white px-3 py-4" href="./login.php">Sign In</a>
        <?php endif; ?>
      </div>

      <div class="absolute y-0 right-1 top-1 sm:hidden">
          <!-- Mobile menu button-->

          <div class="block lg:hidden ">
                <button
                    id="nav"
                    class="flex items-center px-3 py-2 border-2 rounded text-white border-white hover:text-yellow-700 hover:border-yellow-700 mobile-menu-button">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
                </button>
            </div>
        </div>
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">

<div class="space-y-1 px-2 pt-10 pb-3">
  <!-- <a href="#"> -->
  <a href="home.php" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Reception</a>
 
  <a href="aboutus.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">About Us</a>

  <a href="reservation.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Reservation</a>

  <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['ClientName'] === 'admin'): ?>
  <a href="dashboard.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Welcome <?php echo $_SESSION['ClientName']; ?>!</a>

  <a href="logout.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Log Out</a>
  <?php elseif(isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['ClientName'] !== 'admin'): ?>
    <a href="profil.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Welcome <?php echo $_SESSION['ClientName']; ?>!</a>

<a href="logout.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Log Out</a>
  <?php else: ?>
    <a href="register.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Sign Up</a>

<a href="login" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Sign In</a>
    <?php endif; ?>
</div>
</div>
    </nav>
<!--register form-->
<form class="bg-grey-lighter min-h-screen flex flex-col" method="post">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Sign up</h1>
            <input 
                type="text"
                class="block border border-grey-light w-full p-3 rounded mb-4"
                name="ClientName"
                placeholder="Full Name" />

            <input 
                type="text"
                class="block border border-grey-light w-full p-3 rounded mb-4"
                name="Email"
                placeholder="Email" />

            <input 
                type="password"
                class="block border border-grey-light w-full p-3 rounded mb-4"
                name="Password"
                placeholder="Password" />
            <!-- <input 
                type="password"
                class="block border border-grey-light w-full p-3 rounded mb-4"
                name="onfirm_password"
                placeholder="Confirm Password" /> -->

            <button
                type="submit" name="submit" value="submit"
                class="w-full text-center py-3 rounded bg-green text-black hover:bg-green-dark focus:outline-none my-1"
            >Create Account</button>

            <div class="text-center text-sm text-grey-dark mt-4">
              <div class="text-grey-dark mt-6">
                Already have an account? 
                <a class="no-underline border-b border-blue text-blue" href="../login/">
                    Log in
                </a>.
            </div>
            </div>
        </div>

    
    </div>
</form>




  </body>
  </html>