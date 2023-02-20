<?php
session_start();
require_once '../model/reservations.php';
require_once '../controller/ReservationsController.php';
require_once '../database/DB.php';


if(isset($_POST['add'])){
    $newReservation = new ReservationsController();
    $newReservation->addReservation();
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



  <!-- start -->
<!-- component -->
<div class="flex items-center justify-center p-12">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="mx-auto w-full max-w-[550px]">
    <form action="" id="reservation-form" method="POST">
      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
              for="ClientName"
              class="mb-3 block text-base font-medium text-[#07074D]">
              Full Name
            </label>
            <input
              type="text" name="ClientName" id="fName" placeholder="Full Name"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
        </div>





        <div  class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
          <label for="room-type"  class="mb-3 px-20 block text-base font-medium text-[#07074D]">Room Type:</label>
<select id="room-type" onchange="handleRoomTypeChange()" name="RoomType" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3.5 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
<option value="single" onclick="handleRoomTypeSelection()">Single</option>
    <option value="double" onclick="handleRoomTypeSelection()">Double</option>
    <option value="suite" onclick="handleRoomTypeSelection()">Suite</option>
</select>
    </div>
    </div>

      </div>


      <div id="suite-type-container" class="w-full px-3 sm:w-1/2" style="display: none;">
      <div class="mb-5">
    <label for="suite-type" class="mb-3 px-20 block text-base font-medium text-[#07074D]" >Suite Type:</label>
    <select id="suite-type" onchange="handleRoomTypeChange()" name="SuiteType" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3.5 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" >
    <option value="--">--</option>
      <option value="standard" onclick="handleRoomTypeSelection()">Standard</option>
      <option value="junior"onclick="handleRoomTypeSelection()">Junior</option>
      <option value="presidential" onclick="handleRoomTypeSelection()">Presidential</option>
      <option value="penthouse" onclick="handleRoomTypeSelection()">Penthouse</option>
      <option value="honeymoon" onclick="handleRoomTypeSelection()">Honeymoon</option>
      <option value="bridal" onclick="handleRoomTypeSelection()">Bridal</option>
    </select>
  </div>
    </div>




      <div class="mb-5">
        <label
        for="guest-count" class="mb-3 block text-base font-medium text-[#07074D]" >
          How many guest are you bringing?(don't fill it if you're alone)
        </label>
        <input
          type="number"
          name="GuestsNumber"
          id="guest-count"
          placeholder="5"
          min="0"
          onchange="handleGuestCountChange()"
          class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
      </div>

<!--every single's informations-->
      <div class="mb-5">
      <div id="guest-info-container" style="display:none;">





      </div>

    </div>

<!--end every single's informations-->
      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
            for="Arrive"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
            Reservation Date:
            </label>
            <input type="date" name="Arrive" id="reservation-date"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
          </div>
          
        </div>
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
            for="Leave"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
            Leaving Date:
            </label>
            <input type="date" name="Leave" id="reservation-date"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
          </div>
          
        </div>
        </div>


   
        <label for="price-input">Price:</label>
      <input type="text" id="price-input" name="ReservationPrice"  readonly>
      <div>
        <button
          class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none" name="add" value="add"
        >
          Submit
        </button>
      </div>
    </form>
  </div>
</div>





<script src="./js/script.js"></script>
