<?php 

class RoomsController{


	public static function getAllRooms(){
		$rooms = room::getAll();
		return $rooms;
	}

	public static function getOneRoom(){
		if(isset($_POST['RoomId'])){
			$data = array(
				'RoomId' => $_POST['RoomId']
			);
			$room = room::getRoom($data);
			return $room;
		}
	}
	

	public static function addRoom(){
		if(isset($_POST['add'])){

			$data = array(
				'RoomNumber' => $_POST['RoomNumber'],
				'RoomImg' => $_FILES['RoomImg']['name'],
				'RoomPrice' => $_POST['RoomPrice'],
				'RoomType' => $_POST['RoomType'], //standard...
				'SuiteType' => $_POST['SuiteType'], //tyoe suite..
				
			
			);
			$result = room::add($data);
			if($result === 'ok'){
				header('location:' . BaseUrl . 'home/dashboard');
			}else{
				echo $result;
			}
		}
	}


	

	public static function updateRoom(){
	
			if(isset($_POST['update'])){
       $data = array(
				'RoomId' => $_POST['RoomId'],
				'RoomNumber' => $_POST['RoomNumber'],
				'RoomPrice' => $_POST['RoomPrice'],
				'SuiteType' => $_POST['SuiteType'],
				'RoomType' => $_POST['RoomType'],
				'RoomImg' => $_FILES['RoomImg']['name'],
	  			 );	
				 $result = Room::update($data);
				if($result === 'ok'){

				header('location:' . BaseUrl . 'home/dashboard');
				 }else{
				echo $result;
			}
		}
	}

	
	public static function deleteRoom(){
		if(isset($_POST['RoomId'])){
			$data['RoomId'] = $_POST['RoomId'];
			$result = room::delete($data);
			if($result === 'ok'){

				header('location:' . BaseUrl . 'home/dashboard');
			}else{
				echo $result;
			}
		}
	}


}



?>