<?php 


class ReservationsController{

	public static function getAllReservations(){
		$reservations = reservations::getAll();
		return $reservations;
	}

	public static function getOneReservation(){
		if(isset($_POST['ReservationId'])){
			$data = array(
				'ReservationId' => $_POST['ReservationId']
			);
			$reservation = reservations::getReservation($data);
			return $reservation;
		}
	}


	public static function getPersonalReservations(){
		if(isset($_SESSION['ClientId'])){
			$data = array(
				'ClientId' => $_SESSION['ClientId']
			);
			$reservations = reservations::getPersonalReservation($data);
			return $reservations;
		}
	}
	

	public static function getAllGuests($reservationId){
		$guests = reservations::getGuestsByReservationId($reservationId);

		return $guests;
	}


	
	



	public static function addReservation(){
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
			// Check 
			$isRoomAvailable = reservations::checkreservation($reservationData);
			if ($isRoomAvailable === 'no') {

				$_SESSION['error'] = "Sorry, the selected room is not available for the specified dates.";
				header('location:' . BaseUrl . 'home/reservation');
			}else{
				$result = reservations::addreservation($reservationData);
				var_dump($result);
				$reservationId = reservations::LastIdReservation();
				// var_dump($reservationId);
				$guestData = array(
					'ReservationId'=> $reservationId,
					'GuestName' => $_POST['GuestName'],
					'GuestDOB' => $_POST['GuestDOB']
				);
		
				
				$rst = reservations::addguest($guestData);
					if($result === 'ok' || $rst === 'ok'){
								header('location:' . BaseUrl );
							}else{
								echo $result;
							}
			}

		}
	}
	



	// public function updateReservation(){
	
	// 		if(isset($_POST['update'])){
    //    $data = array(
	// 			'ReservationId' => $_POST['ReservationId'],
	// 			'ClientName' => $_POST['ClientName'],              
	// 			'RoomType' => $_POST['RoomType'],
	// 			'GuestsNumber' => $_POST['GuestsNumber'],
	// 			'ReservationDate' => $_POST['ReservationDate'],
	//   			 );	
	// 			 $result = Reservation::update($data);
	// 			if($result === 'ok'){

	// 			 session::set('success','modified');
	// 			  Redirect::to('home.php');
	// 			 }else{
	// 			echo $result;
	// 		}
	// 	}
	// }

	
	public function deleteReservation(){
		if(isset($_POST['ReservationId'])){
			$data['ReservationId'] = $_POST['ReservationId'];
			$result = reservations::delete($data);
			if($result === 'ok'){
				header('location:' . BaseUrl . 'home/profil');
			}else{
				echo $result;
			}
		}
	}


}



?>