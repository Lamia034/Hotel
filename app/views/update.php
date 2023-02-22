<?php

require_once '../model/room.php';
require_once '../controller/RoomsController.php';
require_once '../database/DB.php';

if(isset($_POST['RoomId'])){
    $exitRoom = new RoomController();
    $room = $exitRoom->getOneRoom();
}

if(isset($_POST['submit'])){
    $exitRoom = new RoomController();
    $prod = $exitRoom->getOneRoom();
}

if(isset($_POST['update'])){
    $exitRoom = new RoomController();
        $update =  $exitRoom->updateRoom();
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
<body style="background-image: linear-gradient(0deg,rgb(55, 4, 59),#3F9DF4);height: 830px;">

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


<center>

  
   
  <form method="POST" enctype="multipart/form-data" >
  <h2 style="color:white">Update</h2>
   <div class="form-group">
  
   <label for="RoomNumber">Room Number</label><br>
   <input placeholder="RoomNumber" value="<?php echo $prod->RoomNumber; ?>" type="number" name="RoomNumber" class="form-control" >  <br>
   <input type="hidden" name="RoomId" value="<?php echo $prod->RoomId;?>"> <br>

   <label for="RoomPrice"> Room Price</label><br>
   <input value="<?php echo $prod->RoomPrice; ?>" type="number" name="RoomPrice" class="form-control" placeholder="price"><br>

   <label for="RoomCateg">Room Category</label><br>
   <input value="<?php echo $prod->RoomCateg; ?>" type="text" name="RoomCateg" class="form-control" placeholder="room category"><br>

   <label for="RoomDesc">Description</label><br>
   <input value="<?php echo $prod->RoomDesc; ?>" type="text" name="RoomDesc" class="form-control" placeholder="room description"><br>

   <label for="RoomImg"  value="<?php echo $prod->RoomImg; ?>"> IMAGE</label><br>


   <input type="file" name="RoomImg" class="form-control" ><br>
   
   <button  type="submit" class="form-control btn btn-primary" name="update" value="submit">update</button>
   </div>

  </form>
   
    


<center>