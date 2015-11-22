<!doctype html>
<html>
	<head>
		<title>Index page</title>
		<meta charset="utf-8">
		<link href="css/main.css" rel="stylesheet">
		<link rel="stylesheet" href="css/animations.css">
		<script type="text/javascript">
		</script>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<div id="logo">
					<img src="images/logo-vanrobaeys.png" alt="Логотип Vanrobaeys.be">
				</div>
				<div class="contacts"> 
					<p>	+7 (343) 213-12-84 </p>
					<p>(919) 386-15-96</p>
				</div>
				<div class="main-menu">
					<ul>
						<li><a href="#">О компании</a></li>
						<li><a href="#">Контакты</a></li>
						<li><a href="#">FAQ</a></li>
					</ul>
				</div>
				<div class="header-break-line">
					<div class="first-border"></div><div class="second-border"></div>
				</div>
				<div class="third-border"></div>
			</header> 
			
				<div class="contact-form">
					<h1>Контакты</h1>
					<form method="POST" name="contact-form" action="core/contacts.php">
						<input type="hidden" name="current-url" id="current-url" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>">
						<div class="form-group">
							<label for="username">Ваше имя</label>
							<input type="text" name="username" id="username" class="username" placeholder="Введите имя">
							<div id="required-name"></div>
						</div>
						<div class="form-group">
							<label for="phone">Номер телефона</label>
							<input type="text" name="phone" id="phone" class="phone" placeholder="Введите номер телефона">
							<div id="required-phone"></div>
						</div>
						<div class="form-group">
							<label for="email">E-mail адресс</label>
							<input type="text" name="email" id="email" class="email"  placeholder="Введите email">
							<div id="required-email"></div>
						</div>
						<div class="form-group">
							<button type="button" name="send-btn" id="send-btn" class="send-btn">Отправить</button>
						</div>
					</form>
				</div>
			
			<footer>
				<div class="footer-break-line">
					<div class="footer-first-border"></div><div class="footer-second-border"></div>
				</div>
				<div class="footer-third-border"></div>
				<div class="footer-content">
					<div class="footer-menu">
						<ul>
							<li><a href="#">О компании</a></li>
							<li><a href="#">Контакты</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
					<div class="footer-category">
						<ul>
							<li> <a href="#">Канарейки </a></li>
							<li> <a href="#">Волнистые попугаи </a></li>
							<li> <a href="#">Длинохвостый попугаи </a></li>
							<li> <a href="#">Большие попугаи</a></li>
							<li> <a href="#">Зяблики </a></li>
							<li> <a href="#">Вольерные птицы </a></li>
							<li> <a href="#"> Экзотические птицы</a></li>
						</ul>
					</div>
					<div class="social-btn">
						<a href="google.ru"><div class="google-plus"></div></a>
						<a href="#"><div class="facebook"></div></a>
						<a href="#"><div class="vk"></div></a>
						<a href="#"><div class="twitter"></div></a>
					</div>
				</div>
			</footer>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/jqueryrotate.2.1.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {  
					$("#username").keyup(function(){
							$("#username").css({
						"border": "2px solid green"
						});
					});
					$("#email").keyup(function(){
						var email = $("#email").val();
				  
					if(email != 0)
					{
					if(isValidEmailAddress(email))
					{
					$("#email").css({
						"border": "2px solid green"
						});
					} else {
						$("#email").css({
						"border": "2px solid red"
						});
					}
					} else {
						$("#email").css({
						"background-image": "none"
						}); 
					}
					});
				$("#phone").keyup(function(){
				
				if(phone != 0)
				{
					var phone = $("#phone").val();
					if(isNumber(phone))
					{
					$("#phone").css({
						"border": "2px solid green"
						});
					} else {
						$("#phone").css({
						"border": "2px solid red"
						});
					}
				} else {
					$("#phone").css({
					"background": "none"
					}); 
				}
				});
				$("#send-btn").click(function(){
					var username = $("#username").val();
					var phone = $("#phone").val();
					var email = $("#email").val();
					var currentURL = $("#current-url").val();
					if(username.length == 0 && email.length == 0 && email.length == 0){
						$("#required-name span").remove();
						$("#required-phone span").remove();
						$("#required-email span").remove();
						$("#required-name").append("<span> Имя должен быть заполнен</span>");
						$("#required-phone").append("<span>Номер должен быть заполнен</span>");
						$("#required-email").append("<span>E-mail должен быть заполнен</span>");
						$("#username").css({
						"border": "2px solid red"
						});
						$("#phone").css({
						"border": "2px solid red"
						});
						$("#email").css({
						"border": "2px solid red"
						});
					}else if(username.length == 0){
						$("#required-name span").remove();
						$("#required-name").append("<span> Имя должен быть заполнен</span>");
						$("#username").css({
						"border": "2px solid red"
						});
					}else if(phone.length == 0){
						//$(".required-email").css("visibility", "visible");
						$("#required-name span").remove();
						$("#required-phone span").remove();
						$("#required-phone").append("<span>Номер должен быть заполнен</span>");
						$("#phone").css({
						"border": "2px solid red"
						});
					}else if(email.length == 0){
						$("#required-name span").remove();
						$("#required-phone span").remove();
						$("#required-email span").remove();
						$("#required-email").append("<span>E-mail должен быть заполнен</span>");
						$("#email").css({
						"border": "2px solid red"
						});
					} else{
					
						$("#required-email span").remove();
						if(isNumber(phone))
						{
							$("#required-phone span").remove();
							if(isValidEmailAddress(email)){
								$("#required-email span").remove();
								var route = '<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>' + "/testtask/core/callme.php";
								$.ajax({
									url: route, //'core/callme.php',
									type:'POST',
									data:{username:username, phone:phone, email:email, currentURL:currentURL},
									success:function(data){
										if(typeof data['inserted'])
										{
											//console.log(data);
											var cleanInput  = $("form input").val('');
											$("form:last-child span").remove();
											$("form:last-child").append("<span>Мы с вами свяжмеся</span>");
										}else{
											//console.log(data);
											$("form:last-child span").remove();
											$("form:last-child").append("<span>Что-то пошло не так на сервере<span>");
										}
			
									}
								});
							}else{
								$("#required-email span").remove();
								$("#required-email").append("<span>E-mail не правильно заполнен</span>");
								$("#email").css({
									"border": "2px solid red"
								});
							}

						}else{
							$("#required-phone span").remove();
							$("#required-phone").append("<span>Номер не правильно заполнен</span>");
							$("#phone").css({
							"border": "2px solid red"
							});
							
						}
					}

				});
			
				  
			});
				  
			function isValidEmailAddress(emailAddress) {
				var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
				return pattern.test(emailAddress);
			}
			
			function isNumber(phone){
				var pattern= new RegExp(/^[0-9]*$/);
				return pattern.test(phone);
				
			}
		</script>
	</body>
</html>