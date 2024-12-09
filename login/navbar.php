<?php
session_start();
?>
<nav>
  <div class="left-nav">
    <ul>
      <li><a href="landingpage.php">Home</a></li>
      <li><a href="menu.php">Menu</a></li>
    </ul>
  </div>
  <div class="logo">
    <a href="#"><img src="images/cafe logo.png" alt="Cafe Logo"></a>
    <span><span class="go">GO</span><span class="fee">ffee</span></span>
  </div>
  <div class="right-nav">
    <ul>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#"><img src="images/shopping-cart.png" alt="Shopping Cart" style="max-width: 20px; height: auto;"></a></li>
      <!-- Show first name if user is logged in, otherwise show sign-in -->
      <?php if (isset($_SESSION['email']) && isset($_SESSION['fName'])): ?>
        <li><a href="#">Hello, <?php echo htmlspecialchars($_SESSION['fName']); ?>!</a></li> <!-- Display user's first name -->
        <li><a href="logout.php">Logout</a></li> <!-- Link to logout -->
      <?php else: ?>
        <li><a href="index.php" id="signInButton">Sign In</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
