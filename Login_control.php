<?php
session_start();
check_email();
function connect_DB(){
    $servername = "localhost";
    // $username = "nacmcaho_arab_board_exam";
    // $password = "Gt(A2IndxS9X";
    // $dbname = "nacmcaho_arab_board_exam";
    $username = "root";
    $password = "";
    $dbname = "arab_board_exam";
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$servername;dbname=$dbname;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $conn = new PDO($dsn, $username, $password, $options);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    }
}


function check_email(){
    if(isset($_POST['login__submit'])){
        $conn=connect_DB();
        if($conn != false){
            $sql = "SELECT count(*) FROM auth_email where email='".$_POST['login__input']."'";
            $result = $conn->query($sql);
           
            if ($result->fetchColumn() > 0){
                $_SESSION['email'] = $_POST['login__input'];
                header('Location: ./Registration.php');
            }
            else{
                echo "<script>document.getElementById('error_email').innerHTML ='أنت غير مسجل';</script>";
            }
        }
    }
}

function scientificcouncil() {
    $conn = connect_DB();
    if ($conn != false) {
        $sql = "SELECT * FROM scientificcouncil";
        $result = $conn->query($sql);

        if ($result->rowCount() > 0) {
            // Fetch data and return as an array
            $councils = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $councils[$row['ID']] = $row['Name_Arabic'];
            }
            return $councils;
        } else {
            // Handle no data available scenario
            echo "No data available";
            return array();
        }
    } else {
        // Handle database connection error
        echo "Connection error";
        return false;
    }
}

function retrieveExamCenters() {
     $conn = connect_DB();
    if ($conn != false) {
        $sql = "SELECT * FROM exam_centers";
        $result = $conn->query($sql);

        if ($result->rowCount() > 0) {
            // Fetch data and return as an array
            $centers = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $centers[$row['center_id']] = $row['center_name'];
            }
            return $centers;
        } else {
            // Handle no data available scenario
            echo "No data available";
            return array();
        }
    } else {
        // Handle database connection error
        echo "Connection error";
        return false;
    }
}

// الدالة لاستعادة بيانات البلدان
function retrieveCountries() {
    $conn = connect_DB();
    if ($conn != false) {
        $sql = "SELECT * FROM countries";
        $result = $conn->query($sql);

        if ($result->rowCount() > 0) {
            // Fetch data and return as an array
            $countries = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $countries[$row['country_id']] = $row['country_name'];
            }
            return $countries;
        } else {
            // Handle no data available scenario
            echo "No data available";
            return array();
        }
    } else {
        // Handle database connection error
        echo "Connection error";
        return false;
    }
   
}

?>