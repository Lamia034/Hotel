<?php
$reservations = ReservationsController::getAllReservations();
$rooms = RoomsController::getAllRooms();

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
<body class="bg-gradient-to-r from-cyan-300 to-blue-500 ">
<?php require_once VIEWS . 'header.php' ?>


<!--table-->

<center>
<h2 class="text-white mt-2 text-2xl bg-violet-600 rounded-md w-fit">Rooms:</h2><br>
<table  class="table" >
  <thead>
    <th >Image</th>
    <th >Suite Type</th>
    <th>Room Number</th>
    <th>Room Price</th>
    <th>Room Type</th>
    <th>edite/delete</th>
    <th>add new product</th>
  </thead>
  <tbody>
    <?php foreach($rooms as $room):?>
    <tr>
      <td class="text-center"><img src="<?php echo BaseUrl;?>assets/img/<?php echo $room['RoomImg'];?>" style="width: 100px;"></td>
      <td class="text-center"><?php echo $room['SuiteType'];?></td>
      <td class="text-center"><?php echo $room['RoomNumber'];?></td>
      <td class="text-center"><?php echo $room['RoomPrice'];?></td>
      <td class="text-center"><?php echo $room['RoomType'];?></td>


      <td class=" space-x-4 justfy-center items-center text-center">
                    <form method="POST" class="me-1 inline-block align-middle" action="<?php echo BaseUrl;?>home/update">
                        <input type="hidden" name="RoomId" value="<?php echo $room['RoomId'];?>">
                        <button type="submit" name="submit" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        <!-- <input type="submit" name="submit" class="btn btn-sm btn-warning"> -->
                        
                    </form>
                    <form method="POST" class="me-1 inline-block align-middle" action="<?php echo BaseUrl;?>rooms/deleteRoom">
                        <input type="hidden" name="RoomId" value="<?php echo $room['RoomId'];?>">
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                    
                </td>
                <td>
                <form method="POST" class="me-1 justfy-center items-center text-center" action="<?php echo BaseUrl ?>home/add">
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
  <h2 class="text-white text-2xl bg-violet-600 rounded-md w-fit ">Reservations you got:</h2><br>
<table  class="table mb-10" >
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