<?php 
require_once '../database/DB.php';
require_once '../app/classes/session.php';
require_once '../app/classes/Redirect.php';

class reservations {

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM reservations');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt = null;
	}

	static public function getReservation($data){
		$ReservationId = $data['ReservationId'];
		try{
			$query = 'SELECT * FROM reservations WHERE ReservationId=:ReservationId';
			$stmt = DB::connect()->prepare($query);
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
			$stmt = DB::connect()->prepare($query);
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
	



	// static public function getPersonalReservation($data){
	// 	$ClientId = $data['ClientId'];
	// 	try{
	// 		$query = 'SELECT * FROM reservations WHERE ClientId=:ClientId';
	// 		$stmt = DB::connect()->prepare($query);
	// 		$stmt->execute(array(":ClientId" => $ClientId));
	// 		$reservations = $stmt->fetch(PDO::FETCH_OBJ);
	// 		return $reservations;
	// 		$stmt = null;
	// 	}catch(PDOException $ex){
	// 		echo 'erreur' . $ex->getMessage();
	// 	}
	// } 


	// static public function getAllReservations() {
    //     $db = DB::connect();
    //     $stmt = $db->query("SELECT * FROM reservations");
    //     $reservations = $stmt->fetchAll();
    //     $stmt = null;
    //     return $reservations;
    // }

    static public function getGuestsByReservationId($reservationId) {
        $db = DB::connect();
        $stmt = $db->prepare("SELECT * FROM guests WHERE ReservationId = :reservationId");
        $stmt->bindParam(':reservationId', $reservationId);
        $stmt->execute();
        $guests = $stmt->fetchAll();
        $stmt = null;
        return $guests;
    }




	// static public function getAllReservationsGuests() {
	// 	$stmt = DB::connect()->prepare("SELECT reservations.*, guests.*
	// 	  FROM reservations
	// 	  JOIN guests ON reservations.ReservationId = guests.ReservationId");
	// 	$stmt->execute();
	// 	$result = $stmt->fetchAll();
	// 	$stmt = null;
	// 	return $result;
	//   }


	//   static public function getGuestsByReservationId($reservationId) {
    //     $db = DB::connect();
    //     $stmt = $db->prepare("SELECT * FROM guests WHERE ReservationId = :reservationId");
    //     $stmt->bindParam(':reservationId', $reservationId);
    //     $stmt->execute();
    //     $guests = $stmt->fetchAll();
    //     $stmt = null;
    //     return $guests;
    // }

	// static public function getAllGuests($ReservationId){
	// 	$stmt = DB::connect()->prepare("SELECT guests.* FROM guests JOIN reservations ON guests.ReservationId = reservations.ReservationId WHERE reservations.ReservationId = :ReservationId");
	// 	$stmt->execute(array(':ReservationId' => $ReservationId));
	// 	return $stmt->fetchAll();
	// 	$stmt = null;
	// }


	// public static function add($reservationData, $guestData) {
	// 	try {
	// 		$db = static::getDB();
	// 		$db->beginTransaction();
	
	// 		// Insert reservation
	// 		$sql = "INSERT INTO reservations (ClientName, RoomType, SuiteType, GuestsNumber, ReservationDate) VALUES (:ClientName, :RoomType, :SuiteType, :GuestsNumber, :ReservationDate)";
	// 		$stmt = $db->prepare($sql);
	// 		$stmt->execute($reservationData);
	
	// 		// Get the last inserted ID of the reservation
	// 		$reservationId = $db->lastInsertId();
	
	// 		// Insert guests
	// 		foreach ($guestData as $guest) {
	// 			$guest['ReservationId'] = $reservationId;
	// 			$sql = "INSERT INTO guests (ReservationId, GuestName, GuestDOB) VALUES (:ReservationId, :GuestName, :GuestDOB)";
	// 			$stmt = $db->prepare($sql);
	// 			$stmt->execute($guest);
	// 		}
	
	// 		$db->commit();
	// 		return 'ok';
	// 	} catch (PDOException $e) {
	// 		$db->rollBack();
	// 		return $e->getMessage();
	// 	}
	// }
	

		static public function addreservation($reservationData){
			$stmt = DB::connect()->prepare('INSERT INTO reservations (ClientId,ClientName,RoomType,SuiteType,GuestsNumber,ReservationPrice,Arrive,`Leave`)
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
		$stmt = DB::connect()->query("SELECT 
		ReservationId FROM reservations ORDER BY ReservationId DESC");	

		$ReservationId = $stmt->fetchColumn();
		// $ReservationId = DB::connect()->lastinsertId();
		
	return $ReservationId;
	
	}


	static public function addguest($guestData){
		$stmt = DB::connect()->prepare('INSERT INTO guests (ReservationId,GuestName, GuestDOB) 
										VALUES (:ReservationId,:GuestName, :GuestDOB)');
			$stmt->bindParam(':ReservationId', $guestData['ReservationId'], PDO::PARAM_INT);
			$stmt->bindParam(':GuestName', $guestData['GuestName'], PDO::PARAM_STR);
			$stmt->bindParam(':GuestDOB', $guestData['GuestDOB'], PDO::PARAM_STR);
			// $stmt->execute();

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt = null;
	}








	// static public function add($reservationData, $guestData){
	// 	$db = DB::connect();
	
	// 	try {
	// 		$db->beginTransaction();

	// 				// Insert reservation data
	// 				$stmtReservations = $db->prepare('INSERT INTO reservations (ClientName, RoomType, SuiteType, GuestsNumber, ReservationDate)
	// 				VALUES (:ClientName, :RoomType, :SuiteType, :GuestsNumber, :ReservationDate)');
	// 				$stmtReservations->bindParam(':ClientName', $reservationData['ClientName'], PDO::PARAM_STR);
	// 				$stmtReservations->bindParam(':RoomType', $reservationData['RoomType'], PDO::PARAM_STR);
	// 				$stmtReservations->bindParam(':SuiteType', $reservationData['SuiteType'], PDO::PARAM_STR);
	// 				$stmtReservations->bindParam(':GuestsNumber', $reservationData['GuestsNumber'], PDO::PARAM_INT);
	// 				$stmtReservations->bindParam(':ReservationDate', $reservationData['ReservationDate'], PDO::PARAM_STR);
	// 				// $stmtReservations->bindParam(':GuestID', $guestId, PDO::PARAM_INT);
	// 				// $ReservationId = $db->lastInsertId();
	// 				$stmtReservations->execute();
	
	// 		// Insert guest data
	// 		$stmtGuests = $db->prepare('INSERT INTO guests (ReservationId,GuestName, GuestDOB) 
	// 									VALUES (:ReservationId,:GuestName, :GuestDOB)');
	// 		$stmtGuests->bindParam(':ReservationId', $guestData['ReservationId'], PDO::PARAM_INT);
	// 		$stmtGuests->bindParam(':GuestName', $guestData['GuestName'], PDO::PARAM_STR);
	// 		$stmtGuests->bindParam(':GuestDOB', $guestData['GuestDOB'], PDO::PARAM_STR);
	// 		$stmtGuests->execute();
	
	// 		// Get the ID of the newly inserted guest
			
	
	
		
	
	// 		// Commit the transaction
	// 		$db->commit();
	
	// 		return 'ok';
	
	// 	} catch (PDOException $e) {
	// 		// Rollback the transaction on error
	// 		$db->rollBack();
	
	// 		return 'error: ' . $e->getMessage();
	// 	}
	// }
	

	// static public function add($data){
	// 	$stmt = DB::connect()->prepare('INSERT INTO reservations (ClientName,RoomType,SuiteType,GuestsNumber,ReservationDate)
	// 		VALUES (:ClientName,:RoomType,:SuiteType,:GuestsNumber,:ReservationDate)');
		
	// 	$stmt->bindParam(':ClientName',$data['ClientName'], PDO::PARAM_STR);
	// 	$stmt->bindParam(':RoomType',$data['RoomType'], PDO::PARAM_STR);
	// 	$stmt->bindParam(':SuiteType',$data['SuiteType'], PDO::PARAM_STR);
	// 	$pr = intval($data['GuestsNumber']);
	// 	$stmt->bindParam(':GuestsNumber' , $pr, PDO::PARAM_INT );
	// 	$stmt->bindParam(':ReservationDate' , $data['ReservationDate'], PDO::PARAM_STR );

	// 	if($stmt->execute()){
	// 		return 'ok';
	// 	}else{
	// 		return 'error';
	// 	}
	// 	$stmt = null;
	// }
	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE reservations SET ClientName=:ClientName,RoomType=:RoomType, GuestsNumber=:GuestsNumber , ReservationDate=:ReservationDate,
		  WHERE ReservationId=:ReservationId');
		$stmt->bindParam(':ClientName',$data['ClientName'], PDO::PARAM_STR);
		$stmt->bindParam(':RoomType',$data['RoomType'], PDO::PARAM_STR);
		$stmt->bindParam(':GuestsNumber',$data['GuestsNumber'], PDO::PARAM_INT);
		$stmt->bindParam(':RoomPrice' , $pr, PDO::PARAM_INT );
		$stmt->bindParam(':ReservationDate' , $data['ReservationDate'], PDO::PARAM_INT );
		$stmt->bindParam(':ReservationId' , $data['ReservationId'], PDO::PARAM_INT );

		// var_dump($data['price']);
		// die();
		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt = null;
	}



	static public function delete($data){
		$ReservationId = $data['ReservationId'];
		try{
			$query = 'DELETE FROM reservations WHERE ReservationId=:ReservationId';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":ReservationId" => $ReservationId));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}




}