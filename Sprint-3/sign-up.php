<?php
    session_start();
    require_once 'includes/db_connection.php';

    class UserRegister {
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function generateUsername($fullname) {
            do {
                $randomNumber = rand(1000, 9999);
                $username = $fullname. $randomNumber;

                $sql = "SELECT COUNT(*) FROM users WHERE username = :username";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->execute();
                $count = $stmt->fetchColumn();
            } while ($count > 0);

            return $username;
        }

        public function register($fullname, $email ,$password) {
            $username = $this->generateUsername($fullname);
            $sql = "INSERT INTO users (username, password, email, fullname) VALUES (:username, :password, :email, :fullname)";

            try {
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
                $stmt->execute();

                return $username;
            } catch (PDOException $e) {
                $_SESSION['error_message'] = "Database error: " . $e->getMessage();
                return false;
            }
        }
    }

    $userRegister = new UserRegister($pdo);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = trim($_POST["fullname"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $confirmPassword = trim($_POST["confirmPassword"]);

        if (empty($fullname) || empty($email) || empty($password) || empty($confirmPassword)) {
            $_SESSION['error_message'] = "Please enter all required fields.";
        } elseif ($password !== $confirmPassword) {
            $_SESSION['error_message'] = "Passwords do not match.";
        } else {
            $username = $userRegister->register($fullname, $email, $password);
            if ($username) {
                $_SESSION['success_message'] =  htmlspecialchars($username);
                header("Location: sign-up.php?success=true");
                exit;
            } else {
                $_SESSION['error_message'] = "Sign Up failed, try again.";
            }
        }
    }

    include 'includes/messages.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sing Up Page</title>
  <link rel="stylesheet" href="CSS/css.css">
  <style>
      body {
        background-image: url("/images/background%20image.jpg");
        background-repeat: no-repeat;
      }
    </style>
</head>
<body>
  <main>

    <div class="login-container">
      <form action="#" method="POST" class="signup-form">
        <h2>Sign Up</h2>
        <label>
            Welcome to the Sign-Up page.
            Kindly, Enter the required details for Signing-up.
            <br> Keep the following details Safe and private after registration:
            <ul>
                <li><i class="bi bi-check2"></i> Generated Username.</li>
                <li><i class="bi bi-check2"></i> Confirmed User Password.</li>
            </ul>
        </label>
        <hr>
        <?php if ($final_message): ?>
          <div class="message <?php echo $final_success ? 'success' : 'error'; ?>">
              <em><i class="bi bi-exclamation-circle"></i> <?php echo $final_message; ?></em> <br>
          </div>
        <?php elseif (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
          <div class="success">
              <em><i class="bi bi-check2-circle"></i> <?php echo "Registration successful. Your username is: " . htmlspecialchars($final_success)." <br>You will now be redirected to the Login page."; ?></em> <br>
          </div>
        <?php endif; ?>

        <br> 
        <hr><br>
        <div class="form-group">
          <label for="fullname">Full Name</label>
          <input type="text" id="fullname" name="fullname">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password">
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirm Password</label>
          <input type="password" id="confirmPassword" name="confirmPassword">
        </div>
        <button type="submit">Sign Up</button>
      </form>
    </div>
  </main>
</body>
</html>
