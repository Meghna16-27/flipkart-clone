<?php
class UserManager {
    private $db_server = "localhost";
    private $db_user = "root";
    private $db_password = "";
    private $db_name = "userdb";
    private $conn;


    public function __construct() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $this->conn = mysqli_connect($this->db_server, $this->db_user, $this->db_password, $this->db_name);
        } catch (mysqli_sql_exception $e) {
            die("Could not connect. Error: " . $e->getMessage());
        }
    }

    public function checkUserExists($email) {
     
        $stmt = mysqli_prepare($this->conn, "SELECT email FROM users WHERE email = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        $exists = mysqli_stmt_num_rows($stmt) > 0;
        mysqli_stmt_close($stmt);
        
        return $exists;
    }


    public function insertUser($email, $password) {
        $stmt = mysqli_prepare($this->conn, "INSERT INTO users (email, password) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        return $result;
    }

    public function handleFormSubmission() {
        if (isset($_POST['submit'])) {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

  
            if ($this->checkUserExists($email)) {
             
                header("Location: login.php?status=loggedin");
                exit();
            } else {
    
                if ($this->insertUser($email, $password)) {
                    header("Location: login.php?status=success");
                    exit();
                } else {
                    echo "Error saving data.";
                }
            }
        }
    }


    public function __destruct() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
}


$userManager = new UserManager();
$userManager->handleFormSubmission();
?>