<?php include ('Login_control.php');

if (isset($_POST['reg__submit'])) {

  // الحصول على البيانات المُرسلة من النموذج
  // البريد الإلكتروني

  // الاسم باللغة العربية
  $_SESSION['name_arabic'] = $_POST['name_arabic'];

  // الاسم باللغة الإنجليزية
  $_SESSION['name_english'] = $_POST['name_english'];

  // عدد المحاولات
  $_SESSION['attempts'] = $_POST['attempts'];

  // المجلس العلمي
  $_SESSION['scientific_council_id'] = $_POST['scientific_council_id'];
  
  $_SESSION['stage'] = $_POST['stage'] ;
  
  $_SESSION['pemail'] = $_POST['pemail'] ;
  
  $_SESSION['userId'] = $_POST['userId'] ;
  


   

}

if (isset($_POST['save'])) {
  $conn = connect_DB();

  $email = $_SESSION['email'];
  $name_arabic = $_SESSION['name_arabic'];
  $name_english = $_SESSION['name_english'];
  $attempts = $_SESSION['attempts'];
  $scientific_council_id = $_SESSION['scientific_council_id'];
  $stage = $_SESSION['stage'];
  $pemail = $_SESSION['pemail'];
  $userId = $_SESSION['userId'];


echo  $country_id = $_POST['country_id'];
  $exam_center_id = $_POST['exam_center_id'];
  $mobile_number = $_POST['mobile_number'];
  $application_date = $_POST['application_date'];
   $exam_center2_id = $_POST['exam_center2_id'];


  try {
    $sql = "INSERT INTO registration (email, name_arabic, name_english, attempts, scientific_council_id, country_id, exam_center_id, mobile_number, application_date,pemail,userId,stage,exam_center2_id) 
    VALUES (:email, :name_arabic, :name_english, :attempts, :scientific_council_id, :country_id, :exam_center_id, :mobile_number, :application_date,:pemail,:userId,:stage,:exam_center2_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':name_arabic', $name_arabic);
    $stmt->bindParam(':name_english', $name_english);
    $stmt->bindParam(':attempts', $attempts);
    $stmt->bindParam(':scientific_council_id', $scientific_council_id);
    $stmt->bindParam(':country_id', $country_id);
    $stmt->bindParam(':exam_center_id', $exam_center_id);
    $stmt->bindParam(':mobile_number', $mobile_number);
    $stmt->bindParam(':application_date', $application_date);
    $stmt->bindParam(':pemail', $pemail);
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':stage', $stage);
    $stmt->bindParam(':exam_center2_id', $exam_center2_id);
    $stmt->execute();

    session_destroy();

    echo "<script>alert('تم إدخال البيانات بنجاح!'); window.location.href = 'index.php';</script>";
  } catch (PDOException $e) {
    echo "<script>alert('حدث خطأ: " . $e->getMessage() . "'); window.location.href = 'Registration.php';</script>";
  }
}



?>
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
        <form class="login" action="" method="POST">
            
 <div class="reg__field">
            <i class="reg__icon fas fa-user"></i>
            <select name="country_id" class="reg__input" placeholder="بلد التدريب" require>
              <option value="" disabled selected>
                اختر  البلد</option>
              <?php
              // استرجاع مراكز الامتحانات
              $retrieveCountries = retrieveCountries();

              // فحص ما إذا كانت هناك بيانات مسترجعة
              if (!empty($retrieveCountries)) {
								foreach ($retrieveCountries as $id => $name) {
									echo "<option value=\"$id\">$name</option>";
								}
							}else {
                echo '<option value="">لا توجد بلدان متاحة</option>';
              }
           
              ?>
            </select>
            <br>
            <span id="error_email" class="reg_text_danger"></span>
          </div>
          
          
          <div class="reg__field">
            <i class="reg__icon fas fa-user"></i>
            <select name="exam_center_id" class="reg__input" required>
              <option value="" disabled selected>
                اختر مراكز الامتحانات</option>
              <?php
              // استرجاع مراكز الامتحانات
              $examCenters = retrieveExamCenters();

              // فحص ما إذا كانت هناك بيانات مسترجعة
              if (!empty($examCenters)) {
								foreach ($examCenters as $id => $name) {
									echo "<option value=\"$id\">$name</option>";
								}
							}else {
                echo '<option value="">لا توجد مراكز امتحانية متاحة</option>';
              }
           
              ?>
            </select>
            <br>
            <span id="error_email" class="reg_text_danger"></span>
          </div>
            <div class="reg__field">
            <i class="reg__icon fas fa-user"></i>
            <select name="exam_center2_id" class="reg__input" required>
              <option value="" disabled selected>
                 اختر مراكز الامتحانات البديل</option>
              <?php
              // استرجاع مراكز الامتحانات
              $examCenters = retrieveExamCenters();

              // فحص ما إذا كانت هناك بيانات مسترجعة
              if (!empty($examCenters)) {
								foreach ($examCenters as $id => $name) {
									echo "<option value=\"$id\">$name</option>";
								}
							}else {
                echo '<option value="">لا توجد مراكز امتحانية متاحة</option>';
              }
           
              ?>
            </select>
            <br>
            <span id="error_email" class="reg_text_danger"></span>
          </div>
          <div class="reg__field">
            <i class="reg__icon fas fa-user"></i>
            <input type="tel" class="reg__input" name="mobile_number" placeholder="رقم الجوال (WhatsApp)"
              pattern="[0-9]{10,11}" title="يرجى ادخال 10 ارقام" required><br>
            <span id="error_email" class="reg_text_danger"></span>
          </div>
          <p>تاريخ تقديم الطلب للهيئة المحلية</p>
          <input type="date" class="reg__input" name="application_date" placeholder="تاريخ تقديم الطلب" required><br>
          <input type="submit" class="button reg__submit" name="save" value="سجل الآن" />
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