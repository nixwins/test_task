<?php
require_once('../contact_model.php');
require_once('../validator.php');

$contact 		= new Contact_model();
$contact->table = 'contacts';

$validator = new Validator();

	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$con_id	= $validator->cleanData($_GET['con_id']);
		$sql = "SELECT * FROM contacts WHERE id=$con_id";
		$result = $contact->select($sql);
	}
	if(!empty($result)){
		$result = $result[0];
	}
	
	echo json_encode($result);