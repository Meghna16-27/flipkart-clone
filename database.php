<?php
class UserManager {
    private $db_server = "localhost";
    private $db_user = "root";
    private $db_password = "";
    private $db_name = "userdb";
    private $conn;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $this->conn = mysqli_connect($this->db_server, $this->db_user, $this->db_password, $this->db_name);
        } catch (mysqli_sql_exception $e) {
            die("Could not connect. Error: " . $e->getMessage());
        }
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
        $query = mysqli_prepare($this->conn, "SELECT id, password FROM users WHERE email = ? LIMIT 1");
        mysqli_stmt_bind_param($query, "s", $email);
        mysqli_stmt_execute($query);
        
        $result = mysqli_stmt_get_result($query);
      
        
        if ($user = mysqli_fetch_assoc($result)) {
            mysqli_stmt_close($query);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $email;
                return true;
            }
        } else {
            mysqli_stmt_close($query);
        }
        
        return false; 
    }

    public function insertUser($email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = mysqli_prepare($this->conn, "INSERT INTO users (email, password) VALUES (?, ?)");
        mysqli_stmt_bind_param($query, "ss", $email, $hashedPassword);
        
        $result = mysqli_stmt_execute($query);
        
        if ($result) {
            $_SESSION['user_id'] = mysqli_insert_id($this->conn);
            $_SESSION['user_email'] = $email;
        }

        mysqli_stmt_close($query);
        return $result;
    }

    public function handleRequests() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $action_type = $_POST['action_type'] ?? 'login';

            if (empty($password) || !$this->checkValidate($email)) {
                header("Location: signup.php?status=invalid_credentials");
                exit();
            }

            // LOGIN FLOW
            if ($action_type === 'login') {
                if (!$this->checkEmailExists($email)) {
                    // Redirect non-existent user to signup mode with pre-filled email
                    header("Location: signup.php?status=new_user&email=" . urlencode($email));
                    exit();
                }

                if ($this->checkUser($email, $password)) {
                    header("Location: index.php?status=loggedin");
                    exit();
                } else {
                    header("Location: signup.php?status=invalid_credentials");
                    exit();
                }
            } 
            // SIGNUP FLOW
            elseif ($action_type === 'signup') {
                if ($this->checkEmailExists($email)) {
                    header("Location: signup.php?status=email_taken&email=" . urlencode($email));
                    exit();
                }

                if ($this->insertUser($email, $password)) {
                    header("Location: index.php?status=loggedin");
                    exit();
                } else {
                    header("Location: signup.php?status=invalid_credentials");
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
$userManager->handleRequests();
?>