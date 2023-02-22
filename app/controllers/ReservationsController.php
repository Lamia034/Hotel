<?php 
require_once '../model/reservations.php';
require_once '../database/DB.php';

class ReservationsController{

	public function getAllReservations(){
		$reservations = reservations::getAll();
		return $reservations;
	}

	public function getOneReservation(){
		if(isset($_POST['ReservationId'])){
			$data = array(
				'ReservationId' => $_POST['ReservationId']
			);
			$reservation = reservations::getReservation($data);
			return $reservations;
		}
	}


	public function getPersonalReservations(){
		if(isset($_SESSION['ClientId'])){
			$data = array(
				'ClientId' => $_SESSION['ClientId']
			);
			$reservations = reservations::getPersonalReservation($data);
			return $reservations;
		}
	}
	

	public function getAllGuests($reservationId){
		$guests = reservations::getGuestsByReservationId($reservationId);

		return $guests;
	}


	
	// 	public function getReservationsGuests() {
	// 		$reservations = reservations::getAllReservationsGuests();
	// 		return $reservations;
	// }


	// public function getGuestsByReservationId($reservationId) {
    //     $guests = ReservationsModel::getGuestsByReservationId($reservationId);
    //     return $guests;
    // }



	// public function addReservation(){
	// 	if(isset($_POST['add'])){
	// 		$reservationData = array(
	// 			'ClientName' => $_POST['ClientName'],              
	// 			'RoomType' => $_POST['RoomType'],
	// 			'SuiteType' => $_POST['SuiteType'],
	// 			'GuestsNumber' => $_POST['GuestsNumber'],
	// 			'ReservationDate' => $_POST['ReservationDate']
	// 		);
	
	// 		$result = reservations::add($reservationData);
	// 		if($result === 'ok'){
	// 			$reservationId = reservations::lastInsertId();
	// 			$guestData = array(
	// 				'ReservationId'=> $reservationId,
	// 				'GuestName' => $_POST['GuestName'],
	// 				'GuestDOB' => $_POST['GuestDOB']
	// 			);
	
	// 			$result = guests::add($guestData);
	// 			if($result === 'ok'){
	// 				session::set('success','room added');
	// 				Redirect::to('home.php');
	// 			}else{
	// 				echo $result;
	// 			}
	// 		} else {
	// 			echo $result;
	// 		}
	// 	}
	// }
	



	public function addReservation(){
		if(isset($_POST['add'])){
			$reservationData = array(
				'ClientId' => $_SESSION['ClientId'],
				'ClientName' => $_POST['ClientName'],              
				'RoomType' => $_POST['RoomType'],
				'SuiteType' => $_POST['SuiteType'],
				'GuestsNumber' => $_POST['GuestsNumber'],
				'ReservationPrice' => $_POST['ReservationPrice'],
				'Arrive' => $_POST['Arrive'],
				'Leave' => $_POST['Leave']
			);
			$result = reservations::addreservation($reservationData);
			$reservationId =reservations::LastIdReservation();
			// var_dump($reservationId);
			$guestData = array(
				'ReservationId'=> $reservationId,
				'GuestName' => $_POST['GuestName'],
				'GuestDOB' => $_POST['GuestDOB']
			);
	
			
			$rst = reservations::addguest($guestData);
				if($result === 'ok' || rst === 'ok'){
							session::set('success','reservation added');
							Redirect::to('home.php');
						}else{
							echo $result;
						}
		}
	}
	

	// public function addReservation(){
	// 	if(isset($_POST['add'])){
	// 		// if (isset($_POST['img'])) {
	// 		// 	$data['img'] = $_POST['img'];
	// 		// }
	// 		$data = array(
	// 			'ClientName' => $_POST['ClientName'],              
	// 			'RoomType' => $_POST['RoomType'],
	// 			'SuiteType' => $_POST['SuiteType'],
	// 			'GuestsNumber' => $_POST['GuestsNumber'],
	// 			'ReservationDate' => $_POST['ReservationDate'],
				
			
	// 		);
	// 		$result = reservations::add($data);
	// 		if($result === 'ok'){
	// 			session::set('success','room added');
	// 			Redirect::to('home.php');
	// 		}else{
	// 			echo $result;
	// 		}
	// 	}
	// }

	public function updateRoom(){
	
			if(isset($_POST['update'])){
       $data = array(
				'ReservationId' => $_POST['ReservationId'],
				'ClientName' => $_POST['ClientName'],              
				'RoomType' => $_POST['RoomType'],
				'GuestsNumber' => $_POST['GuestsNumber'],
				'ReservationDate' => $_POST['ReservationDate'],
	  			 );	
				 $result = Reservation::update($data);
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