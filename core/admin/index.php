<?php
require_once('../contact_model.php');

$contact 		= new Contact_model();
$contact->table = 'contacts';
$contacts = $contact->select();

?>

<!doctype html>
<html>
	<head>
		<title>Index page</title>
		<meta charset="utf-8">
		<link href="../../css/main.css" rel="stylesheet">
		<script type="text/javascript">
			function deleteContact(){}
			function editContact(){}
		</script>
	</head>
	<body>
		<div id="wrapper">
			<h1>Редкатировать контакты</h1>
			<table class="bordered">
			<thead>
				<tr>
					<th>Имя пользователя</th>
					<th>Номер телефона</th>
					<th>Email адресс</th>
					<th>URL</th>
					<th>Редкатировать</th>
				</tr>
			</thead>
				<?php foreach($contacts as $con):?>
				<tr>
					<td><?php echo $con['username'];?></td>
					<td><?php echo $con['phone'];?></td>
					<td><?php echo $con['email'];?></td>
					<td><?php echo $con['page'];?></td>
					<td>
						<button class="deletebtn" onclick="deleteContact(this)" id="deletebtn<?php echo $con['id'];?>" value="<?php echo $con['id'];?>">Удалить</button>
						<a class="editbtn" href="edit.php?con_id=<?php echo $con['id'];?>">Редкатировать</a>
					
					</td>
					
				</tr>
				<?php endforeach ?>
			</table>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript">
			function deleteContact(clickedBtn){

				var con_id 		=  clickedBtn.value;
				var route 		= "delete.php?con_id=" + con_id;	
				// alert(cat_id);
				$.ajax({
				  url: route,
				  type: 'GET',
				  dataType: 'json',
		//		  data: cat_id,
				  success:  function(data){
					
					if(typeof data['deleted'] != 'undefined' && data['deleted'])
					{			
						deleteRow = clickedBtn;
						deleteRow.closest('tr').remove();
						
					}
				 
				 }
				});		
			}
		</script>
	</body>
</html>