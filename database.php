<?php
class UserManager {
    private $db_server = "localhost";
    private $db_user = "root";
    private $db_password = "";
    private $db_name = "userdb";
    private $conn;

    // 1. Function for connecting to the database automatically
    public function __construct() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $this->conn = mysqli_connect($this->db_server, $this->db_user, $this->db_password, $this->db_name);
        } catch (mysqli_sql_exception $e) {
            die("Could not connect. Error: " . $e->getMessage());
        }
    }

    // 2. Function to check if an email already exists in the database
    public function checkUserExists($email) {
        // Using a prepared statement here keeps your OOP code secure from SQL Injection
        $stmt = mysqli_prepare($this->conn, "SELECT email FROM users WHERE email = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        $exists = mysqli_stmt_num_rows($stmt) > 0;
        mysqli_stmt_close($stmt);
        
        return $exists;
    }

    // 3. Function to insert a new user record
    public function insertUser($email, $password) {
        $stmt = mysqli_prepare($this->conn, "INSERT INTO users (email, password) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        return $result;
    }

    // 4. Main function to orchestrate operations based on the form submission
    public function handleFormSubmission() {
        if (isset($_POST['submit'])) {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            // First, check if the email exists
            if ($this->checkUserExists($email)) {
                // If user exists, you log them in (or redirect to dashboard/login success)
                // In a real app, you'd verify the password here. For now, we redirect to login success.
                header("Location: login.php?status=loggedin");
                exit();
            } else {
                // If user does not exist, insert them as a new record
                if ($this->insertUser($email, $password)) {
                    header("Location: login.php?status=success");
                    exit();
                } else {
                    echo "Error saving data.";
                }
            }
        }
    }

    // Automatically close the connection when the script ends
    public function __destruct() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
}

// Instantiate the class and run the main operation function immediately
$userManager = new UserManager();
$userManager->handleFormSubmission();
?>