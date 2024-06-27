<?php include ('Login_control.php'); ?>
<!DOCTYPE html>
<html lang="ar">

<head>
	<meta charset="UTF-8">
	<title>التسجيل</title>
	<link rel="icon" href="logo.svg" type="image/icon type">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
	<!-- Include Select2 CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
	<!-- Include jQuery (optional) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- Include Select2 JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
	<style>
		/* Optional: Customize Select2 styles */
		.select2-container {
			width: 100%;
		}
	</style>
	<link rel="stylesheet" href="./Login.css">
</head>

<body>
	<div class="container">
		<div class="reg_screen">
			<div class="screen__content">
				<div class="title">
					<P class="title1">المجلس العربي للاختصاصات الصحية</P>
					<P class="title2">ادارة القياس و التقويم</P>
				</div>
				<form class="login" action="info.php" method="POST">
					<div class="reg__field">
						<input type="email" class="reg__input" name="email" placeholder="االبريد الالكتروني المؤسسي" value="<?php echo $_SESSION['email'];?>"
						disabled	required><br>
						<i class="reg__icon fas fa-user"></i>
						<span id="error_email" class="reg_text_danger"></span>
					</div>
					<div class="reg__field">
						<input type="email" class="reg__input" name="pemail" placeholder="االبريد الالكتروني الشخصي" value="<?php echo $_SESSION['pemail'];?>"
						  required><br>
						<i class="reg__icon fas fa-user"></i>
						<span id="error_email" class="reg_text_danger"></span>
					</div>
					<div class="reg__field">
						<input type="text" class="reg__input" name="userId" placeholder="User ID" value="<?php echo $_SESSION['userId'];?>"
							required><br>
						<i class="reg__icon fas fa-user"></i>
						<span id="error_userId" class="reg_text_danger"></span>
					</div>
					<div class="reg__field">
						<i class="reg__icon fas fa-user"></i>
						<input type="text" class="reg__input" name="name_arabic" placeholder="الاسم باللغة العربية"
							required><br>
						<span id="error_email" class="reg_text_danger"></span>
					</div>
					<div class="reg__field">
						<i class="reg__icon fas fa-user"></i>
						<input type="text" class="reg__input" name="name_english" placeholder="الاسم باللغة الإنجليزية"
							required><br>
						<span id="error_email" class="reg_text_danger"></span>
					</div>
					<p style=
					    "color: black;
                        font-weight: bold;
                        margin-block: 10px;
                        "
                        >
					    نوع المحاولة</p>
					<div style="
					    display: flex;
                        justify-content: space-around;
                        color: gray;
                        font-weight: bold;
					">
					      <input type="radio" id="stage" name="stage" value="primary">
                          <label for="primary">Primary</label><br>

                            <input type="radio" id="stage" name="stage" value="final">
                            <label for="final">Final</label><br>

                            <input type="radio" id="stage" name="stage" value="other">
                            <label for="other">Other</label><br>
					</div>
					<div class="reg__field">
						<i class="reg__icon fas fa-user"></i>
						<input type="number" class="reg__input" name="attempts"
							placeholder="عدد المحاولات" required><br>
						<span id="error_email" class="reg_text_danger"></span>
					</div>
					<div class="reg__field">
						<i class="reg__icon fas fa-user"></i>
						<select class="reg__input" id="scientific_council_id" name="scientific_council_id" required>
							<option value="" disabled selected>اختر المجلس العلمي</option>
							<?php
							// استدعاء الوظيفة لاسترجاع المجالس العلمية
							$councils = scientificcouncil();

							// تحقق من وجود المجالس العلمية قبل تنفيذ الحلقة
							if (!empty($councils)) {
								foreach ($councils as $id => $name) {
									echo "<option value=\"$id\">$name</option>";
								}
							}
							?>
						</select>
						<script>
							$(document).ready(function () {
								$('#scientific_council_id').select2();
							});
						</script>
						<br>
						<span id="error_email" class="reg_text_danger"></span>
					</div>
					
					<input type="submit" class="button reg__submit" name="reg__submit" value=" انتقال الى الصفحة التالية" /></br>
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

</body>

</html>