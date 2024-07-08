<?php
  session_start();
  include 'includes/messages.php';
?>

<div class="top">
  <a href="index.php">Home</a>
  <a href="stages.php" target="_blank">Stages</a>
  <a href="Tearoom.php">Tea-room</a>
  <a href="Globe.php">Globe</a>
  <a href="Bus station.php">Bus-station</a>
  <a href="questions.php">Questions</a>
  <a href="summary.php">Summary</a>
  <a href="more-info.php">More info</a>

  <div class="dropdown">
    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
      <form id="logoutForm" method="POST" action="logout-Handler.php">
        <button type="submit" id="logoutBtn" style="background: transparent; color: white; border: none; cursor: pointer; background-color: rgba(0, 217, 255, 0.596);">
          Logout <i class="bi bi-arrow-bar-right"></i> 
        </button>
      </form>
      <?php echo '<i class="bi bi-person"></i> '.htmlspecialchars($_SESSION['username']); ?>
    <?php else: ?>
      <button onclick="toggleDropdown()">Join us</button>
      <ul class="thecontent">
        <li><a href="sign-in.php">Sign In</a></li>
        <li><a href="sign-up.php">Sign Up</a></li>
      </ul>
    <?php endif ?>
  </div>
</div>

<script>
  function toggleDropdown() {
    var content = document.querySelector('.thecontent');
    content.classList.toggle('show');
  }

  window.onclick = function(event) {
    if (!event.target.matches('.dropdown button')) {
      var dropdowns = document.getElementsByClassName('thecontent');
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

  document.getElementById('logoutForm').addEventListener('submit', function(event) {
      // Prevent the default form submission
      event.preventDefault();

      // Submit the form
      this.submit();
  });
</script>
