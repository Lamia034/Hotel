<?php

require_once '../controller/RoomsController.php';
require_once '../model/room.php';
require_once './dashboard.php';

if(isset($_POST['RoomId'])){
    $exitRoom = new RoomController();
    $exitRoom->deleteRoom();
}

?>