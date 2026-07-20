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

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }

    public function checkValidate($email) {
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function checkEmailExists($email) {
        $query = mysqli_prepare($this->conn, "SELECT id FROM users WHERE email = ? LIMIT 1");
        mysqli_stmt_bind_param($query, "s", $email);
        mysqli_stmt_execute($query);
        mysqli_stmt_store_result($query);
        
        $exists = mysqli_stmt_num_rows($query) > 0;
        mysqli_stmt_close($query);

        return $exists;
    }


    public function checkUser($email, $password) {
        $query = mysqli_prepare($this->conn, "SELECT password FROM users WHERE email = ? LIMIT 1");
        mysqli_stmt_bind_param($query, "s", $email);
        mysqli_stmt_execute($query);
        
        $result = mysqli_stmt_get_result($query);
        
        if ($user = mysqli_fetch_assoc($result)) {//fetch the query result and store in a array witha key value structure
            mysqli_stmt_close($query);
            return password_verify($password, $user['password']); 
        }
        
        mysqli_stmt_close($query);
        return false; 
    }

    public function insertUser($email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = mysqli_prepare($this->conn, "INSERT INTO users (email, password) VALUES (?, ?)");
        mysqli_stmt_bind_param($query, "ss", $email, $hashedPassword);
        
        $result = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        
        return $result;
    }

    public function handleFormSubmission() {
        if (isset($_POST['submit'])) {
            $email = $this->test_input($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($password) || !$this->checkValidate($email)) {
                header("Location: login.php?status=invalid_credentials");
                exit();
            }

            if ($this->checkEmailExists($email)) {
           
                if ($this->checkUser($email, $password)) {
                    header("Location: login.php?status=loggedin");
                    exit();
                } else {
                    header("Location: login.php?status=invalid_credentials");// the header tells the browser which page to redirect 
                    exit();
                }
            } else {
                if ($this->insertUser($email, $password)) {
                    header("Location: login.php?status=success");
                    exit();
                } else {
                    header("Location: login.php?status=invalid_credentials");
                    exit();
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