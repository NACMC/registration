

<!DOCTYPE html>
<html lang="en" >
<head>
  	<meta charset="UTF-8">
  	<title>Login</title>
  	<link rel="icon" href="logo.svg" type="image/icon type">
  	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
	<link rel="stylesheet" href="./Login.css">
</head>
<body>
	<?php
	 include('Admin_login_control.php');

	if (!empty($_SESSION['admin_type'])) {
    header('Location: viewdata_all.php');
    exit; 
} else {?>
<!-- partial:index.partial.html -->
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<div class="title">
				<P class="title1">Arab Board of Health Specializations</P>
				<P class="title2">Department of Assessment</P>
			</div>
			<form class="login" action="" method="POST">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="email" class="login__input" name="login__email" placeholder="Email"><br>
					<span id="error_email" class="login_text_danger"></span>
                </div>
                <div class="login__field">
					<i class="login__icon fas fa-key"></i>
					<input type="password" class="login__input" name="login__password" placeholder="Password"><br>
					<span id="error_password" class="login_text_danger"></span>
				</div>
				<button type="submit" class="button login__submit" name="login__submit" style="margin-top: 43px;">
					<span class="button__text">Login</span>
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
<!-- partial -->
  
<?php } ?>
</body>
</html>
