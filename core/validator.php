<?php 

class Validator
{
	public function cleanData($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		
		return $data;
	}
	public function isEmpty($data)
	{
		if(!empty($data)) 
		{
			return true;
		}else
		{
			return false;
		}
	}
}