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
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$username	= $validator->cleanData($_POST['username']);
		$phone		= $validator->cleanData($_POST['phone']);
		$email		= $validator->cleanData($_POST['email']);
		$con_id 	= $validator->cleanData($_POST['con_id']);
		
		$updated = $contact->update($con_id, $username, $phone, $email);
		echo json_encode(['updated' => $updated]);
		exit();
	}
?>

<!doctype html>
<html>
	<head>
		<title>Index page</title>
		<meta charset="utf-8">
		<link href="../../css/main.css" rel="stylesheet">
		<script type="text/javascript">
			function update(){}
		</script>
	</head>
	<body>
		<div id="wrapper">
							<h1>Редактировать контакты</h1>
					<form onkeypress="if(event.keyCode == 13) return false;">
						<input type="text" id="search_id" placeholder="Введите id">
						<button type="button" id="search_btn">Найти</button>
					</form>
			<div class="contact-form">

					<form method="POST" name="contact-form" action="">
						<hr>
						<input type="hidden" id="con_id" value="<?php echo $result['id'];?>">
						<input type="hidden" name="current-url" id="current-url" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>">
						<div class="form-group">
							<label for="username">Имя пользователя</label>
							<input type="text" name="username" id="username" class="username" placeholder="Введите имя" value="<?php echo $result['username']?>">
							<div id="required-name"></div>
						</div>
						<div class="form-group">
							<label for="phone">Номер телефона</label>
							<input type="text" name="phone" id="phone" class="phone" placeholder="Введите номер телефона" value="<?php echo $result['phone']?>">
							<div id="required-phone"></div>
						</div>
						<div class="form-group">
							<label for="email">E-mail адресс</label>
							<input type="text" name="email" id="email" class="email"  placeholder="Введите email" value="<?php echo $result['email']?>">
							<div id="required-email"></div>
						</div>
						<div class="form-group">
							<button type="button" name="send-btn" id="send-btn" class="send-btn" onclick="update()">Сохранить</button>
							<button type="button" name="clear-btn" id="clear-btn" class="clear-btn">Очистить</button>
						</div>
					</form>
				</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript">
			$("#clear-btn").click(function (){
					  $("#username").val('');
					  $("#phone").val('');
					  $("#email").val('');
			});
			$("#search_btn").click(function (){
				var con_id	=  $("#search_id").val();
				var route 		=  "search.php?con_id=" + con_id;	
				//alert(id);
				$.ajax({
				  url: route,
				  type: 'GET',
				  //dataType: 'json',
				 // data: {con_id:con_id},
				  success:  function(data){
					//console.log(data);
					var contact = JSON.parse(data);
					  $("#username").val(contact.username);
					  $("#phone").val(contact.phone);
					  $("#email").val(contact.email);
				 },
				 error: function(e){
					alert(e);
				 }
				});		
				
			});
			function update(){
				
				var con_id 		=  $("#con_id").val();
				var username	=  $("#username").val();
				var phone		=  $("#phone").val();
				var email		=  $("#email").val();
				var route 		=  "edit.php";	
				// alert(con_id);
				$.ajax({
				  url: route,
				  type: 'POST',
				  //dataType: 'json',
				  data: {con_id:con_id, username:username, phone:phone,  email:email},
				  success:  function(data){
					console.log(data);
					if(typeof data['updated'])
					{			
						alert("Обнавлен");
					}else{
						alert("NO Обнавлен");
					}
				 },
				 error: function(e){
					alert(e);
				 }
				});		
			}
		</script>
	</body>
</html>