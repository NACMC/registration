<?php

session_start();

Admin_login();
function connect_DB()
{
    // $servername = "localhost";
    // $username = "nacmcaho_arab_board_exam";
    // $password = "Gt(A2IndxS9X";
    // $dbname = "nacmcaho_arab_board_exam";
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
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $conn = new PDO($dsn, $username, $password, $options);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    }
}


function Admin_login()
{
    if (isset($_POST['login__submit'])) {
        $conn = connect_DB();
        if ($conn !== false) {
            // Use prepared statement to prevent SQL injection
            $sql = "SELECT password, type FROM admins WHERE email=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST['login__email']]);

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $verify = password_verify($_POST['login__password'], $row['password']);
                if ($verify) {
                    // Set admin type in session
                    $_SESSION['admin_type'] = $row['type'];
                    // Redirect to appropriate page
                    header('Location: ./viewdata_all.php');
                    exit(); // Don't forget to exit after redirection
                } else {
                    echo "<script>document.getElementById('error_password').innerHTML ='The password is incorrect';</script>";
                }
            } else {
                echo "<script>document.getElementById('error_email').innerHTML ='This Email is not registered';</script>";
            }
        } else {
            echo "Database connection error.";
        }

    }
}

?>