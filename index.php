<!DOCTYPE html>
<html lang="ar">

<head>
	<meta charset="UTF-8">
	<title>التسجيل</title>
	<link rel="icon" href="logo.svg" type="image/icon type">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
	<link rel="stylesheet" href="./Login.css">
</head>

<body>
	<!-- الجزء الرئيسي: النموذج -->
	<div class="container">
		<div class="reg_screen">
			<div class="screen__content">
			    	<div class="title" >
                    <img style="height:100px" src="./logo.svg" alt="logo" />
			    </div>
				<div class="title" style="padding-top:5px">
					<P class="title1">المجلس العربي للاختصاصات الصحية</P>
					<P class="title2">ادارة القياس و التقويم</P>
				</div>
			
				<form class="login" action="" method="POST">
					<div class="reg__field">
						<input type="email" class="reg__input" name="login__input" placeholder="البريد الالكتروني المؤسسي"
							required><br>
						<i class="reg__icon fas fa-user"></i>
						<span id="error_email" class="login_text_danger"></span>
					</div>
					<button type="submit" style="margin-bottom:10px" class="button login__submit" name="login__submit">
						<span class="button__text">سجل الآن</span>
						<i class="button__icon fas fa-chevron-right"></i>
					</button>
				</form>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>
		</div>
	</div>
	<!-- الجزء الجزئي -->
</body>
<?php include ('Login_control.php'); ?>

</html>