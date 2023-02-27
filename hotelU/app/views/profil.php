<?php 

$reservations = ReservationsController::getPersonalReservations();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?php echo BaseUrl;?>assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- font awsome library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Pestana CR7</title>
</head>
<body>
<?php require_once VIEWS . 'header.php' ?>





<h2 class="text-xl text-center mt-1 ">Welcome again <?php echo $_SESSION['ClientName']; ?>!</h2>

<!--content-->
<h3 class="text-center">Your Reservations:</h3>
<div class="border-2  divide-solid ">

<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
<?php if (!empty($reservations)): ?>
    <?php foreach ($reservations as $reservation):?>
      <?php
        $dataaa = new ReservationsController();
        $reservationId = $reservation->ReservationId;
        $guests = $dataaa->getAllGuests($reservationId);
      ?> 

  
      
    <!--Card 1-->
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <?php if($reservation->RoomType == "single"): ?>
        <img class="rounded-t-lg" src="<?php echo BaseUrl;?>assets/img/8.jpg" alt="" />
        <?php elseif($reservation->RoomType == "double"):?>
        <img class="rounded-t-lg" src="<?php echo BaseUrl;?>assets/img/10.jpg" alt="" />
        <?php elseif($reservation->RoomType == "suite"):?>
            <img class="rounded-t-lg" src="<?php echo BaseUrl;?>assets/img/11.jpg" alt="" />
        <?php endif; ?>
    </a>
    <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $reservation->RoomType; ?></p>
        <div style="background-image: linear-gradient(to right, #f6d365 0%, #fda085 51%, #f6d365 100%);border-radius:4px;text-align:center;">
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $reservation->ReservationPrice; ?>dh</p>
        </div>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Arriving Date: <?php echo $reservation->Arrive;?></p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Leaving Date: <?php echo $reservation->Leave;?></p>
        <?php if (!empty($guests)): ?>
        <?php foreach ($guests as $guest): ?>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Guests Number: <?php echo $reservation->GuestsNumber;?></p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Guests informations:<?php echo $guest['GuestName'];?><br><?php echo $guest['GuestDOB'];?></p>
        <?php endforeach; ?>
        <?php endif; ?>
        <div class="flex flex-col md:flex-row md:max-w-md justify-center space-y-3 md:space-y-0 md:space-x-3">
  <a href="#" onclick="window.print()" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    Print Your Reservation
  </a>

<form method="POST" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" action="<?php echo BaseUrl; ?>reservations/deleteReservation" >
                        <input type="hidden" name="ReservationId" value="<?php echo $reservation->ReservationId;?>">
                        <button class="btn btn-sm btn-danger">Delete Reservation</button>
                    </form>
</div>
    </div>
</div>
<?php endforeach ;?>
<?php endif ;?>

  </div>
  </div>




  <?php require_once VIEWS . 'footer.php' ?>

<!--links-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?php BaseUrl ?>assets/js/script.js"></script>



















