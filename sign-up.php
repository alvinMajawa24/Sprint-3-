<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Page</title>
  <link rel="stylesheet" href="CSS/signup.css">
</head>
<body>
<div class="top">
        <a href="index.php">Home</a>
        <a href="stages.php" target="_blank">Stages </a> 
        <a href="Tearoom.php">Tea-room</a>
        <a href="Globe.php">Globe</a>
        <a href="Bus station.php">Bus-station</a>
        <a href="questions.php">Questions</a>
        <a href="summary.php">Summary</a>
        <a href="more-info.php">More info</a>
    
        <a href="sign-up.php">sign-up</a>
        <a href="sign-in.php">sign-in</a>
       </div>

  <div class="signup-container">
    <form action="#" method="POST" class="signup-form">
      <h2>Sign Up</h2>
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Sign Up</button>
    </form>
  </div>
</body>
</html>