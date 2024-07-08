<?php
    session_start();
    require_once 'includes/db_connection.php';
    
    class UserLogin {
      private $pdo;

      public function __construct($pdo) {
          $this->pdo = $pdo;
      }

      public function login($username, $password) {
          $sql = "SELECT id, username, password, fullname, email FROM users WHERE username = :username";

          try {
              $stmt = $this->pdo->prepare($sql);
              $stmt->bindParam(':username', $username, PDO::PARAM_STR);
              $stmt->execute();

              if ($stmt->rowCount() == 1) {
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  $id = $row['id'];
                  $stored_password = $row['password'];

                  // Verify the password using password_verify
                  if (password_verify($password, $stored_password)) {
                      $_SESSION['loggedin'] = true;
                      $_SESSION['id'] = $id;
                      $_SESSION['username'] = $username;
                      $_SESSION['fullname'] = $row['fullname'];
                      $_SESSION['email'] = $row['email'];
                      return true; 
                  } else {
                      return false; 
                  }
              } else {
                  return false; 
              }
          } catch (PDOException $e) {
              $_SESSION['error_message'] = "Database error: " . $e->getMessage();
              return false; 
          }
      }
  }

  $userLogin = new UserLogin($pdo);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = trim($_POST["username"]);
      $password = trim($_POST["password"]);

      if (empty($username) || empty($password)) {
          $_SESSION['error_message'] = "Please enter both username and password.";
      } else {
          if ($userLogin->login($username, $password)) {
              header("location: index.php");
              exit;
          } else {
              $_SESSION['error_message'] = "Incorrect username or password, try again.";
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
  <title>Login Page</title>
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
      <form action="#" method="POST" class="login-form">
        <h2>Login</h2>
        <?php if ($final_message): ?>
          <div class="message <?php echo $final_success ? 'success' : 'error'; ?>">
            <i class="bi bi-exclamation-circle"></i> <em><?php echo $final_message; ?></em>
          </div>
        <?php endif; ?>
        <hr> <br>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password">
        </div>
        <button type="submit">Login</button>
      </form>
    </div>
  </main>
  
</body>
</html>


