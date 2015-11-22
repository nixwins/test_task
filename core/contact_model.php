<?php

require_once('dbconnect.php');

class Contact_model 
{
	public $table;
	
	public function insert($username, $phone, $email, $page)
	{
		$db	  = DBConnect::getInstance();
		$sql  = "INSERT INTO $this->table (username, phone, email, page) VALUES(:username, :phone, :email, :page)";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':page', $page);
		
		return $stmt->execute();
	}
	public function select($sql = '')
	{
		$db = DBConnect::getInstance();
		if($sql == '')
		{
			$sql 	 =  "SELECT * FROM $this->table";
			$stmt	 = $db->prepare($sql);
			$result  = $stmt->execute();
			
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}else {
			$stmt   = $db->prepare($sql);
			$result = $stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	}
	public function delete_where($con_id)
	{
		$db   = DBConnect::getInstance();
		$sql  = "DELETE FROM $this->table WHERE id=$con_id";
		$stmt = $db->prepare($sql);
		return $stmt->execute();
	}
	public function update($con_id, $username, $phone, $email)
	{
		$db   = DBConnect::getInstance();
		$sql  = "UPDATE $this->table SET 
					username=:username,
					phone=:phone, 
					email=:email 
					WHERE id=:con_id";
					
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':username', $username);
		$stmt->bindValue(':phone', $phone);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':con_id', $con_id);
		
		return $stmt->execute();
	}
}