<?php
require_once('contact_model.php');
require_once('validator.php');

$contact 		= new Contact_model();
$contact->table = 'contacts';

$validator 		= new Validator();

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$username	= $validator->cleanData($_POST['username']);
		$phone		= $validator->cleanData($_POST['phone']);
		$email		= $validator->cleanData($_POST['email']);
		$currentURL = $validator->cleanData($_POST['currentURL']);
		
		$inserted = $contact->insert($username, $phone, $email, $currentURL);
		echo json_encode(['inserted' => $inserted]);
	}

?>