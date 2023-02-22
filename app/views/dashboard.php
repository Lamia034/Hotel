<?php
session_start();
require_once '../controller/RoomsController.php';
require_once '../controller/ReservationsController.php';
// require_once '../alerts.php';
$data = new RoomController();
$rooms = $data->getAllRooms();


$dataa = new ReservationsController();
$reservations = $dataa->getAllReservations();

// $dataaa = new ReservationsController();
// $guests = $dataaa->getAllGuests($reservationId);

// $guests = $dataaa->getGuestsByReservationId($reservation['ReservationId']);


// $dataaa = new ReservationsController();
// $guests = $dataaa->getAllG();

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


<!--table-->

<center>
<h2 class="text-white mt-2 text-2xl bg-violet-600 rounded-md w-fit">Rooms:</h2><br>
<table  class="table" >
  <thead>
    <th >Image</th>
    <th >Room category</th>
    <th>Room Number</th>
    <th>Room Price</th>
    <th>Description</th>
    <th>edite/delete</th>
    <th>add new product</th>
  </thead>
  <tbody>
    <?php foreach($rooms as $room):?>
    <tr>
      <td class="text-center"><img src="./img/<?php echo $room['RoomImg'];?>" style="width: 100px;"></td>
      <td class="text-center"><?php echo $room['RoomCateg'];?></td>
      <td class="text-center"><?php echo $room['RoomNumber'];?></td>
      <td class="text-center"><?php echo $room['RoomPrice'];?></td>
      <td class="text-center"><?php echo $room['RoomDesc'];?></td>


      <td class=" space-x-4 justfy-center items-center text-center">
                    <form method="POST" class="me-1 inline-block align-middle" action="update.php">
                        <input type="hidden" name="RoomId" value="<?php echo $room['RoomId'];?>">
                        <button type="submit" name="submit" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        <!-- <input type="submit" name="submit" class="btn btn-sm btn-warning"> -->
                        
                    </form>
                    <form method="POST" class="me-1 inline-block align-middle" action="delete.php">
                        <input type="hidden" name="RoomId" value="<?php echo $room['RoomId'];?>">
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                    
                </td>
                <td>
                <form method="POST" class="me-1 justfy-center items-center text-center" action="add.php">
                        <input type="hidden" name="RoomId" value="<?php echo $room['RoomId'];?>">
                        <button class="btn btn-sm btn-danger "><i class="fa-solid fa-plus"></i></button>
                    </form>
    </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </center> <br><br>


    
<!--table 2-->
<center>
  <h2 class="text-white text-2xl bg-violet-600 rounded-md w-fit">Reservations you got:</h2><br>
<table  class="table" >
  <thead>
    <th >Client Name</th>
    <th >Room Type</th>
    <th>Guests Number</th>
    <th>Arriving Date</th>
    <th>Leaving Date</th>
    <th>Guests Informations</th>
  </thead>
  <tbody>
    <?php foreach($reservations as $reservation):?>
      <?php
        $dataaa = new ReservationsController();
        $reservationId = $reservation['ReservationId'];
        $guests = $dataaa->getAllGuests($reservationId);
      ?>
    <tr>
      <td><?php echo $reservation['ClientName'];?></td>
      <td><?php echo $reservation['RoomType'];?></td>
      <td><?php echo $reservation['GuestsNumber'];?></td>
      <td><?php echo $reservation['Arrive'];?></td>
      <td><?php echo $reservation['Leave'];?></td>
      <?php foreach ($guests as $guest): ?>
  
      <td class="flex flex-col"><?php echo $guest['GuestName'];?><br><?php echo $guest['GuestDOB'];?></td>
  
      <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </center>


 </body>
 </html>