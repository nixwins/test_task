<?php
require_once('../contact_model.php');
require_once('../validator.php');

$contact 		= new Contact_model();
$contact->table = 'contacts';

$validator = new Validator();

	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$con_id	= $validator->cleanData($_GET['con_id']);
		
		$deleted = $contact->delete_where($con_id);
		echo json_encode(['deleted' => $deleted]);
	}

?>