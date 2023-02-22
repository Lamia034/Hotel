<?php 
require_once '../database/DB.php';
require_once '../app/classes/session.php';
require_once '../app/classes/Redirect.php';

class room {

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM rooms');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt = null;
	}

	static public function getRoom($data){
		$RoomId = $data['RoomId'];
		try{
			$query = 'SELECT * FROM rooms WHERE RoomId=:RoomId';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":RoomId" => $RoomId));
			$room = $stmt->fetch(PDO::FETCH_OBJ);
			return $room;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	} 

	static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO rooms (RoomImg,RoomNumber,RoomDesc,RoomCateg,RoomPrice)
			VALUES (:RoomImg,:RoomNumber,:RoomDesc,:RoomCateg,:RoomPrice)');
		$str = strval($data['RoomImg']);	
		$stmt->bindParam(':RoomImg',$str, PDO::PARAM_STR);
		$stmt->bindParam(':RoomCateg',$data['RoomCateg'], PDO::PARAM_STR);
		$stmt->bindParam(':RoomDesc',$data['RoomDesc'], PDO::PARAM_STR);
		$pr = intval($data['RoomPrice']);
		$stmt->bindParam(':RoomPrice' , $pr, PDO::PARAM_INT );
		$pc = intval($data['RoomNumber']);
		$stmt->bindParam(':RoomNumber' , $pc, PDO::PARAM_INT );

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt = null;
	}
	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE rooms SET RoomImg=:RoomImg ,RoomCateg=:RoomCateg , RoomDesc=:RoomDesc , RoomNumber=:RoomNumber,
		RoomPrice=:RoomPrice  WHERE RoomId=:RoomId');
		$stmt->bindParam(':RoomImg',$data['RoomImg'], PDO::PARAM_STR);
		$stmt->bindParam(':RoomCateg',$data['RoomCateg'], PDO::PARAM_STR);
		$stmt->bindParam(':RoomDesc',$data['RoomDesc'], PDO::PARAM_STR);
		$pr = intval($data['RoomPrice']);
		$stmt->bindParam(':RoomPrice' , $pr, PDO::PARAM_INT );
		$pc = intval($data['RoomNumber']);
		$stmt->bindParam(':RoomNumber' , $pc, PDO::PARAM_INT );
		$stmt->bindParam(':RoomId' , $data['RoomId'], PDO::PARAM_INT );

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
		$RoomId = $data['RoomId'];
		try{
			$query = 'DELETE FROM rooms WHERE RoomId=:RoomId';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":RoomId" => $RoomId));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}




}
