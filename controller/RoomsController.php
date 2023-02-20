<?php 
require_once '../model/room.php';
require_once '../database/DB.php';

class RoomController{

	public function getAllRooms(){
		$rooms = room::getAll();
		return $rooms;
	}

	public function getOneRoom(){
		if(isset($_POST['RoomId'])){
			$data = array(
				'RoomId' => $_POST['RoomId']
			);
			$room = room::getRoom($data);
			return $room;
		}
	}
	

	public function addRoom(){
		if(isset($_POST['add'])){
			// if (isset($_POST['img'])) {
			// 	$data['img'] = $_POST['img'];
			// }
			$data = array(
				'RoomNumber' => $_POST['RoomNumber'],
				'RoomImg' => $_FILES['RoomImg']['name'],
				'RoomPrice' => $_POST['RoomPrice'],
				'RoomDesc' => $_POST['RoomDesc'],
				'RoomCateg' => $_POST['RoomCateg'],
				
			
			);
			$result = room::add($data);
			if($result === 'ok'){
				session::set('success','room added');
				Redirect::to('home.php');
			}else{
				echo $result;
			}
		}
	}

	public function updateRoom(){
	
			if(isset($_POST['update'])){
       $data = array(
				'RoomId' => $_POST['RoomId'],
				'RoomNumber' => $_POST['RoomNumber'],
				'RoomPrice' => $_POST['RoomPrice'],
				'RoomDesc' => $_POST['RoomDesc'],
				'RoomCateg' => $_POST['RoomCateg'],
				'RoomImg' => $_POST['RoomImg'],
	  			 );	
				 $result = Room::update($data);
				if($result === 'ok'){

				 session::set('success','modified');
				  Redirect::to('home.php');
				 }else{
				echo $result;
			}
		}
	}

	
	public function deleteRoom(){
		if(isset($_POST['RoomId'])){
			$data['RoomId'] = $_POST['RoomId'];
			$result = room::delete($data);
			if($result === 'ok'){
				session::set('success','room deleted');
				// Redirect::to('home.php');
			}else{
				echo $result;
			}
		}
	}


}



?>