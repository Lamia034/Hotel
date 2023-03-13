<?php 


class reservations {

	static public function getAll(){
		$stmt = connection::connect()->prepare('SELECT * FROM reservations');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt = null;
	}

	static public function getReservation($data){
		$ReservationId = $data['ReservationId'];
		try{
			$query = 'SELECT * FROM reservations WHERE ReservationId=:ReservationId';
			$stmt = connection::connect()->prepare($query);
			$stmt->execute(array(":ReservationId" => $ReservationId));
			$reservation = $stmt->fetch(PDO::FETCH_OBJ);
			return $reservation;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	} 


	

	static public function getPersonalReservation($data){
		$ClientId = $data['ClientId'];
		try{
			$query = 'SELECT * FROM reservations WHERE ClientId=:ClientId';
			$stmt = connection::connect()->prepare($query);
			
			$stmt->execute(array(":ClientId" => $ClientId));
			$reservations = array();
			while ($reservation = $stmt->fetch(PDO::FETCH_OBJ)) {
				$reservations[] = $reservation;
			}
			return $reservations;
			$stmt = null;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
	



    static public function getGuestsByReservationId($reservationId) {
        $db = connection::connect();
        $stmt = $db->prepare("SELECT * FROM guests WHERE ReservationId = :reservationId");
        $stmt->bindParam(':reservationId', $reservationId);
        $stmt->execute();
        $guests = $stmt->fetchAll();
        $stmt = null;
        return $guests;
    }




		static public function addreservation($reservationData){
			$stmt = connection::connect()->prepare('INSERT INTO reservations (ClientId,ClientName,RoomType,SuiteType,GuestsNumber,ReservationPrice,Arrive,`Leave`)
			VALUES (:ClientId,:ClientName,:RoomType,:SuiteType,:GuestsNumber,:ReservationPrice,:Arrive,:Leave)');
	
		$d = intval($reservationData['ClientId']);
		$stmt->bindParam(':ClientId',$d, PDO::PARAM_INT);
		$stmt->bindParam(':ClientName',$reservationData['ClientName'], PDO::PARAM_STR);
		$stmt->bindParam(':RoomType',$reservationData['RoomType'], PDO::PARAM_STR);
		$stmt->bindParam(':SuiteType',$reservationData['SuiteType'], PDO::PARAM_STR);
		$pr = intval($reservationData['GuestsNumber']);
		$stmt->bindParam(':GuestsNumber' , $pr, PDO::PARAM_INT );
		$stmt->bindParam(':ReservationPrice' , $reservationData['ReservationPrice'], PDO::PARAM_INT );
		$stmt->bindParam(':Arrive' , $reservationData['Arrive'], PDO::PARAM_STR );
		$r = strval($reservationData['Leave']);
		$stmt->bindParam(':Leave' , $r, PDO::PARAM_STR );
		
		if($stmt->execute()){
			return 'ok';

		}else{
			return 'error';
		}
		$stmt = null;
	}

	static public function LastIdReservation(){
		$stmt = connection::connect()->query("SELECT 
		ReservationId FROM reservations ORDER BY ReservationId DESC");	

		$ReservationId = $stmt->fetchColumn();
		// $ReservationId = connection::connect()->lastinsertId();
		
	return $ReservationId;
	
	}


	static public function addguest($guestData){
		$stmt = connection::connect()->prepare('INSERT INTO guests (ReservationId,GuestName,GuestDOB) 
										VALUES (:ReservationId,:GuestName,:GuestDOB)');
			$stmt->bindParam(':ReservationId', $guestData['ReservationId'], PDO::PARAM_INT);
			$s = strval($guestData['GuestName']);
			$stmt->bindParam(':GuestName',$s , PDO::PARAM_STR);
			$stmt->bindParam(':GuestDOB', $guestData['GuestDOB'], PDO::PARAM_STR);
			// $stmt->execute();

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt = null;
	}



	static public function checkreservation($reservationData){
		$stmt = connection::connect()->prepare('SELECT * FROM reservations WHERE RoomType = :RoomType AND (`Leave` <= :Arrive OR Arrive >= :Leave)');
		$stmt->bindParam(':RoomType', $reservationData['RoomType'], PDO::PARAM_STR);
		$stmt->bindParam(':Arrive', $reservationData['Arrive'], PDO::PARAM_STR);
		$stmt->bindParam(':Leave', $reservationData['Leave'], PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
		$available = true;
	
		foreach($result as $row) {
			if(($reservationData['Arrive'] >= $row['Arrive'] && $reservationData['Arrive'] <= $row['Leave']) || 
				($reservationData['Leave'] >= $row['Arrive'] && $reservationData['Leave'] <= $row['Leave'])) {
				$available = false;
				break;
			}
		}
	
		return $available ? 'ok' : 'no';
	}
	




	static public function delete($data){
		$ReservationId = $data['ReservationId'];
		try{
			$query = 'DELETE FROM reservations WHERE ReservationId=:ReservationId';
			$stmt = connection::connect()->prepare($query);
			$stmt->execute(array(":ReservationId" => $ReservationId));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}




}



	// static public function checkreservation($reservationData){
	// 	$stmt = connection::connect()->prepare('SELECT * FROM reservations WHERE RoomType = :RoomType');
	// 	$stmt->bindParam(':RoomType', $reservationData['RoomType'], PDO::PARAM_STR);
	// 	$stmt->execute();
	// 	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	// 	foreach ($results as $result) {
	// 		if ($result['Arrive'] <= $reservationData['Leave'] && $result['Leave'] >= $reservationData['Arrive']) {
	// 			return 'no'; // Room is not available for the given reservation period
	// 		}
	// 	}
	
	// 	return 'ok'; // Room is available for the given reservation period
	// }
	



	// static public function checkreservation($reservationData){
	// 	$stmt = connection::connect()->prepare('SELECT * FROM reservations WHERE RoomType = :RoomType AND (Arrive > :Leave OR `Leave` < :Arrive) ');
	// 	$stmt->bindParam(':RoomType', $reservationData['RoomType'], PDO::PARAM_STR);
	// 	$stmt->bindParam(':Arrive', $reservationData['Arrive'], PDO::PARAM_STR);
	// 	$stmt->bindParam(':Leave', $reservationData['Leave'], PDO::PARAM_STR);
	// 	$stmt->execute();
	// 	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	// 	if($result){
	// 		return 'no';
	// 	}else{
	// 		return 'ok';
	// 	}
	// }


	// static public function checkreservation($reservationData){
	// 	$stmt = connection::connect()->prepare('SELECT * FROM reservations WHERE RoomType = :RoomType AND `Leave` > :Arrive ORDER BY `Leave` ASC');
	// 	$stmt->bindParam(':RoomType', $reservationData['RoomType'], PDO::PARAM_STR);
	// 	$stmt->bindParam(':Arrive', $reservationData['Arrive'], PDO::PARAM_STR);
	// 	$stmt->execute();
	// 	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	// 	if($result){
	// 		return 'no';
	// 	}else{
	// 		return 'ok';
	// 	}
	// }
	

	


	// static public function update($data){
	// 	$stmt = connection::connect()->prepare('UPDATE reservations SET ClientName=:ClientName,RoomType=:RoomType, GuestsNumber=:GuestsNumber , ReservationDate=:ReservationDate,
	// 	  WHERE ReservationId=:ReservationId');
	// 	$stmt->bindParam(':ClientName',$data['ClientName'], PDO::PARAM_STR);
	// 	$stmt->bindParam(':RoomType',$data['RoomType'], PDO::PARAM_STR);
	// 	$stmt->bindParam(':GuestsNumber',$data['GuestsNumber'], PDO::PARAM_INT);
	// 	$stmt->bindParam(':RoomPrice' , $pr, PDO::PARAM_INT );
	// 	$stmt->bindParam(':ReservationDate' , $data['ReservationDate'], PDO::PARAM_INT );
	// 	$stmt->bindParam(':ReservationId' , $data['ReservationId'], PDO::PARAM_INT );

	// 	// var_dump($data['price']);
	// 	// die();
	// 	if($stmt->execute()){
	// 		return 'ok';
	// 	}else{
	// 		return 'error';
	// 	}
	// 	$stmt = null;
	// }



