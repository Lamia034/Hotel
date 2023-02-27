<?php 

class room {

	public static function getAll(){
		$stmt = connection::connect()->prepare('SELECT * FROM rooms');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt = null;
	}

	static public function getRoom($data){
		$RoomId = $data['RoomId'];
		try{
			$query = 'SELECT * FROM rooms WHERE RoomId=:RoomId';
			$stmt = connection::connect()->prepare($query);
			$stmt->execute(array(":RoomId" => $RoomId));
			$room = $stmt->fetch(PDO::FETCH_OBJ);
			return $room;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	} 

	static public function add($data){
		$stmt = connection::connect()->prepare('INSERT INTO rooms (RoomImg,RoomNumber,SuiteType,RoomType,RoomPrice)
			VALUES (:RoomImg,:RoomNumber,:SuiteType,:RoomType,:RoomPrice)');
		$str = strval($data['RoomImg']);	
		$stmt->bindParam(':RoomImg',$str, PDO::PARAM_STR);
		$stmt->bindParam(':RoomType',$data['RoomType'], PDO::PARAM_STR);
		$stmt->bindParam(':SuiteType',$data['SuiteType'], PDO::PARAM_STR);
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
		$stmt = connection::connect()->prepare('UPDATE rooms SET RoomImg=:RoomImg ,RoomType=:RoomType , SuiteType=:SuiteType , RoomNumber=:RoomNumber,
		RoomPrice=:RoomPrice  WHERE RoomId=:RoomId');
		$str = strval($data['RoomImg']);
		$stmt->bindParam(':RoomImg',$str, PDO::PARAM_STR);
		$stmt->bindParam(':RoomType',$data['RoomType'], PDO::PARAM_STR);
		$stmt->bindParam(':SuiteType',$data['SuiteType'], PDO::PARAM_STR);
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
			$stmt = connection::connect()->prepare($query);
			$stmt->execute(array(":RoomId" => $RoomId));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}




}
